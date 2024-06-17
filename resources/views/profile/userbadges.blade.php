@extends('layouts.app')

@section('title', $user->name . ' - Badges')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>All Badges of {{ $user->name }}</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($badges as $badge)
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <div class="row no-gutters">
                                        <div class="col-md-4 d-flex align-items-center justify-content-center">
                                            <img src="{{ $badge->badge_img }}" alt="{{ $badge->badge_name }}" class="img-fluid p-2">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $badge->badge_name }}</h5>
                                                <p class="card-text">{{ $badge->badge_desc }}</p>
                                                <p class="card-text"><small class="text-muted">{{ $badge->created_at }}</small></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
