@extends('layouts.app')
@section('content')
<h1>Add New Comment</h1>
<form action="/comment" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $article['id'] }}">
    <h1>Post:</h1>
    <h3>{{ $article['text'] }}</h3>
    <h1>Comments: </h1>
    <div class="section">
        <div class="card-row row row-cols-1 row-cols-lg-3 row-cols-md-2 row-cols-sm-1">
            @foreach ($comments as $comment)
            @if ($comment->article_id == $article->id)
            <div class="card-col col mb-4">
                <div class="card-shape card h-100">
                    <div class="card-body">
                        <p class="card-text">{{ $comment->text }}</p>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
<textarea name="text" cols="40" rows="3" placeholder="Add Comment"></textarea>
<br>
<button type="submit">Add Comment</button>
</form>
@endsection
