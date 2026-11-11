@extends('layouts.forms_admin')

@section('title', 'Редактирование точки')

@section('content')
    <h2>Редактирование точки</h2>

    <form method="post" action="{{ route('admin.point.update', $point->id) }}">
        @csrf
        @method('PUT')

        <div class="input-group">
            <label class="input-label">Адрес точки</label>
            <input type="text" name="point_address" class="input-field" value="{{ old('point_address', $point->point_address) }}">
            @error('point_address')
                <span class="error-message">{{ $message }}</span>
            @enderror

            <label class="input-label" style="margin-top: 15px;">Номер телефона администратора</label>
            <input type="tel" id="admin_phone" name="admin_phone" class="input-field" value="{{ old('admin_phone', $point->phone_admin) }}" placeholder="+7 (999) 123-45-67" maxlength="18">
            @error('admin_phone')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-actions" style="margin-top: 20px;">
            <button type="submit" class="add-btn" style="padding: 10px 20px; cursor: pointer;">Сохранить изменения</button>
            <a href="{{ route('admin.points') }}" style="margin-left: 10px;">Отмена</a>
        </div>
    </form>
