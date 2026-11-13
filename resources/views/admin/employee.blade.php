@extends('layouts.app_admin')
@section('title', 'Сотрудники')
@section('content')
    <h1 class="main-title">СОТРУДНИКИ</h1>
    <div class="list-container">
        @forelse($users as $user)
            <div class="list-item">
                <div class="item-info">
                    <strong>№ {{ $user->id }}:</strong>
                    <span>Имя: {{ $user->name }}</span>
                    <span>Эл. почта: {{ $user->email }}</span>
                    <span>Точка работы: {{ $user->point_address }}</span>
                </div>
                <div class="item-actions">
                    <a href="{{ route('admin.employee.edit', $user->id) }}" class="btn-edit">Редактировать</a>
                    <form action="{{ route('admin.employee.delete', $user->id) }}" method="POST" ...>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">Удалить</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="list-item">
                <div class="item-info">
                    <span>Сотрудники еще не добавлены.</span>
                </div>
            </div>
        @endforelse
    </div>
    <a href="{{ route('form_employee') }}" class="add-btn">+</a>
@endsection
