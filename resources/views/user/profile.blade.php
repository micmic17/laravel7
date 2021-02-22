@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/user/profile.css') }}">
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body text-center">
                    <form action="/update/{{ $user->id }}" enctype="multipart/form-data" method="post">
                        <div class="user-profile-image">
                            @csrf
                            <button type="button" id="upload_profile_image">Upload file</button>
                            <input name="image" type="file" id="my_file" class="d-none">
                            @if ($user->profile_image == null || file_exists(asset('/storage/' .
                            $user->profile_image)))
                            <img src="{{ asset('/storage/default_profile_image.png') }}" alt="default image profile">
                            @else
                            <img src="{{ asset('/storage/' . $user->profile_image) }}"
                                alt="{{ $user->name }}'s profile image">
                            @endif
                        </div>
                        <input name="name" class="user-name form-control text-center" value="{{ $user->name }}">
                        <input name="email" class="user-email form-control text-center" contenteditable="true"
                            value="{{ $user->email }}">
                        <button type="submit" class="btn btn-primary" id="edit_user_profile">Edit Profile</button>
                    </form>
                </div>

                <div class="card-footer text-muted text-right">
                    Last edited {{ $user->updated_at->diffForHumans() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/user/profile.js') }}"></script>
@stop