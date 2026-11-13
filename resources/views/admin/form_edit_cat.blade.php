@extends('layouts.forms_admin')

@section('title', 'Редактирование категории')

@section('content')
    <h2>Редактирование категории</h2>
    <form method="post" action="{{ route('admin.category.update', $category->id) }}">
        @csrf
        @method('PUT')

        <div class="input-group">
            <label class="input-label">Название категории</label>
            <input type="text" name="category_name" class="input-field" value="{{ old('category_name', $category->category_name) }}">
            @error('category_name')
                <span class="error-message">{{ $message }}</span>
            @enderror

            <button class="btn-form" type="submit" class="add-btn">Сохранить изменения</button>

        </div>
    </form>
@endsection
