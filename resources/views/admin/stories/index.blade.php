@extends('layouts.app') @section('content') @include('partials.flash')

<div class="card">
    <div class="card-header">Your Stories
        <a href="" class="float-right" data-toggle="modal" data-target="#exampleModal">Trash</a>
    </div>
    <div class="card-body">
        @if ($stories->count() > 0)
        @foreach ($stories as $story)
        <div class="card">
            <div class="card-body">
                <h5>
                    <a href="{{ route('story.show', ['id' => $story->id]) }}">{{ $story->title }}</h5>
                </a>
                <p>{{ $story->body }}</p>
                <p>{{ $story->image }}</p>
                <p>{{ $story->slug }}</p>
            </div>
        </div>
        <br>
        @endforeach
        @else
        <p>No story here..</p>
        @endif
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Trashed story</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if ($trashed_stories->count() > 0) 
                @foreach ($trashed_stories as $trashed_story)
                <div class="card mb-3">
                    <div class="card-body">
                        <form action="{{ route('story.restore', ['id' => $trashed_story->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm float-right ml-2">Restore!</button>
                        </form>
                        <form action="{{ route('story.destroy', ['id' => $trashed_story->id]) }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm float-right">Delete permanently!</button>
                        </form>
                        <h6>{{ $trashed_story->title }}</h6>
                        <p>{{ $trashed_story->body }}</p>
                    </div>
                </div>
                @endforeach
                @else
                <p>Trash some here..</p>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
