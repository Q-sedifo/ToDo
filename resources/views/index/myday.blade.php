@extends('layouts.default')

@section('title', 'Мій день')

@section('header-title')
    <div class="header-title">мій день</div>
@endsection

@section('content')
        <div class="space-between section">
            <div class="small-title">Tasks - <span id="tasks-count">{{ $tasks->count() }}</span></div>
            <div class="date">{{ $date->translatedFormat('l, j F') }}</div>
        </div>
        <div class="add-new-task-btn"></div>
        <div data-id="0" class="task-list {{ $tasks->count() ? '' : 'empty' }}">
            @if ($tasks->count() > 0)
                @foreach ($tasks as $task)
                    @include('components.task', compact('task'))
                @endforeach
            @endif
            <div class="empty-message">
                <div class="text">
                    <div>Привіт, <span>{{ auth()->user()->name }}.</span></div>
                    Поки немає завдань на сьогодні
                </div>
                <img src="{{ asset('icons/meteorites.svg') }}">
            </div>
        </div>
        <div class="add-new-task-btn-mobile"></div>
@endsection

@section('modal')
    @include('components.addTaskModal')
@endsection