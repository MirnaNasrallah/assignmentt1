{{-- @extends('layout') --}}
@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Post') }}</div>
                <div class="section">
                    <form action="submit" method="POST">
                        @csrf
                        <textarea name="text" cols="30" rows="5"
                        placeholder="Write your text here."></textarea>
                        <br>
                        <button type="submit">Create Post</button>

                    </form>
                </div>
                <div class="section">

                    <div class="card-row row row-cols-1 row-cols-lg-3 row-cols-md-2 row-cols-sm-1">
                        @foreach ($articles as $article)
                            @if (auth()->user()->id == $article->user_id)
                                <div class="card-col col mb-4">
                                    <div class="card-shape card h-100">
                                        <div class="card-body">
                                            <p class="card-text">{{ $article->text }}</p>
                                            {{-- <form action="submit" method="POST">
                                            @csrf
                                            <textarea name="text" cols="30" rows="5">
                                                                                            Write your comment here.
                                                                                            </textarea>
                                            <br>
                                            <button type="submit">comment</button>

                                        </form> --}}


                                            <button type="submit" class="card-heart-btn btn btn-outline-success ">

                                                <a id="button2" href="{{ url('delete') }}/{{ $article->id }}"
                                                    class="card-btn btn btn-outline-success">Delete</a>
                                            </button>

                                            <button type="submit" class="card-heart-btn btn btn-outline-success ">

                                                <a id="button2" href="{{ 'edit/' . $article['id'] }}"
                                                    class="card-btn btn btn-outline-success">Edit Post</a>
                                            </button>
                                            <button type="submit" class="card-heart-btn btn btn-outline-success ">
                                                <a href="{{ 'comment/' . $article['id'] }}">Add Comment</a>
                                            </button>


                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>



                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                </div>
            </div>
        </div>
    </div>

@endsection
