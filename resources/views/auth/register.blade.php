@extends('layouts.default')

@section('title', 'Реєстрація')

@section('content')
    <div class="full-wrapper">
        <form action="{{ route('register-action') }}" method="POST" autocomplete="on" class="account-form">
            <div class="form-title">Створити акаунт</div>
            <a href="{{ route('login') }}"><button type="button">Увійти</button></a>

            @error('name')
                <div style="color: red;">{{ $message }}</div>
            @enderror
            <input type="text" name="name" placeholder="Ваше ім'я">
        
            @error('email')
                <div style="color: red;">{{ $message }}</div>
            @enderror
            <input type="email" name="email" placeholder="Email">
            
            @error('password')
                <div style="color: red;">{{ $message }}</div>
            @enderror
            @error('password_confirmation')
                <div style="color: red;">{{ $message }}</div>
            @enderror
            <div class="form-row">
                <input type="password" name="password" placeholder="Пароль">
                <input type="password" name="password_confirmation" placeholder="Повторіть пароль">
            </div>
            <button type="submit" class="blue">Створити акаунт</button>
            @csrf
        </form>
    </div>
@endsection
