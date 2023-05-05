@extends('layouts.default')

@section('title', 'Вхід')

@section('content')
    <div class="full-wrapper">
        <form action="{{ route('login-action') }}" method="POST" autocomplete="on" class="account-form">
            <div class="form-title">Вітаю, увійдіть щоб розпочати</div>
            <a href="{{ route('register') }}"><button type="button">Створити акаунт</button></a>
            @error('email')
                <div style="color: red;">{{ $message }}</div>
            @enderror
            <input type="email" name="email" placeholder="Логін">
        
            <input type="password" name="password" placeholder="Пароль">
        
            <button type="submit" class="blue">Увійти</button>
            @csrf
        </form>
        <img src="{{ asset('./icons/people.svg') }}">
    </div>
@endsection
