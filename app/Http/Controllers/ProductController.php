<?php

namespace App\Http\Controllers;


use App\Models\Products;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;

class ProductController extends Controller
{

    //Function to get Authentication Credentials
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
    //Function to get Products from the local database.
    public function getProducts() {
        $products = Products::all();
        return view('products',[
            'products' => $products
        ]);
    }

    //Function to get Product details from Shipstation and update it into the local database.
    public function insertProducts(){
        $credentials = $this->getCredentials();
        $response = Http::withBasicAuth($credentials['api_key'], $credentials['api_secret'])->get($credentials['baseUrl'].'/products');
        $p = $response->collect();      //Taking the response content in a variable
        $products = $p['products'];     //Accessing only the products part of the response content
        $cnt = count($products);
        for($i = 0;$i < $cnt; $i++){    //To get each product in the products array.
            $prod = $products[$i];
            $results = Products::find($prod['productId']);
            if($results == null){
                DB::table('products')->insert([
                    'productId' => $prod['productId'],
                    'aliases' => $prod['aliases'],
                    'sku' => $prod['sku'],
                    'name' => $prod['name'],
                    'defaultCost' => $prod['defaultCost'],
                    'price' => $prod['price'],
                    'length' => $prod['length'],
                    'width' => $prod['width'],
                    'height' => $prod['height'],
                    'weightOz' => $prod['weightOz'],
                    'internalNotes' => $prod['internalNotes'],
                    'fulfillmentSku' => $prod['fulfillmentSku'],
                    'createDate' => $prod['createDate'],
                    'modifyDate' => $prod['modifyDate'],
                    'active' => $prod['active'],
                    'productType' => $prod['productType'],
                    'warehouseLocation' => $prod['warehouseLocation'],
                    'defaultCarrierCode' => $prod['defaultCarrierCode'],
                    'defaultServiceCode' => $prod['defaultServiceCode'],
                    'defaultPackageCode' => $prod['defaultPackageCode'],
                    'defaultIntlCarrierCode' => $prod['defaultIntlCarrierCode'],
                    'defaultIntlServiceCode' => $prod['defaultIntlServiceCode'],
                    'defaultIntlPackageCode' => $prod['defaultIntlPackageCode'],
                    'defaultConfirmation' => $prod['defaultConfirmation'],
                    'defaultIntlConfirmation' => $prod['defaultIntlConfirmation'],
                    'customsDescription' => $prod['customsDescription'],
                    'customsValue' => $prod['customsValue'],
                    'customsTarriffNo' => $prod['customsTariffNo'],
                    'customsCountryCode' => $prod['customsCountryCode'],
                    'noCustoms' => $prod['noCustoms'],
                ]);
                if($prod['tags'] != null){
                    foreach($prod['tags'] as $tag){
                        DB::table('prod_tags')->insert([
                            'productId' => $prod['productId'],
                            'tagId' => $tag['tagId'],
                            'name' => $tag['name']
                        ]);
                    }
                }
                if($prod['productCategory'] != null){
                        DB::table('prod_categories')->insert([
                            'productId' => $prod['productId'],
                            'categoryId' => $prod['productCategory']['categoryId'],
                            'name' => $prod['productCategory']['name']
                        ]);
                }else{
                    DB::table('prod_categories')->insert([
                        'productId' => $prod['productId'],
                        'categoryId' => null,
                        'name' => null
                    ]);
                }
            }
            else{
                DB::table('products')->where('productId', $prod['productId'])->update([
                    'productId' => $prod['productId'],
                    'aliases' => $prod['aliases'],
                    'sku' => $prod['sku'],
                    'name' => $prod['name'],
                    'defaultCost' => $prod['defaultCost'],
                    'price' => $prod['price'],
                    'length' => $prod['length'],
                    'width' => $prod['width'],
                    'height' => $prod['height'],
                    'weightOz' => $prod['weightOz'],
                    'internalNotes' => $prod['internalNotes'],
                    'fulfillmentSku' => $prod['fulfillmentSku'],
                    'createDate' => $prod['createDate'],
                    'modifyDate' => $prod['modifyDate'],
                    'active' => $prod['active'],
                    'productType' => $prod['productType'],
                    'warehouseLocation' => $prod['warehouseLocation'],
                    'defaultCarrierCode' => $prod['defaultCarrierCode'],
                    'defaultServiceCode' => $prod['defaultServiceCode'],
                    'defaultPackageCode' => $prod['defaultPackageCode'],
                    'defaultIntlCarrierCode' => $prod['defaultIntlCarrierCode'],
                    'defaultIntlServiceCode' => $prod['defaultIntlServiceCode'],
                    'defaultIntlPackageCode' => $prod['defaultIntlPackageCode'],
                    'defaultConfirmation' => $prod['defaultConfirmation'],
                    'defaultIntlConfirmation' => $prod['defaultIntlConfirmation'],
                    'customsDescription' => $prod['customsDescription'],
                    'customsValue' => $prod['customsValue'],
                    'customsTarriffNo' => $prod['customsTariffNo'],
                    'customsCountryCode' => $prod['customsCountryCode'],
                    'noCustoms' => $prod['noCustoms'],
                ]);
                if($prod['productCategory'] != null){
                    DB::table('prod_categories')->where('productId', $prod['productId'])->update([
                        'productId' => $prod['productId'],
                        'categoryId' => $prod['productCategory']['categoryId'],
                        'name' => $prod['productCategory']['name']
                    ]);
                }
                if($prod['tags'] != null){
                    foreach($prod['tags'] as $tag){
                        $numofr = DB::table('prod_tags')->where([['productId','=',$prod['productId']],['tagId','=',$tag['tagId']]])->count();
                        if($numofr > 0){
                            DB::table('prod_tags')->where([['productId','=',$prod['productId']],['tagId','=',$tag['tagId']]])->update([
                                'productId' => $prod['productId'],
                                'tagId' => $tag['tagId'],
                                'name' => $tag['name']
                            ]);
                        }else{
                            DB::table('prod_tags')->insert([
                                'productId' => $prod['productId'],
                                'tagId' => $tag['tagId'],
                                'name' => $tag['name']
                            ]);
                            echo "New Tag added";
                        }

                    }
                }
            }
        }
        $products = Products::all();
        return view('products',[
            'products' => $products
        ]);
    }
}
