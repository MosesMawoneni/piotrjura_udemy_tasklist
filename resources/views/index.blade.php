@extends("layouts.app")
@section("title","All Tasks")
@section("content")
<div>
   @forelse ($tasks as $task )
   <p>
       <a href="{{ route('tasks.show',['task'=>$task->id]) }}">
       {{ $task->title }}
    </a>

    </p> 
    @empty
    <p>There are no tasks</p>
    @endforelse
</div>
@endsection