@extends('layouts.app')

@section('title', $user->name . ' - Profile')

@section('content')
<div class="container">
    <div class="row">
        <!-- Left Column: User Information -->
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <img src="{{ $user->avatar }}" alt="Avatar" class="img-fluid">
                    <img src="{{ $user->cover_photo }}" alt="Cover Photo" class="img-fluid mt-2">
                </div>
                <div class="card-body">
                    <h5>{{ $user->name }}</h5>
                    <p>Registered: {{ $user->created_at->format('d M Y') }}</p>
                    <p>Last Login: {{ $user->last_login_at ? $user->last_login_at->format('d M Y H:i') : 'N/A' }}</p>
                    <p>Money: {{ $user->money }}</p>
                    <p>Role: <i class="{{ $role->icon }}"></i> {{ $role->name }}</p>
                    <p>Bio: {{ $user->bio }}</p>
                    <p>Country: {{ $user->country }}</p>
                    <p>Website: <a href="{{ $user->website }}" target="_blank">{{ $user->website }}</a></p>
                    <p>Followers: {{ $user->count_followers }}</p>
                    <p>Following: {{ $user->count_following }}</p>
                </div>
            </div>
        </div>

        <!-- Center Column: Publications and Comments -->
        <div class="col-md-6">
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
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h5>Badges</h5>
                </div>
                <div class="card-body">
                    @foreach($badges as $badge)
                        <div class="badge">
                            <p><strong>{{ $badge->badge_name }}</strong></p>
                            <p>{{ $badge->badge_desc }}</p>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header">
                    <h5>Inventory</h5>
                </div>
                <div class="card-body">
                    @foreach($inventoryItems as $item)
                        <div class="inventory-item">
                            <p><strong>{{ $item->name }}</strong></p>
                            <p>{{ $item->description }}</p>
                            <p>{{ $item->type }}</p>
                            <small>Fingerprint: {{ $item->item_fingerprint }}</small>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
