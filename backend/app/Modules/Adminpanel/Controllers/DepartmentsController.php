<?php

namespace App\Modules\Adminpanel\Controllers;

use App\Modules\Adminpanel\Models\Department;
use App\Modules\Adminpanel\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class DepartmentsController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('Adminpanel::departments.index', ['departments' => $departments]);
    }

        public function create()
        {
            $branches = Branch::all();
            $departments = Department::all();
            return view('Adminpanel::departments.create', ['departments' => $departments, 'branches' => $branches]);
        }

        public function store(Request $request)
        {
            //dd($request);
            $this->validate($request, [
                'name'	=>	'required',
                'branch_id' => 'required',
                'priority' => 'required'
            ]);

            $departments = Department::add($request->all());

            return redirect()->route('adminpanel.departments.index');
        }

        public function edit($id)
        {
            $departments = Department::find($id);
            return view('Adminpanel::departments.edit', ['departments'=>$departments]);
        }

        public function update(Request $request, $id)
        {
            $this->validate($request, [
                'name'	=>	'required' //обязательно
            ]);

            $departments = Department::find($id);
            $departments->update([
                'name' => $request['name'],
                'priority' => $request['priority']
            ]);

            return redirect()->route('adminpanel.departments.index');
        }

        public function destroy($id)
        {
            Department::find($id)->delete();
            return redirect()->route('adminpanel.departments.index');
        }

}
