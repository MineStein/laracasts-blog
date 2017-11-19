@extends('layouts.master')

@section('content')

    <div class="col-sm-8">
        <h1>{{ $post->title }}</h1>
        <p>
            {{ $post->body }}
        </p>

        <hr>

        <h5>Comments ({{ count($post->comments) }})</h5>

        @include('layouts.partials.errors')

        <form method="post" action="/posts/{{ $post->id }}/comments">
            {{ csrf_field() }}

            <div class="form-group">
                <textarea name="body" id="body" placeholder="Start typing..." class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit Comment</button>
            </div>
        </form>

        <hr>

        @if (count($post->comments))
            <div class="list-group">
                @foreach ($post->comments as $comment)

                    <li class="list-group-item">
                        <strong>{{ $comment->created_at->diffForHumans() }}</strong>
                        <br>
                        {{ $comment->body }}

                    </li>

                @endforeach
            </div>
        @else

            <div class="alert alert-danger">
                <p>
                    <strong>:(</strong><br>
                    No comments!
                </p>
            </div>

        @endif
    </div>

@endsection