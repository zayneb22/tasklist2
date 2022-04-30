<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TaskController extends Controller
{
    // for  retrieve data by alphabetical order
    public function index()
    {
        $tasks = DB::table('tasks')->get();
        $tasks = DB::table('tasks')->orderBy('name')->get();
        return view('tasks', compact('tasks'));
    }
    // insert data
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:15 | min:3|string'
        ]);
        DB::table('tasks')->insert([
            // 'name' => $_REQUEST['name'];
            'name' => $request->name,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        // relod the same page
        return redirect()->back();
    }
    // delete data
    public function delete($id)
    {
        // $deleted = DB::table('users')->delete(); for all table
        DB::table('tasks')->where('id', '=', $id)->delete();
        return redirect()->back();
    }

    public function edit($id)
    {
        $tasks = DB::table('tasks')->orderBy('name')->get();
        $task = DB::table('tasks')->find($id); // updated record in db
        return view('edit', compact('task', 'tasks'));
    }

    public function update(Request $request, $id)
    {
        $task = DB::table('tasks')
            ->where('id', '=', $id)
            ->update(['name' => $request->name]);
        $tasks = DB::table('tasks')->orderBy('name')->get();
        // go to root
        return redirect('/');
    }
}
