@extends('layouts.forms_admin')
@section('title', 'Редактирование сотрудника')
@section('content')
    <h2>Редактирование сотрудника</h2>

    <form method="post" action="{{ route('admin.employee.update', $employee->id) }}">

        @csrf
        @method('PUT')
        <div class="input-group">
            <label class="input-label">ФИО сотрудника</label>
            <input type="text" name="name" class="input-field" value="{{old('name', $employee->name)}}">
            @error('name')<span class="error-message">{{$message}}</span>@enderror
            <label class="input-label">Электронная почта</label>
            <input type="email" name="email" class="input-field" value="{{old('email', $employee->email)}}">
            @error('email')<span class="error-message">{{$message}}</span>@enderror
            <label class="input-label">Пароль</label>
            <input type="password" name="password" class="input-field">
            @error('password')<span class="error-message">{{$message}}</span>@enderror
            <label class="input-label">Повторите пароль</label>
            <input type="password" name="password_confirmation" class="input-field">
            <label class="input-label">Точка работы</label>
            <select name="point_id" class="input-field">
                @foreach($points as $point)
                    <option value="{{ $point->id }}" {{ old('point_id', $employee->point_id) == $point->id ? 'selected' : '' }}>
                        {{ $point->address }}
                    </option>
                @endforeach
            </select>
            @error('point_id')<span class="error-message">{{$message}}</span>@enderror
            <button class="btn-form" type="submit" class="add-btn">Сохранить изменения</button>
        </div>
    </form>
@endsection
