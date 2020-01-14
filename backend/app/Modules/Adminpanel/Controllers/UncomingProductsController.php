<?php

namespace App\Modules\Adminpanel\Controllers;

use App\Modules\Adminpanel\Models\UncomingProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Curl;

class UncomingProductsController extends Controller
{
    public function index()
    {
        // GET API GROUPS
        $url_groups = Curl::to('http://house.evos.uz/api/request/groups')
        ->get();

        $response_array_groups = json_decode($url_groups,true);

        $url_customers = json_decode(Curl::to('http://house.evos.uz/api/request/customer')
        ->get(),true);

        $response_groups = array_combine($response_array_groups["rid"], array_values($response_array_groups['categories']));

        $response_customers = array_combine($url_customers["id"], array_values($url_customers['name']));

        $uncomingproducts = UncomingProduct::all();
        return view('Adminpanel::uncomingproducts.index', ['uncomingproducts' => $uncomingproducts, 'response_groups'=>$response_groups, 'response_customers'=>$response_customers]);
    }

    public function store(Request $request)
    {

        $uncomingproducts = UncomingProduct::add([
            'name' => $request['name-proposal'],
            'department' => $request['department-proposal'],
            'exdepartment' => $request['exdepartment-proposal'],
            'hour' => $request['hour-proposal'],
            'status' => $request['status-proposal'],
            'type' => $request['type-proposal']
        ]);
        return redirect()->route('adminpanel.uncomingproducts.index');
    }

    public function edit($id)
    {
        $uncomingproducts = UncomingProduct::find($id);
        $units = [1=>'кг',2=>'л',3=>'шт'];
        return view('Adminpanel::uncomingproducts.edit', ['uncomingproducts'=>$uncomingproducts,'units'=>$units ]);
    }

    public function update(Request $request, $id)
    {
        $uncomingproducts = UncomingProduct::find($id);
        $uncomingproducts->update([
            'name' => $request['name-proposal'],
            'department' => $request['department-proposal'],
            'exdepartment' => $request['exdepartment-proposal'],
            'hour' => $request['hour-proposal'],
            'status' => $request['status-proposal'],
            'type' => $request['type-proposal']
        ]);

        return redirect()->route('adminpanel.uncomingproducts.index');
    }

    public function destroy($id)
    {
        UncomingProduct::find($id)->delete();
        return redirect()->route('adminpanel.uncomingproducts.index');
    }

}
