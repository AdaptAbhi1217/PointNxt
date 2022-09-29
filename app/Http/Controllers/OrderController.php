<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\OrderItems;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;

class OrderController extends Controller
{
    public function updateOrder() {

    }

    public function createLabel(){

    }
    //Function to get Authentication Credentials for Shipstation
    public function getCredentials(){
        $api_key = Config::get('services.shipstation.key');
        $api_secret = Config::get('services.shipstation.secret');
        $baseUrl = Config::get('services.shipstation.baseUrl');
        $credentials = [
            'api_key' => $api_key,
            'api_secret' => $api_secret,
            'baseUrl' => $baseUrl
        ];
        return $credentials;
    }

    //Function to display Orders from Local Database.
    public function getOrders(){
        $orders = Orders::all();
        $orderItems = OrderItems::all();
        return view('orders', [
            'orders' => $orders,
            'items' => $orderItems
        ]);
    }

    //Function handling Insertion of data from Shipstation into Local Database.
    public function insertOrders() {
        $credentials = $this->getCredentials();
        $response = Http::withBasicAuth($credentials['api_key'], $credentials['api_secret'])->get($credentials['baseUrl'].'/orders');
        $ord = $response->collect();
        $o = $ord['orders'];
        $cnt = $ord['total'];
        foreach($o as $orders){
            $results = Orders::find($orders['orderId']);
            if($results == null){
                //Insertion into Orders table.
                DB::table('orders')->insert([
                    'orderId' => $orders['orderId'],
                    'orderNumber' => $orders['orderNumber'],
                    'orderKey' => $orders['orderKey'],
                    'orderDate' => $orders['orderDate'],
                    'createDate' => $orders['createDate'],
                    'modifyDate' => $orders['modifyDate'],
                    'paymentDate' => $orders['paymentDate'],
                    'shipByDate' => $orders['shipByDate'],
                    'orderStatus' => $orders['orderStatus'],
                    'customerId' => $orders['customerId'],
                    'customerUsername' => $orders['customerUsername'],
                    'customerEmail' => $orders['customerEmail'],
                    'orderTotal' => $orders['orderTotal'],
                    'amountPaid' => $orders['amountPaid'],
                    'taxAmount' => $orders['taxAmount'],
                    'shippingAmount' => $orders['shippingAmount'],
                    'customerNotes' => $orders['customerNotes'],
                    'internalNotes' => $orders['internalNotes'],
                    'gift' => $orders['gift'],
                    'giftMessage' => $orders['giftMessage'],
                    'paymentMethod' => $orders['paymentMethod'],
                    'requestShippingService' => $orders['requestedShippingService'],
                    'carrierCode' => $orders['carrierCode'],
                    'serviceCode' => $orders['serviceCode'],
                    'packageCode' => $orders['packageCode'],
                    'confirmation' => $orders['confirmation'],
                    'shipDate' => $orders['shipDate'],
                    'holdUntilDate' => $orders['holdUntilDate'],
                    'userId' => $orders['userId'],
                    'externallyFulfilledBy' => $orders['externallyFulfilledBy'],
                    'externallyFulfilled' => $orders['externallyFulfilled']
                ]);
                // echo "Insertion of " . $orders['orderId'] . " to orders got done </br>";


                //Insertion into OrdersWeight table.
                if($orders['weight'] != null){
                    $record = $orders['weight'];
                    DB::table('order_weight')->insert([
                        'orderId' => $orders['orderId'],
                        'value' => $record['value'],
                        'units' => $record['units'],
                        'WeightUnits' => $record['WeightUnits']
                    ]);
                    // echo "Insertion into Order Weights table got done.</br>";
                }
                if($orders['items'] != null){
                    $cnt = count($orders['items']);
                    for($ite = 0;$ite < $cnt; $ite++){
                        $item = $orders['items'][$ite];


                        //Insertion into Order Items table.
                        DB::table('orderitems')->insert([
                            "orderId" => $orders['orderId'],
                            "orderItemId"=>$item['orderItemId'],
                            "lineItemKey"=>$item['lineItemKey'],
                            "sku"=>$item['sku'],
                            "name"=>$item['name'],
                            "imageUrl"=>$item['imageUrl'],
                            "quantity"=>$item['quantity'],
                            "unitPrice"=>$item['unitPrice'],
                            "taxAmount"=>$item['taxAmount'],
                            "shippingAmount"=>$item['shippingAmount'],
                            "warehouseLocation"=>$item['warehouseLocation'],
                            "productId"=>$item['productId'],
                            "fulfillmentSku"=>$item['fulfillmentSku'],
                            "adjustment"=>$item['adjustment'],
                            "upc"=>$item['upc'],
                            "createDate"=>$item['createDate'],
                            "modifyDate"=>$item['modifyDate']
                        ]);
                    }
                    // echo "Insertion of Order Items got done </br>";
                }
                if($orders['billTo'] != null){
                    $record = $orders['billTo'];


                    //Insertion into Billing Address table.
                    DB::table('billing_address')->insert([
                        "orderId"=>$orders['orderId'],
                        "name"=>$record['name'],
                        "company"=>$record['company'],
                        "street1"=>$record['street1'],
                        "street2"=>$record['street2'],
                        "street3"=>$record['street3'],
                        "city"=>$record['city'],
                        "state"=>$record['state'],
                        "postalCode"=>$record['postalCode'],
                        "country"=>$record['country'],
                        "phone"=>$record['phone'],
                        "residential"=>$record['residential'],
                        "addressVerified"=>$record['addressVerified']
                    ]);
                    // echo "Insertion of Billing Address got done</br>";
                }
                if($orders['shipTo'] != null){
                    $record = $orders['shipTo'];


                    //Insertion into Shipping Address table.
                    DB::table('shipping_address')->insert([
                        "orderId"=>$orders['orderId'],
                        "name"=>$record['name'],
                        "company"=>$record['company'],
                        "street1"=>$record['street1'],
                        "street2"=>$record['street2'],
                        "street3"=>$record['street3'],
                        "city"=>$record['city'],
                        "state"=>$record['state'],
                        "postalCode"=>$record['postalCode'],
                        "country"=>$record['country'],
                        "phone"=>$record['phone'],
                        "residential"=>$record['residential'],
                        "addressVerified"=>$record['addressVerified']
                    ]);
                    // echo "Insertion of Shipping Address got done</br>";
                }
                if($orders['advancedOptions'] != null){
                    $record = $orders['advancedOptions'];


                    //Insertion into Order AdvancedOptions table.
                    DB::table('order_advancedoptions')->insert([
                        "orderId"=>$orders['orderId'],
                        "warehouseId"=>$record['warehouseId'],
                        "nonMachinable"=>$record['nonMachinable'],
                        "saturdayDelivery"=>$record['saturdayDelivery'],
                        "containsAlcohol"=>$record['containsAlcohol'],
                        "mergedOrSplit"=>$record['mergedOrSplit'],
                        "parentId"=>$record['parentId'],
                        "storeId"=>$record['storeId'],
                        "customField1"=>$record['customField1'],
                        "customField2"=>$record['customField2'],
                        "customField3"=>$record['customField3'],
                        "source"=>$record['source'],
                        "billToParty"=>$record['billToParty'],
                        "billToAccount"=>$record['billToAccount'],
                        "billToPostalCode"=>$record['billToPostalCode'],
                        "billToCountryCode"=>$record['billToCountryCode'],
                        "billToMyOtherAccount"=>$record['billToMyOtherAccount']
                    ]);
                    // echo "Insertion of AdvancedOptions got done</br>";
                }
                if($orders['insuranceOptions'] != null){
                    $record = $orders['insuranceOptions'];


                    //Insertion into Order InsuranceOptions table.
                    DB::table('order_insuranceoptions')->insert([
                        'orderId' => $orders['orderId'],
                        'provider' => $record['provider'],
                        'insureShipment' => $record['insureShipment'],
                        'insuredValue' => $record['insuredValue']
                    ]);
                    // echo "Insertion of Insurance Options got done</br>";
                }
                if($orders['internationalOptions'] != null){
                    $record = $orders['internationalOptions'];


                    //Insertion into Order InternationalOptions table.
                    DB::table('order_internationaloptions')->insert([
                        'orderId' => $orders['orderId'],
                        'contents' => $record['contents'],
                        'nonDelivery' => $record['nonDelivery']
                    ]);
                    // echo "Insertion into InternationalOptions Table is done.</br>";
                    if($record['customsItems'] != null){
                        $countItems = count($record['customsItems']);
                        for($i = 0; $i < $countItems; $i++){
                            $item = $record['customsItems'][$i];


                            //Insertion into Order CustomsItems table.
                            DB::table('order_customsItems')->insert([
                                'orderId' => $orders['orderId'],
                                "customsItemId" => $item['customsItemId'],
                                "description" => $item['description'],
                                "quantity" => $item['quantity'],
                                "value" => $item['value'],
                                "harmonizedTariffCode" => $item['harmonizedTariffCode'],
                                "countryOfOrigin" => $item['countryOfOrigin']
                            ]);
                            // echo "Insertion into CustomsItems table is done.</br>";
                        }
                    }
                }
                if($orders['dimensions'] != null){
                    $record = $orders['dimensions'];


                    //Insertion into CusomtsItems table.
                    DB::table('order_dimensions')->insert([
                        'orderId' => $orders['orderId'],
                        'length' => $record['length'],
                        'width' => $record['width'],
                        'height' => $record['height'],
                        'units' => $record['units']
                    ]);
                    // echo "Insertion of dimensions got done</br>";
                }
            }
            else{


                //Updation of Orders table.
                DB::table('orders')->where('orderId', $orders['orderId'])->update([
                    'orderId' => $orders['orderId'],
                    'orderNumber' => $orders['orderNumber'],
                    'orderKey' => $orders['orderKey'],
                    'orderDate' => $orders['orderDate'],
                    'createDate' => $orders['createDate'],
                    'modifyDate' => $orders['modifyDate'],
                    'paymentDate' => $orders['paymentDate'],
                    'shipByDate' => $orders['shipByDate'],
                    'orderStatus' => $orders['orderStatus'],
                    'customerId' => $orders['customerId'],
                    'customerUsername' => $orders['customerUsername'],
                    'customerEmail' => $orders['customerEmail'],
                    'orderTotal' => $orders['orderTotal'],
                    'amountPaid' => $orders['amountPaid'],
                    'taxAmount' => $orders['taxAmount'],
                    'shippingAmount' => $orders['shippingAmount'],
                    'customerNotes' => $orders['customerNotes'],
                    'internalNotes' => $orders['internalNotes'],
                    'gift' => $orders['gift'],
                    'giftMessage' => $orders['giftMessage'],
                    'paymentMethod' => $orders['paymentMethod'],
                    'requestShippingService' => $orders['requestedShippingService'],
                    'carrierCode' => $orders['carrierCode'],
                    'serviceCode' => $orders['serviceCode'],
                    'packageCode' => $orders['packageCode'],
                    'confirmation' => $orders['confirmation'],
                    'shipDate' => $orders['shipDate'],
                    'holdUntilDate' => $orders['holdUntilDate'],
                    'userId' => $orders['userId'],
                    'externallyFulfilledBy' => $orders['externallyFulfilledBy'],
                    'externallyFulfilled' => $orders['externallyFulfilled']
                ]);
                // echo "Updation of orders table got done</br>";


                //Updation of Orders Weight table.
                if($orders['weight'] != null){
                    $record = $orders['weight'];
                    DB::table('order_weight')->where('orderId',$orders['orderId'])->update([
                        'orderId' => $orders['orderId'],
                        'value' => $record['value'],
                        'units' => $record['units'],
                        'WeightUnits' => $record['WeightUnits']
                    ]);
                    // echo "Updation of Order Weights table got done.</br>";
                }



                //Updation of Dimensions table.
                $record = $orders['dimensions'];
                if($record != null){
                    DB::table('order_dimensions')->where('orderId', $orders['orderId'])->update([
                        'orderId' => $orders['orderId'],
                        'length' => $record['length'],
                        'width' => $record['width'],
                        'height' => $record['height'],
                        'units' => $record['units']
                    ]);
                    // echo "Updation of dimensions table got done</br>";
                }



                //Updation of Shipping Address table.
                $record = $orders['shipTo'];
                DB::table('shipping_address')->where('orderId',$orders['orderId'])->update([
                    "orderId"=>$orders['orderId'],
                    "name"=>$record['name'],
                    "company"=>$record['company'],
                    "street1"=>$record['street1'],
                    "street2"=>$record['street2'],
                    "street3"=>$record['street3'],
                    "city"=>$record['city'],
                    "state"=>$record['state'],
                    "postalCode"=>$record['postalCode'],
                    "country"=>$record['country'],
                    "phone"=>$record['phone'],
                    "residential"=>$record['residential'],
                    "addressVerified"=>$record['addressVerified']
                ]);
                // echo "Shipping Address has been updated</br>";



                //Updation of Billing Address table.
                $record = $orders['billTo'];
                DB::table('billing_address')->where('orderId',$orders['orderId'])->update([
                    "orderId"=>$orders['orderId'],
                    "name"=>$record['name'],
                    "company"=>$record['company'],
                    "street1"=>$record['street1'],
                    "street2"=>$record['street2'],
                    "street3"=>$record['street3'],
                    "city"=>$record['city'],
                    "state"=>$record['state'],
                    "postalCode"=>$record['postalCode'],
                    "country"=>$record['country'],
                    "phone"=>$record['phone'],
                    "residential"=>$record['residential'],
                    "addressVerified"=>$record['addressVerified']
                ]);
                // echo "Billing Address has been updated</br>";



                //Updation of OrderItems table.
                if($orders['items'] != null){
                    $cnt = count($orders['items']);
                    for($ite = 0;$ite < $cnt; $ite++){
                        $item = $orders['items'][$ite];
                        $no_of_items = DB::table('orderitems')->where([['orderId','=',$orders['orderId']],['orderitemId','=',$item['orderItemId']]])->count();
                        if($no_of_items == 0){
                            // echo $no_of_items;
                            DB::table('orderitems')->insert([
                                "orderId" => $orders['orderId'],
                                "orderItemId"=>$item['orderItemId'],
                                "lineItemKey"=>$item['lineItemKey'],
                                "sku"=>$item['sku'],
                                "name"=>$item['name'],
                                "imageUrl"=>$item['imageUrl'],
                                "quantity"=>$item['quantity'],
                                "unitPrice"=>$item['unitPrice'],
                                "taxAmount"=>$item['taxAmount'],
                                "shippingAmount"=>$item['shippingAmount'],
                                "warehouseLocation"=>$item['warehouseLocation'],
                                "productId"=>$item['productId'],
                                "fulfillmentSku"=>$item['fulfillmentSku'],
                                "adjustment"=>$item['adjustment'],
                                "upc"=>$item['upc'],
                                "createDate"=>$item['createDate'],
                                "modifyDate"=>$item['modifyDate']
                            ]);
                            // echo "Order Item has been inserted</br>";
                        }else{
                            DB::table('orderitems')->where([['orderId','=',$orders['orderId']],['orderItemId','=',$item['orderItemId']]])->update([
                                "orderId" => $orders['orderId'],
                                "orderItemId"=>$item['orderItemId'],
                                "lineItemKey"=>$item['lineItemKey'],
                                "sku"=>$item['sku'],
                                "name"=>$item['name'],
                                "imageUrl"=>$item['imageUrl'],
                                "quantity"=>$item['quantity'],
                                "unitPrice"=>$item['unitPrice'],
                                "taxAmount"=>$item['taxAmount'],
                                "shippingAmount"=>$item['shippingAmount'],
                                "warehouseLocation"=>$item['warehouseLocation'],
                                "productId"=>$item['productId'],
                                "fulfillmentSku"=>$item['fulfillmentSku'],
                                "adjustment"=>$item['adjustment'],
                                "upc"=>$item['upc'],
                                "createDate"=>$item['createDate'],
                                "modifyDate"=>$item['modifyDate']
                            ]);
                            // echo "Order item has been updated</br>";
                        }

                    }
                }



                //Updation of AdvancedOptions
                if($orders['advancedOptions'] != null){
                    $record = $orders['advancedOptions'];
                    DB::table('order_advancedoptions')->where('orderId',$orders['orderId'])->update([
                        "orderId"=>$orders['orderId'],
                        "warehouseId"=>$record['warehouseId'],
                        "nonMachinable"=>$record['nonMachinable'],
                        "saturdayDelivery"=>$record['saturdayDelivery'],
                        "containsAlcohol"=>$record['containsAlcohol'],
                        "mergedOrSplit"=>$record['mergedOrSplit'],
                        "parentId"=>$record['parentId'],
                        "storeId"=>$record['storeId'],
                        "customField1"=>$record['customField1'],
                        "customField2"=>$record['customField2'],
                        "customField3"=>$record['customField3'],
                        "source"=>$record['source'],
                        "billToParty"=>$record['billToParty'],
                        "billToAccount"=>$record['billToAccount'],
                        "billToPostalCode"=>$record['billToPostalCode'],
                        "billToCountryCode"=>$record['billToCountryCode'],
                        "billToMyOtherAccount"=>$record['billToMyOtherAccount']
                    ]);
                    // echo "Updation of AdvancedOptions got done</br>";
                }



                //Updation of InsuranceOptions
                if($orders['insuranceOptions'] != null){
                    $record = $orders['insuranceOptions'];
                    DB::table('order_insuranceoptions')->where('orderId',$orders['orderId'])->update([
                        'orderId' => $orders['orderId'],
                        'provider' => $record['provider'],
                        'insureShipment' => $record['insureShipment'],
                        'insuredValue' => $record['insuredValue']
                    ]);
                    // echo "Updation of Insurance Options got done</br>";
                }



                //Updation of InternationalOptions and CustomsItems
                if($orders['internationalOptions'] != null){
                    $record = $orders['internationalOptions'];
                    DB::table('order_internationaloptions')->where('orderId',$orders['orderId'])->update([
                        'orderId' => $orders['orderId'],
                        'contents' => $record['contents'],
                        'nonDelivery' => $record['nonDelivery']
                    ]);
                    // echo "Updation of Internationaloptions got done.</br>";
                    if($record['customsItems'] != null){
                        $countItems = count($record['customsItems']);
                        for($i = 0; $i < $countItems; $i++){
                            $item = $record['customsItems'][$i];
                            $no_of_items = DB::table('order_customsitems')->where([['orderId','=',$orders['orderId']],['customsItemId','=',$item['customsItemId']]])->count();
                            if($no_of_items == 0){
                                DB::table('order_customsItems')->insert([
                                    'orderId' => $orders['orderId'],
                                    "customsItemId" => $item['customsItemId'],
                                    "description" => $item['description'],
                                    "quantity" => $item['quantity'],
                                    "value" => $item['value'],
                                    "harmonizedTariffCode" => $item['harmonizedTariffCode'],
                                    "countryOfOrigin" => $item['countryOfOrigin']
                                ]);
                                // echo "Insertion into CustomsItems table is done.</br>";
                            }else{
                                DB::table('order_customsitems')->where([['orderId','=',$orders['orderId']],['customsItemId','=',$item['customsItemId']]])->update([
                                    'orderId' => $orders['orderId'],
                                    "customsItemId" => $item['customsItemId'],
                                    "description" => $item['description'],
                                    "quantity" => $item['quantity'],
                                    "value" => $item['value'],
                                    "harmonizedTariffCode" => $item['harmonizedTariffCode'],
                                    "countryOfOrigin" => $item['countryOfOrigin']
                                ]);
                                // echo "Updation of CustomsItems table got done.</br>";
                            }

                        }

                    }
                }
            }
        }
        $orders = Orders::all();
        $orderItems = OrderItems::all();
        return view('orders', [
            'orders' => $orders,
            'items' => $orderItems
        ]);
    }

    public function markShipped(Request $request){
        $credentials = $this->getCredentials();
        $input = $request->input('mark');
        $date = Carbon::now()->toDateString();
        $response = null;
        if($input != null){
            $carrier_code = Orders::where('orderId',$input)->get();
            $response = Http::withBasicAuth($credentials['api_key'], $credentials['api_secret'])->post($credentials['baseUrl'].'/orders/markasshipped', [
                "orderId" => $input,
                "carrierCode" => $carrier_code[0]['carrierCode'],
                "shipDate" => $date,
        ]);
        }
        $this->insertOrders();
        $orders = Orders::where('orderStatus',"shipped")->get();
        return view('markShipped',[
            'shipped' => $orders,
            'orderId' => $input,
            'response' => $response
        ]);
    }
}
