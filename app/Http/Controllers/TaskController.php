<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tasks = Task::paginate(5);
        //dd($tasks);
        return view('home')->with(['tasks' => $tasks]);
    }

    /**
     * mark a task as complete
     * @param $tasks
     */
    public function mark_complete(Task $task)
    {
        if ($task->update(['complete' => true])) {
            return back()->with('msg', 'Task updated');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required',
            'desc' => 'required|min:3'
        ]);

        //dd($input);

        if (Auth::User()->tasks()->create($input)) {
            return back()->with('msg', 'Task created');
        }
        // } else {
        //     return back()->with('err', 'Task create failed');
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('show-task')->with('task', $task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param    $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $input = $request->validate([
            'name' => 'required',
            'desc' => 'required|min:3'
        ]);

        if ($task->update($input)) {
            return back()->with('msg', 'Task Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        // dd($task);
        if ($task->delete()) {
            return redirect()->route('home')->with('msg', 'Task Deleted');
        }
    }
}
