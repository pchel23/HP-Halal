@extends('layouts.app')
@section('title', 'Регистрация')
@section('content')
    <form class="form-wrapper" method="post" action="{{route('user_create')}}">
    @csrf
        <div class="form-box">
                <div class="form-tab">РЕГИСТРАЦИЯ</div>

                <div class="input-group">
                    <label class="input-label">Введите адрес эл.почты</label>
                    <input type="email" name="email" class="input-field" value="{{old('email')}}">
                    @error('email')<span>{{$message}}</span>@enderror
                </div>
                <div class="input-group">
                    <label class="input-label">Придумайте пароль</label>
                    <input type="password" name="password" class="input-field">
                    @error('password')<span>{{$message}}</span>@enderror
                </div>
                <div class="input-group">
                    <label class="input-label">Повторите пароль</label>
                    <input type="password" name="password_confirmation" class="input-field">
                </div>

                <button class="submit-btn">ОТПРАВИТЬ</button>

                <div class="switch-link">
                    Есть аккаунт? <a href="{{route('authorization')}}">Войти</a>
                </div>

                
                <img src="../images/shashlyk.png" class="form-side-image">
        </div>
    </form>
@endsection