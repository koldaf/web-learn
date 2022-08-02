@extends('layouts.main-layout')
@section('content')
<div class="pagetitle">
    <h1>List Available Questions</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active">{{ $exam['exam_title'] }}</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="card col-8 col-xs-10">
        <div class="card-body">
            <h3 class="card-title">{{ $exam['exam_title'] }}</h3>
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
                    <th style="width:60%;">Questions</th>
                    <th style="text-align:center" colspan="2" >Actions</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 0 @endphp

                @foreach ($questions as $question )
                <tr>
                    <td> {{ ++$i }} </td>
                    <td>{{ $question['question'] }}</td>
                    <td><a href='{{ url('/edits/'.$question['id']) }}' class='btn btn-primary'><i class="bi bi-pencil-square"></i> Edit </a></td>
                    <td><form method="POST" action="{{ url('/delete-quiz/'.$question['id']) }}">
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
