@extends('layouts.app_admin')
@section('title', 'Точки')
@section('content')
        <h1 class="main-title">Точки</h1>
        <div class="top-controls">
            <input type="text" class="search-input" placeholder="Напишите название...">
        </div>
      <div class="list-container">
    @forelse($points as $point)
        <div class="list-item">
            <div class="item-info">
                <strong>№ {{ $point->id }}:</strong>
                <span>{{ $point->address }}</span>
                 <span>{{ $point->phone_admin }}</span>
            </div>
            <div class="item-actions">
                 <a href="{{ route('admin.point.edit', $point->id) }}" class="btn-edit">Редактировать</a>
               <form action="{{ route('admin.point.delete', $point->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn-delete">Удалить</button>
    </form>
            </div>
        </div>
    @empty
        <div class="list-item">
            <div class="item-info">
                <span>Точки еще не добавлены.</span>
            </div>
        </div>
    @endforelse
</div>
        <a href="{{route('form_point')}}" class="add-btn">+</a>
@endsection

