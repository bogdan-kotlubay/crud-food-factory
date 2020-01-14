<?php

namespace App\Modules\Adminpanel\Controllers;

use App\Modules\Adminpanel\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class BranchesController extends Controller
{
    public function index()
    {
        $branches = Branch::all();
        return view('Adminpanel::branches.index', ['branches' => $branches]);
    }

    public function create()
    {
        $branches = Branch::all();
        return view('Adminpanel::branches.create', ['branches' => $branches]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'	=>	'required'
        ]);

        $branches = Branch::add($request->all());

        return redirect()->route('adminpanel.branches.index');
    }

    public function edit($id)
    {
        $branches = Branch::find($id);
        return view('Adminpanel::branches.edit', ['branches' => $branches]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'	=>	'required' //обязательно
        ]);

        $branches = Branch::find($id);
        $branches->update([
            'name' => $request['name']
        ]);

        return redirect()->route('adminpanel.branches.index');
    }

    public function destroy($id)
    {
        Branch::find($id)->delete();
        return redirect()->route('adminpanel.branches.index');
    }


        
}
