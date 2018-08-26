@extends('layouts.app') @section('content') @include('partials.flash')

<div class="card">
    <div class="card-header">Your Stories</div>
    <div class="card-body">
        @foreach ($stories as $story)
        <div class="card">
            <div class="card-body">
                <h5><a href="{{ route('story.show', ['id' => $story->id]) }}">{{ $story->title }}</h5></a>
                <p>{{ $story->body }}</p>
                <p>{{ $story->image }}</p>
                <p>{{ $story->slug }}</p>
            </div>
        </div>
        <br> @endforeach
    </div>
</div>

@endsection
