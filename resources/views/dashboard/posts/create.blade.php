@extends('layouts.master')
@section('content')
<form method = "POST" action = "{{ route('post.store')}}">
  @include('partials._form')
</form>
@endsection