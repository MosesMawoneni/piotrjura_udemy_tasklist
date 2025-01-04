<?php

use Illuminate\Support\Facades\Route;
use App\Models\Task;
use App\Http\Requests\TaskRequest;
Route::get("/", function () {
    return redirect()->route("tasks.index");
});

Route::get('/tasks', function () {
    return view("index", [
        "tasks" => Task::latest()->get(),
    ]);
})->name("tasks.index");


Route::view("tasks/create", "create")->name("tasks.create");

Route::get("tasks/{task}/edit", function (Task $task) {
    return view("edit", ["task" => $task]);
})->name("tasks.edit");


Route::get("tasks/{task}", function (Task $task) {
    return view("show", ["task" => $task]);
})->name("tasks.show");

Route::post("/tasks", function (TaskRequest $request) {
    // $data = $request->validated();
    // $task = new Task;
    // $task->title = $data['title'];
    // $task->description = $data['description'];
    // $task->long_description = $data['long_description'];
    // $task->save();
    $task = Task::create($request->validated());

    return redirect()->route("tasks.show", ["task" => $task->id])->with("success", "Task created successfully!");
})->name("tasks.store");

Route::put("/tasks/{task}", function (Task $task, TaskRequest $request) {
    // $data = $request->validated();
    // $task->title = $data['title'];
    // $task->description = $data['description'];
    // $task->long_description = $data['long_description'];
    // $task->save();
    $task->update($request->validated());
    return redirect()->route("tasks.show", ["task" => $task->id])->with("success", "Task updated successfully!");
})->name("tasks.update");


Route::fallback(function () {
    return "Still got somewhere!";
});

