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
            'verify' => false,
            'timeout' => 30,
            // 'proxy' => '127.0.0.1:8888',
        ]);

        $host = static::$apiHost;

        $apiBase = static::$apiBase;

        $baseUrl = "{$host}/{$apiBase}?op={$this->endPoint}";

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
                    // "Host" => $host,
                ],
                'on_stats' => function (TransferStats $stats) use(&$request_time ,&$request_data) {
                    $request_time = $stats->getTransferTime();
                    $request_data = $stats->getHandlerStats();
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
        } catch (\Exception $e) {
            $status = 0;

            $responseData = [
                'RequestException' => 1
            ];

            $data = [
                'status' => -1,
            ];

            $xmlResponse = $e->getMessage();
        }

        $data['log_id'] = $this->outputLog($xmlRequest, $xmlResponse, $request_send, $data, $request_time, $request_data);

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

            if(env('APP_ENV') == 'local'){
                return [
                    'status' => $status,
                    'data' => $data['data'] ?? $data,
                    'all_data' => $array['soap:Body'],
                    'xmlRequest' => $xmlRequest
                ];
            }else {
                return [
                    'status' => $status,
                    'data' => $data['data'] ?? $data,
                ];
            }
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
        $logID = 0;

        try {
            if (config('services.elastic_log')) {
                $client = \Elasticsearch\ClientBuilder::create()
                        ->setHosts([config('services.elastic_log')])
                        ->build();

                 $params = [
                    'index' => 'ecomws-' . date('Y.m.d'),
                    // 'routing'   => 'company_xyz',
                    // 'id'    => '1',
                    'body'  => [
                        'timestamp' => time(),
                        'user_id' => $this->userId,
                        'called' => $this->endPoint,
                        'ip' =>  request()->ip(),
                        'comax_request' => $this->toArray(),
                        // 'response' => $xmlResponse,
                        'comax_response' => $data ?? null,
                        'request_time' => $request_time ?? null,
                        'request_data' => $request_data ?? null,
                        'request_at' => date('c', strtotime($request_send)),
                        'response_at' => date('c')
                    ],
                    // 'client' => [
                    //     'future' => 'lazy'
                    // ]
                ];

                if ($this->endPoint != 'GetPriceOfCartTest') {
                    $params['body']['xml'] = [
                        'request' => $xmlRequest,
                        'response' => $xmlResponse,
                    ];
                }

                // $client->indices()->create([
                //     'index' => 'ecomws-' . date('Y.m.d'),
                //     'body' => [
                //         "mappings" => [
                //             "properties" => [
                //                 "timestamp" => ["type" => "date"],
                //                 "request_at" => ["type" => "date"],
                //                 "response_at" => ["type" => "date"],
                //                 "called" => ["type" => "keyword"],
                //                 "ip" => ["type" => "ip"],
                //                 "comax_request" => ["type" => "object"],
                //                 "comax_response" => ["type" => "object"],
                //                 "request_data" => ["type" => "object"],
                //                 "request_time" => ["type" => "float"],
                //                 "user_id" => ["type" => "keyword"],
                //                 "xml" => ["type" => "object", "enabled" => false],
                //             ]
                //         ]
                //     ]
                // ]);

                $response = $client->index($params);
            }
        } catch (\Exception $e) {

        }

        return $response['_id'] ?? null;
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
