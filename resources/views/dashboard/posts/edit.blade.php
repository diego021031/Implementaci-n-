@extends('layouts.master')
@section('content')
<form method = "POST" action = "{{ route('post.update', $post->id)}}">
  @method('PUT')
  @include('partials._form')
</form>
@endsection