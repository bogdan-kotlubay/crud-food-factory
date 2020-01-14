<?php

namespace App\Modules\Adminpanel\Controllers;

use App\Modules\Adminpanel\Models\Position;
use App\Modules\Adminpanel\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class PositionsController extends Controller
{
    public function index()
    {
        $positions = Position::all();
        return view('Adminpanel::positions.index', ['positions' => $positions]);
    }

    public function create()
    {
        $positions = Position::all();
        $departments = Department::all();
        return view('Adminpanel::positions.create', ['positions' => $positions, 'departments' => $departments]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'	=>	'required',
            'department' => 'required'
        ]);


        $positions = Position::add([
            'name' => $request['name'],
            'department_id' => $request['department'],

        ]);

        // $positions->setDepartments($request->get('positions'));

        return redirect()->route('adminpanel.positions.index');
    }

    public function edit($id)
    {
        $positions = Position::find($id);
        $departments = Department::all();
        return view('Adminpanel::positions.edit', ['positions'=>$positions,'departments'=>$departments]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'	=>	'required' //обязательно
        ]);

        $positions = Position::find($id);
        $positions->update([
            'name' => $request['name'],
            'department_id'=>$request['department']
        ]);

        return redirect()->route('adminpanel.positions.index');
    }

    public function destroy($id)
    {
        Position::find($id)->delete();
        return redirect()->route('adminpanel.positions.index');
    }

}
