@extends('layouts.app') @section('content') @include('partials.flash')

<div class="card">
    <div class="card-header">Your Team
        <a href="" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#exampleModal">Add team</a>
    </div>
    <div class="card-body">
        @if ($users->count() > 0) 
        @foreach ($users as $user)
        <div class="list-group">
            <a href="{{ route('user.show', ['slug' => $user->slug ]) }}" class="list-group-item list-group-item-action">
                <div class="media">
                    <img class="mr-3 rounded-circle" src="{{ $user->avatar }}" alt="" width="64px" height="64px">
                    <div class="media-body">
                        <h5 class="mt-0">{{ $user->name }}</h5>
                        {{ $user->email }}
                    </div>
                    <h5>
                        <span class="badge badge-primary">
                            @foreach($user->roles as $role) {{ $role->name }} @endforeach
                        </span>
                    </h5>
                </div>
            </a>
        </div>
        @endforeach
        @else
        <p>takde</p>
        @endif
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add team</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="text" name="email" class="form-control"> @if ($errors->has('email'))
                        <p class="text-danger">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>Roles:</label>
                        <select name="role" class="custom-select">
                            @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('email'))
                        <p class="text-danger">{{ $errors->first('email') }}</p>
                        @endif
                    </div>
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
    </div>
</div>

@endsection
