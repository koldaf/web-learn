@extends('layouts.main-layout')
@section('content')
<div class="pagetitle">
    <h1>Available Tests</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Back</a></li>
        <li class="breadcrumb-item active">Available Tests</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    @if (session()->has('status'))
        <div class="alert alert-info">
            {{ session()->get('status') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Test Title</th>
                <th>Action</th>
            </tr>
        </thead>
        @php($i=1)
        @foreach ($tests as $test )
        <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $test->exam_title }}</td>
            <td><button value="{{ url('/start/'.$test->id) }}" onclick="openTestWindow(this.value)" class="btn btn-primary start">Start</button></td>
        </tr>
        @endforeach
    </table>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function openTestWindow(url){
            $('.start').removeClass('btn-primary').addClass('btn-warning').html('Exam Started');
            window.open(url, 'My Test Page', 'fullscren=yes, location=no, noopener,noreferrer');
        }
    </script>
  </section>
@endsection
