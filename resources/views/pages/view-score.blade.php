@extends('layouts.main-layout')
@section('content')
<div class="pagetitle">
    <h1>View Scores</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active">{{ $exam[0]['exam_title'] }}</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="card col-8 col-xs-10">
        <div class="card-body">
            <h3 class="card-title">{{ $exam[0]['exam_title'] }}</h3>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <table class="table table-responsive w-100">
            <thead>
                <tr>
                    <th>#</th>
                    <th style="width:60%;">Participants</th>
                    <th style="text-align:center" colspan="2" >Score</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 0 @endphp


            </tbody>
        </table>


        </div>
    </div>
  </section>
@endsection
