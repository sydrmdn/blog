@extends('layouts.app') @section('content') @include('partials.flash')

<div class="card">
    <div class="card-header">Your Stories</div>
    <div class="card-body">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('story.delete', ['id' => $story->id]) }}" method="POST">
                    @csrf {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger btn-sm float-right">Delete</button>
                </form>
                <h5>{{ $story->title }}</h5>
                <p>{{ $story->body }}</p>
                <p>{{ $story->image }}</p>
                <p>{{ $story->slug }}</p>
            </div>
        </div>
    </div>
</div>

@endsection
