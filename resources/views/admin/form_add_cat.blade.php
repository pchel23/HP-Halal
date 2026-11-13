@extends('layouts.forms_admin')
@section('title', 'Создание категории')
@section('content')
    <h2>Создание категории</h2>

    <form method="post" action="{{ route('admin.category.store') }}">

        @csrf
        <div class="input-group">
            <label class="input-label">Название категории</label>
            <input type="text" name="category_name" class="input-field" value="{{ old('category_name') }}">
            @error('category_name')
                <span class="error-message">{{ $message }}</span>
            @enderror
            <button class="btn-form" type="submit" class="add-btn">Добавить категорию</button>
        </div>
    </form>
@endsection
