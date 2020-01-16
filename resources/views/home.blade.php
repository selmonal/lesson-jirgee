@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-bottom: 1rem;">
                <div class="card-body">
                    <form action="{{ url('/posts') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <input class="form-control" name="body" placeholder="What is happening?"></input>
                        </div>

                        <button class="btn btn-primary float-right">Jirgeh</button>
                    </form>
                </div>
            </div>

            <div class="card">
                @foreach($posts as $post)
                <div class="card-body">
                    <div class="media{{ session('last_added_post_id') === $post->id ? ' animated bounceIn' : '' }}">
                      <img src="{{ asset($post->user->image_path) }}" class="mr-3 rounded-circle" style="width: 64px; height: 64px;">
                      <div class="media-body">
                        <h5 class="mt-0">
                            {{ $post->user->name }} - {{ $post->created_at }}
                        </h5>

                        {{ $post->body }}
                      </div>

                      @if ($post->user_id === auth()->user()->id)
                        <form action="/posts/{{ $post->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-outlined btn-sm" onclick="return deletePost()">Delete</button>
                          </form>
                      @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
