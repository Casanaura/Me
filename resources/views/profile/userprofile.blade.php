@extends('layouts.app')

@section('title', $user->name . ' - Profile')

@push('styles')
    <link href="{{ plugin_asset('me', 'css/rarity.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="container">
    <div class="row">
        <!-- Left Column: User Information -->
        <div class="col-md-3 mt-4">
            <div class="card">
                <div class="card-body" style="position: relative; padding: 0;">
                    <div style="background-image: url('{{ $user->cover_photo }}'); background-size: cover; background-position: center; height: 200px; position: relative;">
                        <div style="position: absolute; bottom: -50px; left: 50%; transform: translateX(-50%);">
                            <img src="{{ $user->avatar }}" alt="Avatar" class="rounded-circle" style="width: 100px; height: 100px; border: 5px solid white;">
                        </div>
                    </div>
                    <div style="padding: 70px 20px 20px;">
                        <h5>{{ $user->name }}</h5>
                        <p>{{ $user->bio }}</p>
                        <p><i class="bi bi-geo-alt"></i> {{ $user->country }} <i class="bi bi-globe"></i> <a href="{{ $user->website }}" target="_blank">{{ $user->website }}</a></p>
                        <p><i class="bi bi-calendar"></i> Joined {{ $user->created_at->format('F Y') }}</p>
                        <p><strong>{{ $user->count_following }}</strong> Following <strong>{{ $user->count_followers }}</strong> Followers</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Center Column: Tabs for Publications, Comments, and Likes -->
        <div class="col-md-6 mt-4">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="publications-tab" data-bs-toggle="tab" href="#publications" role="tab" aria-controls="publications" aria-selected="true">Posts</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="comments-tab" data-bs-toggle="tab" href="#comments" role="tab" aria-controls="comments" aria-selected="false">Replies</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="likes-tab" data-bs-toggle="tab" href="#likes" role="tab" aria-controls="likes" aria-selected="false">Likes</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="publications" role="tabpanel" aria-labelledby="publications-tab">
                        @foreach($publications as $publication)
                            <div class="publication">
                                <div class="d-flex">
                                    <img src="{{ $user->avatar }}" alt="Avatar" class="rounded-circle me-2" style="width: 50px; height: 50px;">
                                    <div>
                                        <strong>{{ $user->name }}</strong>
                                        <p>{{ $publication->content }}</p>
                                        <small class="text-muted">{{ $publication->created_at }}</small>
                                        <div class="d-flex align-items-center">
                                            <span class="me-3"><i class="bi bi-chat"></i> 0</span>
                                            <span class="me-3"><i class="bi bi-heart"></i> 0</span>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        @endforeach
                    </div>
                    <div class="tab-pane fade" id="comments" role="tabpanel" aria-labelledby="comments-tab">
                        @foreach($comments as $comment)
                            <div class="comment">
                                <div class="d-flex">
                                    <img src="{{ $user->avatar }}" alt="Avatar" class="rounded-circle me-2" style="width: 50px; height: 50px;">
                                    <div>
                                        <strong>{{ $user->name }}</strong>
                                        <p>{{ $comment->content }}</p>
                                        <small class="text-muted">{{ $publication->created_at }}</small>
                                        <div class="d-flex align-items-center">
                                            <span class="me-3"><i class="bi bi-heart"></i> 0</span>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        @endforeach
                    </div>
                    <div class="tab-pane fade" id="likes" role="tabpanel" aria-labelledby="likes-tab">
                        <!-- Aquí irá el contenido de los likes en el futuro -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: Badges and Inventory -->
        <div class="col-md-3 mt-4">
            <div class="card">
                <div class="card-header">
                    <h5>Badges</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($badges as $badge)
                            <div class="col-4 mb-3 d-flex flex-column align-items-center">
                                <div class="rarity-container {{ str_replace(' ', '', strtolower($badge->badge_type)) }}" style="width: 80px; height: 80px; border: 1px solid #dee2e6; border-radius: 8px; display: flex; flex-direction: column; align-items: center; justify-content: center; overflow: hidden;">
                                    <img src="{{ $badge->badge_img }}" alt="{{ $badge->badge_name }}" class="img-fluid" style="max-width: 50px; max-height: 50px;">
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="text-right mt-2">
                        <a href="{{ url('/me/' . $user->name . '/badges') }}" class="text-primary" style="cursor: pointer;">View All Badges</a>
                    </div>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header">
                    <h5>Inventory</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($inventoryItems as $item)
                            <div class="col-4 mb-3 d-flex flex-column align-items-center">
                                <div class="rarity-container {{ str_replace(' ', '', strtolower($item->type)) }}" style="width: 80px; height: 80px; border: 1px solid #dee2e6; border-radius: 8px; display: flex; flex-direction: column; align-items: center; justify-content: center; overflow: hidden;">
                                    <img src="{{ $item->icon }}" alt="{{ $item->name }}" class="img-fluid" style="max-width: 60px; max-height: 60px;">
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="text-right mt-2">
                        <a href="{{ url('/me/' . $user->name . '/inventory') }}" class="text-primary" style="cursor: pointer;">View All Items</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
