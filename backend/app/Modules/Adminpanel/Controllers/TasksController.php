<?php

namespace App\Modules\Adminpanel\Controllers;

use App\Modules\Adminpanel\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('Adminpanel::tasks.index', ['tasks' => $tasks]);
    }

    public function create()
    {
        $tasks = Task::all();
        return view('Adminpanel::tasks.create', ['tasks' => $tasks]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'	=>	'required'
        ]);
        $tasks = Task::add([
        'name' => $request['name']
            ]);

        return redirect()->route('adminpanel.tasks.index');
    }

    public function edit($id)
    {
        $tasks = Task::find($id);
        return view('Adminpanel::tasks.edit', ['tasks'=>$tasks]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'	=>	'required' //обязательно
        ]);

        $tasks = Task::find($id);
        $tasks->update([
            'name' => $request['name']
        ]);

        return redirect()->route('adminpanel.tasks.index');
    }

    public function destroy($id)
    {
        Task::find($id)->delete();
        return redirect()->route('adminpanel.tasks.index');
    }

}
