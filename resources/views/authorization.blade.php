@extends('layouts.app')
@section('title', 'Авторизация')
@section('content')
    <form class="form-wrapper" method="post" action="{{route('login')}}">
        @csrf
            <div class="form-box">
                <div class="form-tab">АВТОРИЗАЦИЯ</div>

                <div class="input-group">
                    <label class="input-label">Почта</label>
                    <input type="email" name="email" class="input-field" value="{{old('email')}}">
                    @error('email')<span>{{$message}}</span>@enderror
                </div>
                <div class="input-group">
                    <label class="input-label">Пароль</label>
                    <input type="password" name="password" class="input-field" value="{{old('password')}}">
                    @error('password')<span>{{$message}}</span>@enderror
                </div>

                <button class="submit-btn">ОТПРАВИТЬ</button>

                <div class="switch-link">
                    Нет аккаунта? <a href="{{route('registration')}}">Зарегистрируйтесь</a>
                </div>

               
                <img src="../images/shayrma.png" class="form-side-image">                
                </div>
            </div>
    </form>
@endsection

