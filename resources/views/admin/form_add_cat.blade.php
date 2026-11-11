@extends('layouts.forms_admin')
@section('title', 'Создание категории')
@section('content')
    <h2>Создание категории</h2>

<form method="post" action="{{ route('admin.point.store') }}">

        @csrf
        <div class="input-group">
            <label class="input-label">Название категории</label>
            <input type="text" name="category_name" class="input-field" value="{{old('category_name')}}">
            @error('category_name')<span class="error-message">{{$message}}</span>@enderror
        </div>
        <div class="form-actions" style="margin-top: 20px;">
            <button type="submit" class="add-btn" style="padding: 10px 20px; cursor: pointer;">Добавить категорию</button>
        </div>
    </form>
@endsection
