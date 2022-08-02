@extends('layouts.exams-layout')

@section('content')
<div class="pagetitle">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <h1>Exam Ended</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"></a></li>
        <li class="breadcrumb-item active"></li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="card col-8 col-xs-10">
        <div class="card-body">
            <h3 class="card-title">Exam Ended</h3>
            <div class="alert alert-success" role="alert">
                <p>{{ $message }}</p>
            </div>
            <button class="btn btn-danger" onclick="javascript:window.close()">Close</button>
        </div>
    </div>
  </section>
@endsection
