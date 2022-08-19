@extends('main')
@section('title', 'View posts')
@section('content')

<div class="container">
    <div class="row">
        @foreach($posts as $post)
        <div>
            <div>
                <p>{{ $post->description }}</p>
                <p>{{ $post->price }}</p>

                <div>
                <a class="btn" href="{{ url('fav-post/'.$post->id) }}">Add to fav</a>
                <a class="btn" href="{{ url('fav-remove/'.$post->id) }}">Remove from fav</a>
                </div>
                
                <div>
                <a class="btn" href="{{ url('compare-post/'.$post->id) }}">Add to compare</a>
                <a class="btn" href="{{ url('compare-remove/'.$post->id) }}">Remove from compare</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection