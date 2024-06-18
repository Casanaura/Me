@extends('layouts.app')

@section('title', 'Edit Profile')

@push('styles')
    <link href="{{ plugin_asset('me', 'css/rarity.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="container">
    <div class="row">
        <!-- User Info -->
        <div class="col-md-12 mt-4 text-center">
            <div style="background-image: url('{{ $user->cover_photo }}'); background-size: cover; background-position: center; height: 200px; position: relative;">
                <div style="position: absolute; bottom: -50px; left: 50%; transform: translateX(-50%);">
                    <img src="{{ $user->avatar }}" alt="Avatar" class="rounded-circle" style="width: 100px; height: 100px; border: 5px solid white;">
                </div>
            </div>
            <h3>{{ $user->name }}</h3>
            <p>Registered: {{ $user->created_at->format('F d, Y') }}</p>
            <p>Money: {{ $user->money }}</p>
        </div>

        <!-- Tabs -->
        <div class="col-md-12 mt-4">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="personalization-tab" data-bs-toggle="tab" href="#personalization" role="tab" aria-controls="personalization" aria-selected="true">Personalization</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="mydata-tab" data-bs-toggle="tab" href="#mydata" role="tab" aria-controls="mydata" aria-selected="false">My Data</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <!-- Personalization -->
                <div class="tab-pane fade show active" id="personalization" role="tabpanel" aria-labelledby="personalization-tab">
                    <form action="{{ route('me.updateProfile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-4">
                            <label for="avatar">Change Avatar</label>
                            <input type="file" class="form-control" id="avatar" name="avatar">
                        </div>
                        <div class="form-group mt-4">
                            <label for="cover_photo">Change Cover Photo</label>
                            <input type="file" class="form-control" id="cover_photo" name="cover_photo">
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Update</button>
                    </form>
                </div>
                <!-- My Data -->
                <div class="tab-pane fade" id="mydata" role="tabpanel" aria-labelledby="mydata-tab">
                    <form action="{{ route('me.updateProfile') }}" method="POST">
                        @csrf
                        <div class="form-group mt-4">
                            <label for="country">Country</label>
                            <input type="text" class="form-control" id="country" name="country" value="{{ $user->country }}">
                        </div>
                        <div class="form-group mt-4">
                            <label for="website">Website</label>
                            <input type="text" class="form-control" id="website" name="website" value="{{ $user->website }}">
                        </div>
                        <div class="form-group mt-4">
                            <label for="bio">Biography</label>
                            <textarea class="form-control" id="bio" name="bio" rows="3">{{ $user->bio }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
