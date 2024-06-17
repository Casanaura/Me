@extends('layouts.app')

@section('title', $user->name . ' - Inventory')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-header">
                    <h5>{{ $user->name }}'s Inventory</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($inventoryItems as $item)
                            <div class="col-6 col-md-3 mb-3 d-flex flex-column align-items-center">
                                <div class="inventory-container {{ str_replace(' ', '', strtolower($item->type)) }}" style="width: 80px; height: 80px; border: 1px solid #dee2e6; border-radius: 8px; display: flex; flex-direction: column; align-items: center; justify-content: center; overflow: hidden;">
                                    <img src="{{ $item->icon }}" alt="{{ $item->name }}" class="img-fluid" style="max-width: 60px; max-height: 60px;">
                                </div>
                                <small>{{ $item->name }}</small>
                            </div>
                        @endforeach
                    </div>
                    <div class="text-right mt-2">
                        <a href="{{ url('/me/' . $user->name) }}" class="text-primary" style="cursor: pointer;">Volver al perfil del usuario</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
