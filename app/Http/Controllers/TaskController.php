<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    public function index()
    {
        $tasks = Task::where(['user_id'=>Auth::id()])->paginate(Task::TASKS_PER_PAGE);
        return view('profile.tasks.index',compact('tasks'));
    }

    public function create()
    {
        return view('profile.tasks.create');
    }


    public function store(TaskRequest $request)
    {

        Task::create($request->validated());

        return redirect()->route('tasks.index', app()->getLocale())->with('status', __('main.operation_success'));
    }

    public function show(Task $task)
    {
        $this->authorize('show',$task);

        return view('profile.tasks.show', compact('task'));
    }


    public function edit(Task $task)
    {
        $this->authorize('edit',$task);

        return view('profile.tasks.edit', compact('task'));
    }

    public function update(TaskRequest $request, Task $task)
    {
        $this->authorize('update',$task);

        $task->update($request->validated());

        return redirect()->route('tasks.index', app()->getLocale())->with('success', __('main.operation_success'));;

    }

    public function destroy(Task $task)
    {
        $this->authorize('destroy',$task);

        $task->delete();

        return redirect()->route('tasks.index', app()->getLocale())->with('success', __('main.operation_success'));

    }


}
