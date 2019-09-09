<?php

namespace Ecomws\Order;

use Ecomws\Order\Base;

class AddressAutocomplete extends Base
{
    /**
     * The string of endPoint.
     *
     * @var string
     */
    protected $endPoint = 'AddressAutocomplete';

    /**
     * The string of city.
     *
     * @var string
     */
    protected $city;


    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * The string of street.
     *
     * @var string
     */
    protected $street;


    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * The string of number.
     *
     * @var string
     */
    protected $number;


    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * The string of searchterm.
     *
     * @var string
     */
    protected $searchterm;


    public function setSearchterm($searchterm)
    {
        $this->searchterm = $searchterm;

        return $this;
    }


    public function toArray()
    {
        return [
            'Token' => Self::$token,
            'City' => $this->city,
            'Street' => $this->street,
            'Number' => $this->number,
            'searchterm' => $this->searchterm
        ];
    }


    /*public function mapDataResponse($data)
    {
        return collect($data['listCityZip']['ListCityZip'] ?? [])->map(function ($order) {
            return [
                'doc_number' => $order['DocNumber'] ?? null,
                'delivery_price' => $order['DeliveryPrice'] ?? null,
                'total_sum_with_scm_dis' => $order['TotalSumWithScmDis'] ?? null,
                'total_sum_without_scm_dis' => $order['TotalSumWithoutScmDis'] ?? null,
                'final_price' => $order['FinalPrice'] ?? null,
                //'firstName' => $order['FirstName'] ?? null,
                //'lastName' => $order['LastName'] ?? null,
                'from_hour_asp' => $order['FromHourAsp'] ?? null,
                'to_hour_asp' => $order['ToHourAsp'] ?? null,
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
                'close_order' => $order['ListItemsInOrder'] ?? null,
                'items' => collect($order['ListItemsInOrder']['ClsGetCustomersOrdersOut'])->map(function ($item) {
                    return [
                        //'addressAsp' => $item['addressAsp'] ?? null,
                        //'addressHomeNumber' => $item['AddressHomeNumber'] ?? null,
                        //'agentID' => $item['AgentID'] ?? null,
                        //'agentIdOfLukatThisLine' => $item['AgentIdOfLukatThisLine'] ?? null,
                        'apartment' => $item['Apartment'] ?? null,
                        //'attribute1Code' => $item['Attribute1Code'] ?? null,
                        //'attribute1Name' => $item['Attribute1Name'] ?? null,
                        //'attribute2Code' => $item['Attribute2Code'] ?? null,
                        //'attribute2Name' => $item['Attribute2Name'] ?? null,
                        //'attribute3Code' => $item['Attribute3Code'] ?? null,
                        //'attribute3Name' => $item['Attribute3Name'] ?? null,
                        'card_number' => $item['CardNumber'] ?? null,
                        'card_type' => $item['CardType'] ?? null,
                        //'cityAsp' => $item['CityAsp'] ?? null,
                        //'clientName' => $item['ClientName'] ?? null,
                        'close_line' => $item['CloseLine'] ?? null,
                        'close_order' => $item['CloseOrder'] ?? null,
                        //'dateAsp' => $item['DateAsp'] ?? null,
                        //'dateDoc' => $item['DateDoc'] ?? null,
                        //'deliveryPrice' => $item['DeliveryPrice'] ?? null,
                        //'departmentID' => $item['DepartmentID'] ?? null,
                        //'departmentName' => $item['DepartmentName'] ?? null,
                        'doc_line' => $item['DocLine'] ?? null,
                        'doc_number' => $item['DocNumber'] ?? null,
                        //'docTime' => $item['DocTime'] ?? null,
                        //'docType' => $item['DocType'] ?? null,
                        //'fromHourAsp' => $item['FromHourAsp'] ?? null,
                        //'groupID' => $item['GroupID'] ?? null,
                        //'groupName' => $item['GroupName'] ?? null,
                        //'HomeNumber' => $item['HomeNumber'] ?? null,
                        'item_id' => $item['ItemID'] ?? null,
                        'item_name' => $item['ItemName'] ?? null,
                        'lukat_line' => $item['LukatLine'] ?? null,
                        'mikod' => $item['Mikod'] ?? null,
                        'mivza_kod' => $item['MivzaKod'] ?? null,
                        //'orderC' => $item['OrderC'] ?? null,
                        'order_source' => $item['OrderSource'] ?? null,
                        'price' => $item['Price'] ?? null,
                        'provide_line' => $item['ProvideLine'] ?? null,
                        'quantity' => $item['Quantity'] ?? null,
                        //'ref' => $item['Ref'] ?? null,
                        //'remarks' => $item['Remarks'] ?? null,
                        //'scmDis' => $item['ScmDis'] ?? null,
                        //'storeID' => $item['StoreID'] ?? null,
                        //'storeName' => $item['StoreName'] ?? null,
                        //'street' => $item['Street'] ?? null,
                        //'subGroupID' => $item['SubGroupID'] ?? null,
                        //'subGroupName' => $item['SubGroupName'] ?? null,
                        'supplier_id' => $item['SupplierID'] ?? null,
                        'supplier_name' => $item['SupplierName'] ?? null,
                        //'toHourAsp' => $item['ToHourAsp'] ?? null,
                        //'tokenCard' => $item['TokenCard'] ?? null,
                        //'totalSum' => $item['TotalSum'] ?? null,
                        //'totalSumWithMaam' => $item['TotalSumWithMaam'] ?? null,
                        //'userID' => $item['UserID'] ?? null,
                        //'userName' => $item['UserName'] ?? null,
                        //'floor' => $item['floor'] ?? null,
                        'amount' =>  1,
                        'barcode' => $item['ItemID'] ?? null
                    ];
                })
            ];
        });

    }*/

}
