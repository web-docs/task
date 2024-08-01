<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index()
    {
        $tasks = Task::where(['user_id'=>auth()->id])->paginate(Task::TASKS_PER_PAGE);
        return view('profile.tasks.index',compact($tasks));
    }

    public function create()
    {
        return view('profile.tasks.form');
    }


    public function store(TaskRequest $request)
    {
        Task::create($request->validated());

        return redirect()->route('profile.tasks.index', app()->getLocale())->with('status', 'Operation successfull completed!');
    }

    public function show(Task $task)
    {
        return view('profile.tasks.show', compact('task'));
    }


    public function edit(Task $task)
    {
        return view('profile.tasks.form', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $params = $request->all();
        $task->update($params['task']);

        return redirect()->route('profile.tasks.index', app()->getLocale())->with('success', 'Operation successfull completed!');;

    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('profile.tasks.index', app()->getLocale())->with('success', 'Operation successfull completed!');

    }


}
