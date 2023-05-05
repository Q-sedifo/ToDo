@extends('layouts.default')

@section('title', $tasklist->name)

@section('header-title')
    <div class="header-title">{{ $tasklist->name }}</div>
@endsection

@section('content')
    <div class="small-title section">Tasks - <span id="tasks-count">{{ $tasklist->tasks->count() }}</span></div>
    <div class="space-between">
        <div class="add-new-task-btn"></div>
    </div>
    <div data-id="{{ $tasklist->id }}" class="task-list {{ $tasklist->tasks->count() ? '' : 'empty' }}">
        @if ($tasklist->tasks->count() > 0)
            @foreach ($tasklist->tasks as $task)
                @include('components.task', compact('task'))
            @endforeach
        @endif
        <div class="empty-message">
            <div class="text"><span>В цьому списку поки немає завдань</span></div>
            <img src="{{ asset('icons/meteorites.svg') }}">
        </div>
    </div>
    <div class="add-new-task-btn-mobile"></div>
@endsection

@section('modal')
    @include('components.addTaskModal')
@endsection