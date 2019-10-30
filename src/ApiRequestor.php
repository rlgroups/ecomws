<?php
namespace Ecomws;

use DB;
use FluidXml\FluidXml;
use GuzzleHttp\Client;
use GuzzleHttp\TransferStats;
use GuzzleHttp\Exception\RequestException;

trait ApiRequestor {


    // getResponse

    // getRequest (bulidXml, toXml, toArray)

    // request {
    // $xml = $this->getRequest
    // retrn getResponse($xml)
    // }
    public function request()
    {
        // $customer = $this->get('customer');
        // var_dump($customer->id);
        //tryRequest:
        $response = $this->getRequest($this);

        /*if ($this->reLogin && $response['status'] == 403) {
            $this->reLogin;
            goto tryRequest;
        }
*/
        return $response;
    }

    public static function filterEmptyField($array)
    {
        return collect($array)
            ->filter(function ($field) {
                return ($field !== null) || ($field != '');
            })->toArray();
    }

    public function getRequest($params)
    {
        $action = $this->endPoint;
        //$host = 'ecomwsprod.binaprojects.com';
        $host = static::$apiHost;

        $apiBase = static::$apiBase;

        $baseUrl = "https://{$host}/{$apiBase}/{$this->endPoint}";

        $xmlRequest = $this->bulidXml($action, $params->jsonSerialize());

        return $this->getResponse($xmlRequest);
    }

    public function getResponse($xmlRequest)
    {
        $request_send;

        $http = new Client([
            // 'curl' => [CURLOPT_SSL_VERIFYPEER => false],
            // 'verify' => false,
            // 'timeout' => 10000,
            // 'proxy' => '127.0.0.1:8888',
        ]);

        $host = static::$apiHost;

        $apiBase = static::$apiBase;

        $baseUrl = "http://{$host}/{$apiBase}?op={$this->endPoint}";

        $status = 1;

        $request_time = null;
        $request_data = null;

        try {
            $request_send = date("Y-m-d H:i:s");
            $responseData = $http->request('POST', $baseUrl, [
                'body' => $xmlRequest,
                'headers' => [
                    "Content-Type" => "application/soap+xml",
                    // "Content-Length" => "length",
                    "Host" => $host,
                ],
                'on_stats' => function (TransferStats $stats) use(&$request_time ,&$request_data) {
                    $request_time = $stats->getTransferTime();
                    $request_data = $stats->getHandlerStats();

                    // You must check if a response was received before using the
                    // response object.
                    /*if ($stats->hasResponse()) {
                        echo $stats->getResponse()->getStatusCode();
                    } else {
                        // Error data is handler specific. You will need to know what
                        // type of error data your handler uses before using this
                        // value.
                        var_dump($stats->getHandlerErrorData());
                    }*/
                }

            ]);

            $xmlResponse = (string) $responseData->getBody();

            $data = $this->mapResponse(
                $this->xmlToArray($xmlResponse),
                $xmlRequest
            );
            //var_dump( $xmlResponse);
            //var_dump( $data['data']['Prt']["ClsPrtMivza"]);
            //dd();
         } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            $status = 0;

            $response = $e->getResponse();
            $jsonBody = (string) $response->getBody();

            // dd($jsonBody);
            $responseData = [
                'RequestException' => $jsonBody
            ];

            // dd($e->getResponse());

            $xmlResponse = $jsonBody;
            $data = null;
        }

        $this->outputLog($xmlRequest, $xmlResponse, $request_send, $data, $request_time, $request_data);

        if ($responseData && $status) {
            return $data;
        }

        return [
            'status' => '0',
        ];
    }

    public function mapDataResponse($data)
    {
        return $data;
    }

    public function mapResponse($array, $xmlRequest = null)
    {
        if (
            isset($array['soap:Body'])
            && isset($array['soap:Body']["{$this->endPoint}Response"])
            && isset($array['soap:Body']["{$this->endPoint}Response"]["{$this->endPoint}Result"])
        ) {
            $data = $this->mapDataResponse($array['soap:Body']["{$this->endPoint}Response"]["{$this->endPoint}Result"]);

            $status = isset($data['Status']) ? $data['Status'] : '3';

            return [
                'status' => $status,
                'data' => $data['data'] ?? $data,
                'all_data' => $array['soap:Body'],
                'xmlRequest' => $xmlRequest
            ];
        } else {
            return [
                'status' => '2'
            ];
        }
    }

    public function getErrorReponse($response)
    {
        $error = $response['@attributes'];
        $error['error'] = $response['error']['@content'];
        $error['error_code'] = $response['error']['@attributes']['code'];

        if (isset($error['booking-options'])) {
            $error['booking-options'] = $response['booking-options'] ?? null;
        }

        return $error;
    }

    public function toXml()
    {
        $xml = new FluidXml('request');

        $xml->attr(['version' => self::$apiVersion])->add($this->toArray());


        return $xml;
    }

    /**
     * Convert the instance to JSON.
     *
     * @param  int  $options
     * @return string
     */
    public function toJson($options = 0)
    {
        $json = json_encode($this->jsonSerialize(), $options);

        return $json;
    }

    /**
     * Convert the object into something JSON serializable.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        //dd($this->toArray());
        return $this->toArray();

    }

    public function outputLog($xmlRequest, $xmlResponse, $request_send, $data, $request_time, $request_data)
    {
        $log = [
            'user_id' => $this->userId,
            'called' => $this->endPoint,
            'ip' =>  request()->ip(),
            'request' => $xmlRequest,
            'response' => $xmlResponse,
            'data' => isset($data) ? json_encode($data) : null,
            'request_time' => $request_time ?? null,
            'request_data' => isset($request_data) ? json_encode($request_data) : null,
            'request_at' => $request_send,
            'response_at' => date('Y-m-d H:i:s')
        ];
        DB::table('logs')->insert($log);
    }

    function xmlToArray($xml) {
        $doc = new \DOMDocument();
        $doc->loadXML($xml);
        $root = $doc->documentElement;
        $output = $this->nodeToArray($root);
        $output['@root'] = $root->tagName;

        return $output;
    }

    function nodeToArray($node) {
        $output = [];

        switch ($node->nodeType) {
            case XML_CDATA_SECTION_NODE:
            case XML_TEXT_NODE:
                $output = trim($node->textContent);
                break;

            case XML_ELEMENT_NODE:
                for ($i=0, $m=$node->childNodes->length; $i<$m; $i++) {
                    $child = $node->childNodes->item($i);
                    $v = $this->nodeToArray($child);

                    if(isset($child->tagName)) {
                        $t = $child->tagName;

                        if(!isset($output[$t])) {
                            $output[$t] = [];
                        }

                        $output[$t][] = $v;
                    } elseif($v || $v === '0') {
                        $output = (string) $v;
                    }
                }

                if($node->attributes->length && !is_array($output)) { //Has attributes but isn't an array
                    $output = array('@content'=>$output); //Change output into an array.
                }

                if(is_array($output)) {
                    if($node->attributes->length) {
                        $a = [];

                        foreach($node->attributes as $attrName => $attrNode) {
                            $a[$attrName] = (string) $attrNode->value;
                        }

                        $output['@attributes'] = $a;
                    }

                    foreach ($output as $t => $v) {
                        if(is_array($v) && count($v)==1 && $t!='@attributes') {
                            $output[$t] = $v[0];
                        }
                    }
                }
                break;
        }

        return $output;
    }

    public function bulidXml($action, $params) {
        return "<?xml version=\"1.0\" encoding=\"utf-8\"?>
<soap12:Envelope xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\" xmlns:soap12=\"http://www.w3.org/2003/05/soap-envelope\">
    <soap12:Body>
        <$action xmlns=\"http://tempuri.org/\">
            ".
            $this->splitArrayToNodes($params)
            ."
        </$action>
    </soap12:Body>
</soap12:Envelope>
        ";
    }

    public function splitArrayToNodes($array, $r = 1)
    {
        if (is_array($array)) {
            return implode('', collect($array)->map(function ($v, $k) use ($r) {
                $node = is_numeric($k) ? $k[0] : $k;
                if ($node != '') {
                    return "<$node>{$this->splitArrayToNodes($v, $r+1)}</$node>";
                } else {
                    return "{$this->splitArrayToNodes($v, $r+1)}";
                }
            })->toArray());
        }

        return $array;
    }
}
