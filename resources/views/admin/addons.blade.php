@extends('layouts.app_admin')
@section('title', 'Дополнения')
@section('content')
    <h1 class="main-title">ДОПОЛНЕНИЯ</h1>
    <div class="list-container">
        @forelse($addons as $addon)
            <div class="list-item">
                <div class="item-info">
                    <strong>№ {{ $addon->id }}:</strong>
                    <span>название: {{ $addon->name_addon }}</span>
                    <span>категория: {{ $addon->category_name }}</span>
                </div>
                <div class="item-actions">
                    <a href="{{ route('admin.addon.edit', $addon->id) }}" class="btn-edit">Редактировать</a>
                    <form action="{{ route('admin.addon.delete', $addon->id) }}" method="POST" ...>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">Удалить</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="list-item">
                <div class="item-info">
                    <span>Дополнения еще не добавлены.</span>
                </div>
            </div>
        @endforelse
    </div>
    <a href="{{ route('form_addon') }}" class="add-btn">+</a>
@endsection
