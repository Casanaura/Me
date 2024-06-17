@extends('layouts.app')

@section('title', $user->name . ' - Profile')

@section('content')
<style>
.inventory-container.common {
    background-color: #d7d7d7;
}

.inventory-container.uncommon {
    background-color: #b7deb7;
}

.inventory-container.rare {
    background-color: #a3bcd5;
}

.inventory-container.mythic {
    background-color: #cabee2;
}

.inventory-container.legendary {
    background-color: #f5e4c4;
}

.inventory-container.limitededition {
    background-color: #ffcaca;
}

</style>
<div class="container">
    <div class="row">
        <!-- Left Column: User Information -->
        <div class="col-md-3">
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

        <!-- Center Column: Publications and Comments -->
        <div class="col-md-6 mt-4">
            <div class="card">
                <div class="card-header">
                    <h5>Publications</h5>
                </div>
                <div class="card-body">
                    @foreach($publications as $publication)
                        <div class="publication">
                            <p>{{ $publication->content }}</p>
                            <small>{{ $publication->created_at }}</small>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header">
                    <h5>Comments</h5>
                </div>
                <div class="card-body">
                    @foreach($comments as $comment)
                        <div class="comment">
                            <p>{{ $comment->content }}</p>
                            <small>{{ $comment->created_at }}</small>
                        </div>
                        <hr>
                    @endforeach
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
                            <div class="col-6 mb-3 d-flex flex-column align-items-center">
                                <div class="badge-container" style="width: 80px; height: 80px; background: #f8f9fa; border: 1px solid #dee2e6; border-radius: 8px; display: flex; flex-direction: column; align-items: center; justify-content: center;">
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
                            <div class="col-6 mb-3 d-flex flex-column align-items-center">
                                <div class="inventory-container {{ str_replace(' ', '', strtolower($item->type)) }}" style="width: 80px; height: 80px; border: 1px solid #dee2e6; border-radius: 8px; display: flex; flex-direction: column; align-items: center; justify-content: center; overflow: hidden;">
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
