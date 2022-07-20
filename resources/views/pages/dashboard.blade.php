@extends('layouts.main-layout')
@section('content')
@foreach ($topics as $topic )
    {{ $topic->topic }}
@endforeach
@endsection
