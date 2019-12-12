<?php

namespace Ecomws\Order;

use Ecomws\Order\Base;

class GetOrders extends Base
{
    /**
     * The string of endPoint.
     *
     * @var string
     */
    protected $endPoint = 'GetOrders';


    /**
     * The string of fromOrder.
     *
     * @var string
     */
    protected $fromOrder;


    public function setFromOrder($fromOrder)
    {
        $this->fromOrder = $fromOrder;

        return $this;
    }

    /**
     * The string of toOrder.
     *
     * @var string
     */
    protected $toOrder;


    public function setToOrder($toOrder)
    {
        $this->toOrder = $toOrder;

        return $this;
    }


    public function toArray()
    {
        return [
            'Token' => Self::$token,
            'FromOrder' => $this->fromOrder,
            'ToOrder' => $this->toOrder,
        ];
    }

    public function mapDataResponse($data)
    {
        if(!empty($data['ListOrders']) && !empty($data['ListOrders']['ClsGetCustomersOrdersOutList'])){
            $data['ListOrders']['ClsGetCustomersOrdersOutList'] =
            $data['ListOrders']['ClsGetCustomersOrdersOutList'] && isset($data['ListOrders']['ClsGetCustomersOrdersOutList'][0])
                ? $data['ListOrders']['ClsGetCustomersOrdersOutList']
                : [$data['ListOrders']['ClsGetCustomersOrdersOutList']];

        }

        return [
            'data' => collect($data['ListOrders']['ClsGetCustomersOrdersOutList'] ?? [])->map(function ($order) {

            $linesInOrder = $order['ListItemsInOrder']['ClsGetCustomersOrdersOut'] ?? [] ;

            if (!isset($linesInOrder[0])) {
                $linesInOrder = [$linesInOrder];
            }

            return [
                'doc_number' => $order['DocNumber'] ?? null,
                'delivery_price' => $order['DeliveryPrice'] ?? null,
                //'total_sum_with_scm_dis' => $order['TotalSumWithScmDis'] ?? null,------change
                'total_sum_without_scm_dis' => $order['TotalSumWithoutScmDis'] ?? null,
                'final_price' => $order['FinalPrice'] ?? null,
                //'firstName' => $order['FirstName'] ?? null,
                //'lastName' => $order['LastName'] ?? null,
                //'from_hour_asp' => $order['FromHourAsp'] ?? null,------change
                //'to_hour_asp' => $order['ToHourAsp'] ?? null,------change
                'date_asp' => $order['DateAsp'] ?? null,
                //email: order.Email,
                'order_c' => $order['OrderC'] ?? null,
                'store_id' => $order['StoreID'] ?? null,
                'city' => $order['City'] ?? null,
                'street' => $order['Street'] ?? null,
                'home_number' => $order['HomeNumber'] ?? null,
                'floor' => $order['floor'] ?? null,
                'apartment' => $order['Apartment'] ?? null,
                'token_card' => $order['TokenCard'] ?? null,
                'remarks' => $order['Remarks'] ?? null,
                'close_order' => $order['CloseOrder'] ?? null,
                //'remarks' => $order['Remarks'] ?? null,
                //'pelefon' => !empty($order['TelAsp']) ? $order['TelAsp'] : null,------change
                'name' => $order['FirstName'].' '. $order['LastName'] ?? null,
                'loaded' => false,
                'loadingItems' => false,
                'email' => $order['Email'] ?? null,
                'status' => $order['Status'] == '0' ? '0' : $order['Status'],

                'scm_dis' => $order['ScmDis'] ?? null,
                //'tel_asp' => $linesInOrder[0]['TelAsp'] ?? null,------change
                //'area' => $linesInOrder[0]['Area'] ?? null,------change
                //'card_number' => $linesInOrder[0]['CardNumber'] ?? null,------change
                //'card_type' => $linesInOrder[0]['CardType'] ?? null,------change
                //'city_asp' => $linesInOrder[0]['CityAsp'] ?? null,------change
                'date_doc' => $order['DateDoc'] ?? null,
                'doc_time' => $order['DocTime'] ?? null,
                'doc_type' => $linesInOrder[0]['DocType'] ?? null,
                'mikod' => $linesInOrder[0]['Mikod'] ?? null,
                'final_price_with_delivery' => $order['FinalPriceWithDelivery'] ?? null,//------change
                'final_price_without_delivery' => $order['FinalPriceWithoutDelivery'] ?? null,//------change
                //'store_name' => $linesInOrder[0]['StoreName'] ?? null,//------change
                'items' => collect($linesInOrder)->map(function ($item) {
                    return [
                        //'addressAsp' => $item['addressAsp'] ?? null,
                        //'addressHomeNumber' => $item['AddressHomeNumber'] ?? null,
                        'agent_iD' => $item['AgentID'] ?? null,
                        'agent_id_of_lukat_this_line' => $item['AgentIdOfLukatThisLine'] ?? null,
                        //'apartment' => $item['Apartment'] ?? null,
                        //'attribute1Code' => $item['Attribute1Code'] ?? null,
                        //'attribute1Name' => $item['Attribute1Name'] ?? null,
                        //'attribute2Code' => $item['Attribute2Code'] ?? null,
                        //'attribute2Name' => $item['Attribute2Name'] ?? null,
                        //'attribute3Code' => $item['Attribute3Code'] ?? null,
                        //'attribute3Name' => $item['Attribute3Name'] ?? null,
                        /////'card_number' => $item['CardNumber'] ?? null,
                        /////'card_type' => $item['CardType'] ?? null,
                        //'cityAsp' => $item['CityAsp'] ?? null,
                        //'clientName' => $item['ClientName'] ?? null,
                        //'close_line' => $item['CloseLine'] ?? null,//change
                        //'close_order' => $item['CloseOrder'] ?? null,
                        //'dateAsp' => $item['DateAsp'] ?? null,
                        //'dateDoc' => $item['DateDoc'] ?? null,
                        //'deliveryPrice' => $item['DeliveryPrice'] ?? null,
                        //'departmentID' => $item['DepartmentID'] ?? null,
                        //'departmentName' => $item['DepartmentName'] ?? null,
                        'doc_line' => $item['DocLine'] ?? null,
                        //'doc_number' => $item['DocNumber'] ?? null,
                        //'docTime' => $item['DocTime'] ?? null,
                        //'docType' => $item['DocType'] ?? null,
                        //'fromHourAsp' => $item['FromHourAsp'] ?? null,
                        //'groupID' => $item['GroupID'] ?? null,
                        //'groupName' => $item['GroupName'] ?? null,
                        //'HomeNumber' => $item['HomeNumber'] ?? null,
                        'item_id' => $item['ItemID'] ?? null,
                        //'name' => $item['ItemName'] ?? null,//change
                        //'lukat_line' => $item['LukatLine'] ?? null,//change
                        //'mikod' => $item['Mikod'] ?? null,
                        'mivza_kod' => $item['MivzaKod'] ?? null,
                        //'orderC' => $item['OrderC'] ?? null,
                        'order_source' => $item['OrderSource'] ?? null,
                        'price' => $item['Price'] ?? null,
                        'halfKg' => $item['HalfKg'] ?? null,
                        //'pratim' => $item['Pratim'] ?? null,//change
                        //'provide_line' => $item['ProvideLine'] ?? null,//change
                        'quantity' => $item['Quantity'] ?? null,
                        'ref' => $item['Ref'] ?? null,
                        //'remarks' => $item['Remarks'] ?? null,///////////////
                        //'additional_data' => $item['additionalData'] ?? null,///////////////
                        'scm_dis' => $item['ScmDis'] ?? null,
                        'sw_shakil' => $item['SwShakil'] ?? null,
                        'unit' => $item['Unit'] ?? null,
                        //'storeID' => $item['StoreID'] ?? null,
                        //'storeName' => $item['StoreName'] ?? null,
                        //'street' => $item['Street'] ?? null,
                        //'subGroupID' => $item['SubGroupID'] ?? null,
                        //'subGroupName' => $item['SubGroupName'] ?? null,
                        'supplier_id' => $item['SupplierID'] ?? null,
                        //'supplier_name' => $item['SupplierName'] ?? null,//change
                        //'toHourAsp' => $item['ToHourAsp'] ?? null,
                        //'tokenCard' => $item['TokenCard'] ?? null,
                        'total_sum' => $item['TotalSum'] ?? null,
                        'total_sum_with_maam' => $item['TotalSumWithMaam'] ?? null,
                        //'userID' => $item['UserID'] ?? null,
                        //'userName' => $item['UserName'] ?? null,
                        //'floor' => $item['floor'] ?? null,
                        //'amount' =>  1,
                        // 'barcode' => $item['ItemID'] ?? null
                    ];
                })
            ];
         }),
        ];

    }

}
