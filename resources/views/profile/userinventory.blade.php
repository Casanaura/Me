@extends('layouts.app')

@section('title', $user->name . ' - Inventory')

@push('styles')
        <link href="{{ plugin_asset('me', 'css/rarity.css') }}" rel="stylesheet">
@endpush

@push('scripts')
@endpush

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
                            @php
                                $rarityClass = strtolower(str_replace(' ', '', $item->type));
                            @endphp
                            <div class="col-md-3 mb-4">
                                <div class="card h-100 rarity-container {{ str_replace(' ', '', strtolower($item->type)) }}">
                                    <div class="row no-gutters h-100">
                                        <div class="col-md-4 d-flex align-items-center justify-content-center">
                                            <img src="{{ $item->icon }}" alt="{{ $item->name }}" class="img-fluid p-2">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $item->name }}</h5>
                                                <p class="card-text">{{ $item->description }}</p>
                                                <p class="card-text"><small class="text-muted">{{ $item->created_at }}</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $inventoryItems->links() }}
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
