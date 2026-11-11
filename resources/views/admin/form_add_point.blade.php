@extends('layouts.forms_admin')
@section('title', 'Создание точки')
@section('content')
    <h2>Создание точки</h2>
    <form method="post" action="{{ route('admin.point.store') }}">
        @csrf

        <div class="input-group">
            <label class="input-label">Адрес точки</label>
            <input type="text" name="point_address" class="input-field" value="{{ old('point_address') }}">
            @error('point_address')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="input-group" style="margin-top: 15px;">
            <label class="input-label">Номер телефона администратора</label>
            <input type="tel" id="admin_phone" name="admin_phone" class="input-field" value="{{ old('admin_phone') }}" placeholder="+7 (999) 123-45-67" maxlength="18">
            @error('admin_phone')
                <span class="error-message">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-actions" style="margin-top: 20px;">
            <button type="submit" class="add-btn" style="padding: 10px 20px; cursor: pointer;">Добавить точку</button>
        </div>
    </form>
