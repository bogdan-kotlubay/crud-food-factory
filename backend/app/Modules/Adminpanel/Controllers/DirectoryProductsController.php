<?php

namespace App\Modules\Adminpanel\Controllers;

use App\Modules\Adminpanel\Models\Directory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\CsvDataImport;
use DB;
use Excel;

class DirectoryProductsController extends Controller
{

    public function index () {
        $directoryproducts = Directory::all();
        return view('Adminpanel::directory.index',['directoryproducts' => $directoryproducts]);
    }

    public function store (Request $request)
    {
        $directoryproducts = Directory::all();
        $this->validate($request, [
            'select_file' => 'required'
        ]);
        $path1 = $request->file('select_file')->store('temp');
        $path=storage_path('app').'/'.$path1;


        $data = Excel::import(new CsvDataImport, $path);
        return redirect(route('adminpanel.directory.index'));
    }
    
    
    
    public function edit($id)
        {
            $directoryproduct = Directory::find($id);
            return view('Adminpanel::directory.edit', ['directoryproduct'=>$directoryproduct]);
        }

        public function update(Request $request, $id)
        {
            $this->validate($request, [
                'name'	=>	'required', //обязательно
                'summa' => 'required',
                'nds' => 'required',
                'summa2' => 'required',
            ]);

            $directoryproduct = Directory::find($id);
            $directoryproduct->update([
                'name' => $request['name'],
                'count' => $request['count'],
                'summa' => $request['summa'],
                'nds' => $request['nds'],
                'summa2' => $request['summa2'],
            ]);

            return redirect()->route('adminpanel.directory.index');
        }

    
    public function destroy($id) {
        Directory::Find($id)->delete();
        return redirect()->route('adminpanel.directory.index');
    }

    public function directoryDestroyAll(Request $request){
       
        $del = Directory::all();
        foreach ($del as $dell) {
           
            $dell->delete();
        }
        
        return redirect()->route('adminpanel.directory.index');
    }
}
