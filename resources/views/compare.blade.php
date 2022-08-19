@extends('main')
@section('title', 'View favourites')
@section('content')

<h2>Compare</h2>

{{ Cookie::get('compare_list') }}

@endsection