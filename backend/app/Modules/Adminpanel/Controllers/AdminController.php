<?php

namespace App\Modules\Adminpanel\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Curl;

class AdminController extends Controller

{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()

    {

        return view('Adminpanel::index');

    }

    public function send(Request $request) {
        $data = [];
        $all_data = [];
        $proposal = [];

        dd($request);
        foreach ($request['products'] as $key=>$product) {
            $data[$key] = [
                'head' => '222#1',
                'original' => [
                    "55",    //д товара	Наименование	Количество	Тип товара	Действия

                    "57",    // Спецификация комплекта:WTax,Vat,SaleTax
                    "58",
                    "9", "69", "5", "105\\1", "212\\9", "213\\9", "210\\1", "210\\206#2\\1", "210\\215\\216\\1", "1"
                ],
                'values' => [
                    [0.0], // Спецификация комплекта:WTax,Vat,SaleTax
                    [0.0], // Спецификация комплекта:WTax,Vat,SaleTax
                    [0.0], // Спецификация комплекта:WTax,Vat,SaleTax
                    [0.0],
                    [$product['count']], //кол-во товара 1.0 - 1шт, 2.0 - 2шт ...
                    [1.0], //кратное
                    [0],
                    [29360136],
                    [0],
                    [0],
                    [$product['id']], // [id goods]
                    [5],
                    [0],
                    [null]
                ],
                'status' => [
                    ['Insert']
                ]
            ];
        }

        $all_data['data'] = $data;
        $all_data['type'] = $request['proposal']['type'];
        $all_data['status'] = $request['proposal']['status'];
        $all_data['hour'] = $request['proposal']['hour'];
        $all_data['name'] = $request['proposal']['name'];
        $all_data['department'] = $request['proposal']['department'];
        $all_data['exdepartment'] = $request['proposal']['exdepartment'];

        $json_data_prod = json_encode($all_data);

        $response = Curl::to('http://house.evos.uz/admin/api/insert')
        ->withData($json_data_prod)
        ->enableDebug('/home/bogdan/Projects/crm.local/logs/ixudralogs.txt')
        ->post();

        return $json_data_prod;
        }
    
    
}
