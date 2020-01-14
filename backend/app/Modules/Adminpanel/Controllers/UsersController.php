<?php

namespace App\Modules\Adminpanel\Controllers;

use App\Modules\Adminpanel\Models\User;
use App\Modules\Adminpanel\Models\Branch;
use App\Modules\Adminpanel\Models\Department;
use App\Modules\Adminpanel\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('Adminpanel::users.index', ['users' => $users]);
    }

    public function create()
    {
        $users = User::all();
        $roles = [1=>'Сотрудник',2=>'Проверяющий'];
        $positions = Position::all();
        $branches = Branch::all();
        $departments = Department::all();
        return view('Adminpanel::users.create', ['users' => $users, 'roles'=> $roles,'positions'=>$positions,'departments'=>$departments,'branches'=>$branches]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'	=>	'required|max:15',
            'login'   =>  'required|unique:users|max:15',
            'password' => 'required',
            'position' => 'required',
            'department' => 'required',
            'branch' => 'required'
        ]);

        $users = User::add([
            'name' => $request['name'],
            'login' => $request['login'],
            'password' => Hash::make($request['password']),
            'position_id' => $request['position'],
            'department_id' => $request['department'],
            'branch_id' => $request['branch']
        ]);

        return redirect()->route('adminpanel.users.index');
    }

    public function edit($id)
    {
        $roles = [1=>'Сотрудник',2=>'Проверяющий'];
        $users = User::find($id);
        $positions = Position::all();
        $branches = Branch::all();
        $departments = Department::all();
        return view('Adminpanel::users.edit', ['users'=>	$users,'roles'=> $roles, 'branches'=> $branches, 'departments'=> $departments, 'positions'=> $positions, 'departments'=>$departments]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'	=>	'required', //обязательно
            'login' => 'required',
            'password' => 'required'
        ]);

        $user = User::find($id);
        $user->update([
            'name' => $request['name'],
            'login' => $request['login'],
            'role' => $request ['role'],
            'password' => Hash::make($request['password']),
            'department_id' => $request['department'],
            'branch_id' => $request['branch'],
            'position_id'=> $request['position'],

        ]);

        return redirect()->route('adminpanel.users.index');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('adminpanel.users.index');
    }

}
