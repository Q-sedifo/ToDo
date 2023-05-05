@extends('layouts.default')

@section('title', 'Home')

@section('content')
    <div>
        <div class="title">Мій список</div>
        <div class="list">
            <div class="list-item add" task-list-add-path="{{ route('tasklist-create') }}"></div>

            @foreach ($tasklists as $tasklist)
                <a href="{{ route('task-list', $tasklist->id) }}">
                    <div class="list-item">
                        {{ $tasklist->name }}
                        <div class="count">{{ $tasklist->tasks->count() }}</div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection

@section('modal')
    <div class="modal add-taskList-window">
        <div class="widget" mobile-keyboard>
            <div>
                <textarea type="text" placeholder="Створити новий список"></textarea>
            </div>
            <div class="section right">
                <button id="add-taskList-btn" type="button" disabled>Зберегти</button>
            </div>
        </div>
    </div>
@endsection