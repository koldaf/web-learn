@extends('layouts.main-layout')
@section('content')
<div class="pagetitle">
    <h1>List Available Exams</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active">Available Exams</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="card col-8 col-xs-10">
        <div class="card-body">
            <h3 class="card-title">Available Exams</h3>
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
                    <th style="width:60%;">Exam Title</th>
                    <th style="text-align:center" colspan="3" >Actions</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 0 @endphp
                @foreach ($exams as $exam )

                <tr>
                    <td> {{ ++$i }} </td>
                    <td>{{ $exam->exam_title }}</td>
                    <td><a href='{{ url('/view/'.$exam->id) }}' class='btn btn-primary'><i class="bi bi-card-list"></i>  Questions</a></td>
                    <td><a href='{{ url('/view-score/'.$exam->id) }}' class='btn btn-success'><i class="bi bi-card-list"></i>  Scores</a></td>
                    <td><form method="POST" action="{{ url('/delete/'.$exam->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Delete</button>
                    </form></td>
                </tr>

                @endforeach
            </tbody>
        </table>

        </div>
    </div>
  </section>
@endsection
