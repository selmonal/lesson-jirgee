@extends('layouts.app')

@section('content')

<div class="card" style="margin-bottom: 1rem;">
    <div class="card-body">
        <form id="post-form" action="{{ url('/posts') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <input class="form-control" name="body" placeholder="What is happening?"></input>
            </div>

            <input type="file" name="image" id="post-file" class="d-none" onchange="$('#post-form').submit()">

            <div>
                <div class="float-left">
                    <button type="button" class="btn btn-light" onclick="$('#post-file').click()">
                        <i class="fa fa-image"></i>
                    </button>
                </div>

                <button class="btn btn-primary float-right">Jirgeh</button>
            </div>
        </form>
    </div>
</div>

<div class="card">
    @foreach($posts as $post)
    <div class="card-body">
        <div class="media{{ session('last_added_post_id') === $post->id ? ' animated bounceIn' : '' }}">
          <img src="{{ asset($post->user->image_path) }}" class="mr-3 rounded-circle" style="width: 64px; height: 64px;">
          <div class="media-body">
            <h6 class="mt-0">
                <strong>{{ $post->user->name }}</strong> - <span class="text-muted" data-toggle="tooltip" data-placement="left" title="{{ $post->created_at }}">{{ $post->created_at->diffForHumans() }}</span>
            </h6>

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
        
@endsection
