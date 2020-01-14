<?php

namespace App\Modules\Adminpanel\Controllers;

header("Content-type: text/plain; charset=utf-8");

use App\Modules\Adminpanel\Models\ComingProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Curl;

class ComingProductsController extends Controller
{
    public function index()
    {
        $comingproducts = Comingproduct::all();
        // GET API GROUPS
        $url_groups = Curl::to('http://house.evos.uz/api/request/groups')
            ->get();

        $url_customers = json_decode(Curl::to('http://house.evos.uz/api/request/customer')
            ->get(),true);

        $response_array_groups = json_decode($url_groups,true);


        $response_groups = array_combine($response_array_groups["rid"], array_values($response_array_groups['categories']));

        $response_customers = array_combine($url_customers["id"], array_values($url_customers['name']));

        return view('Adminpanel::comingproducts.index',['response_groups'=>$response_groups, 'comingproducts'=>$comingproducts, 'response_customers'=>$response_customers]);

    }
    
        public function store(Request $request)
        {
            $request->validate([
                'name-proposal' => 'required',
                'department-proposal' => 'required',
                'exdepartment-proposal' => 'required',
                'hour-proposal' => 'required',
                'status-proposal' => 'required',
                'type-proposal' => 'required'
            ]);
                
            $comingproducts = Comingproduct::add([
                'name' => $request['name-proposal'],
                'department' => $request['department-proposal'],
                'exdepartment' => $request['exdepartment-proposal'],
                'hour' => $request['hour-proposal'],
                'status' => $request['status-proposal'],
                'type' => $request['type-proposal']
            ]);
        
            return redirect()->route('adminpanel.comingproducts.index');
        }        



        public function edit($id)
        {
            $comingproducts = ComingProduct::find($id);
            $coming_type = [0=>'Внешняя',1=>'Внутренняя'];
            $coming_hour = [0=>'',1=>'Весь день'];
            $coming_status = [0=>'Неактивная',1=>'Активная'];
            return view('Adminpanel::comingproducts.edit', ['comingproducts'=>$comingproducts,'coming_type'=>$coming_type, 'coming_status'=>$coming_status, 'coming_hour'=>$coming_hour ]);
        }

        public function update(Request $request, $id)
        {
            $comingproducts = ComingProduct::find($id);
            $comingproducts->update([
                'name' => $request['name-proposal'],
                'type' => $request['type-proposal'],
                'hour' => $request['hour-proposal'],
                'status'=>$request['status-proposal'],
                'department' => $request['department-proposal'],
                'exdepartment' => $request['exdepartment-proposal']
            ]);

            return redirect()->route('adminpanel.comingproducts.index');
        }

        public function destroy($id)
        {
            ComingProduct::find($id)->delete();
            return redirect()->route('adminpanel.comingproducts.index');
        }

}
