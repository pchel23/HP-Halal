@extends('layouts.app_admin')
@section('title', 'Категории')
@section('content')
    <h1 class="main-title">КАТЕГОРИИ</h1>
    <div class="top-controls">
        <input type="text" class="search-input" placeholder="Напишите название...">
    </div>
    <div class="list-container">
        @forelse($categories as $category)
            <div class="list-item">
                <div class="item-info">
                    <strong>№ {{ $category->id }}:</strong>
                    <span>{{ $category->category_name }}</span>
                </div>
                <div class="item-actions">
                    <a href="{{ route('admin.category.edit', $category->id) }}" class="btn-edit">Редактировать</a>
                    <form action="{{ route('admin.category.delete', $category->id) }}" method="POST" ...>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">Удалить</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="list-item">
                <div class="item-info">
                    <span>Категории еще не добавлены.</span>
                </div>
            </div>
        @endforelse
    </div>
    <a href="{{ route('form_category') }}" class="add-btn">+</a>
@endsection
