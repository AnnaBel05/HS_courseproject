@extends('main')
@section('title', 'View favourites')
@section('content')

<h2>Favourites</h2>

{{ Cookie::get('fav_list') }}

@endsection