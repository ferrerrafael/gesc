<?php

namespace App\Http\Controllers;


use App\Models\Tasks;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreTasksRequest;
use App\Http\Requests\UpdateTasksRequest;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource. 
     */
    public function index() : View
    {
        return view('tasks.index', [
            'tasks' => Tasks::latest()->paginate(3)
        ]);
    }
 
    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTasksRequest $request) : RedirectResponse
    {
        Tasks::create($request->all());
        return redirect()->route('tasks.index')
                ->withSuccess('New Remision is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tasks $tasks) : View
    {
        return view('tasks.show', [
            'tasks' => $tasks
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tasks $tasks) : View
    {
        return view('tasks.edit', [
            'tasks' => $tasks
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTasksRequest $request, Tasks $taks) : RedirectResponse
    {
        $tasks->update($request->all());
        return redirect()->back()
                ->withSuccess('Tasks is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tasks $tasks) : RedirectResponse
    {
        $tasks->delete();
        return redirect()->route('tasks.index')
                ->withSuccess('Tasks is deleted successfully.');
    }
}
