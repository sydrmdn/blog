@extends('layouts.app') @section('content') @include('partials.flash')

<div class="card mb-4">
    <div class="card-body">
        <div class="list-group">
            <ul class="list-group-item list-group-item-action">
                <div class="media">
                    <img class="mr-3 rounded-circle" src="{{ $user->avatar }}" alt="" width="64px" height="64px">
                    <div class="media-body">
                        <h5 class="mt-0">{{ $user->name }}</h5>
                        {{ $user->email }}
                    </div>
                    <h5>
                        <span class="badge badge-primary">
                            Entahla
                        </span>
                    </h5>
                </div>
            </ul>
        </div>
    </div>
</div>

<div class="card mb-4">
    <div class="card-body">
        <form action="{{ route('user.update', ['id' => $user->id]) }}" method="POST">
            @csrf @method('PATCH')
            <button type="submit" class="btn btn-primary float-right">Update!</button>
            <h5 class="mb-4">Your Profile</h5>
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}"> @if ($errors->has('name'))
                <p class="text-danger">{{ $errors->first('name') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label>Avatar:</label>
                <input type="text" name="avatar" class="form-control" value="{{ $user->avatar }}"> @if ($errors->has('avatar'))
                <p class="text-danger">{{ $errors->first('avatar') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="text" name="email" class="form-control" value="{{ $user->email }}"> @if ($errors->has('email'))
                <p class="text-danger">{{ $errors->first('email') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label>Slug:</label>
                <input type="text" name="slug" class="form-control" value="{{ $user->slug }}"> @if ($errors->has('slug'))
                <p class="text-danger">{{ $errors->first('slug') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label>Bio:</label>
                <textarea type="text" name="bio" class="form-control" value="{{ $user->bio }}">{{ $user->bio }}</textarea>
                @if ($errors->has('bio'))
                <p class="text-danger">{{ $errors->first('bio') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label>Twitter URL:</label>
                <input type="text" name="twitter_url" class="form-control" value="{{ $user->twitter_url }}"> @if ($errors->has('twitter_url'))
                <p class="text-danger">{{ $errors->first('twitter_url') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label>Facebook URL:</label>
                <input type="text" name="facebook_url" class="form-control" value="{{ $user->facebook_url }}"> @if ($errors->has('facebook_url'))
                <p class="text-danger">{{ $errors->first('facebook_url') }}</p>
                @endif
            </div>

        </form>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="mb-4">Change Password</h5>
        <form action="{{ route('user.password', ['id' => $user->id]) }}" method="POST">
            @csrf @method('PATCH')
            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" class="form-control"> @if ($errors->has('password'))
                <p class="text-danger">{{ $errors->first('password') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label>Confirm password:</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Add!</button>
            </div>
        </form>
    </div>
</div>

@endsection
