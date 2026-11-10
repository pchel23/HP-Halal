@extends('layouts.forms_admin')

@section('title', 'Редактирование категории')

@section('content')
    <h2>Редактирование</h2>
    <form method="post" action="{{ route('admin.category.update', $category->id) }}">
        @csrf
        @method('PUT')

        <div class="input-group">
            <label class="input-label">Название категории</label>
            <input type="text" name="category_name" class="input-field" value="{{ old('category_name', $category->category_name) }}">
            @error('category_name')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-actions" style="margin-top: 20px;">
            <button type="submit" class="add-btn" style="padding: 10px 20px; cursor: pointer;">Сохранить изменения</button>
            <a href="{{ route('admin.categories') }}" style="margin-left: 10px;">Отмена</a>
        </div>
    </form>
@endsection
