@extends('layouts.app')
@section('content')
<h1>Update Post</h1>
<form action="/edit" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $article['id'] }}">
<textarea name="text" cols="40" rows="3">{{$article['text']}}</textarea>
<br>
<button type="submit">Update</button>
</form>
@endsection
