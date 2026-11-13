@extends('layouts.forms_admin')
@section('title', 'Создание дополнения')
@section('content')
    <h2>Создание дополнения</h2>

    <form method="post" action="{{ route('admin.addon.store') }}">

        @csrf
        <div class="input-group">
            <label class="input-label">Название дополнения</label>
            <input type="text" name="name_addon" class="input-field" value="{{ old('name_addon') }}">
            @error('name_addon')
                <span class="error-message">{{ $message }}</span>
            @enderror
            <label class="input-label">Выберите категорию</label>
            <select name="category_id" class="input-field">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <span class="error-message">{{ $message }}</span>
            @enderror
            <button class="btn-form" type="submit" class="add-btn">Добавить дополнение</button>
        </div>
    </form>
@endsection
