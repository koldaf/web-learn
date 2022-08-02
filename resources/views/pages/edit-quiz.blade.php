@extends('layouts.main-layout')
@section('content')
<div class="pagetitle">
    <h1>Edit Quiz</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/view/'.$quiz['question_bank_details_id']) }}">List Questions</a></li>
        <li class="breadcrumb-item active">Edit Question</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="card col-8 col-xs-10">
        <div class="card-body">
            <h3 class="card-title">{{ $quiz['question'] }}</h3>
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
        <div class="row">
            <form>
                <div class="form-group">
                    <label>Question</label>
                    <textarea name="question" class="form-control tinymce-editor">{{ $quiz['question'] }}</textarea>
                </div>
                <div class="form-row">
                    @php($i='A')
                    @foreach (json_decode($quiz['options'], true) as $options )
                        <div class="form-group col-10 offset-2">
                            <label>Options {{ $i++ }}</label>
                            <textarea name="option[]" class="form-control tinymce-editor">{{ $options }}</textarea>
                        </div>
                    @endforeach

                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Correct Answer</label>
                        <select class="form-control" name="correct_ans">
                            <option value="" selected>Select the correct option</option>
                            <option value="A">Option A</option>
                            <option value="B">Option B</option>
                            <option value="C">Option C</option>
                            <option value="D">Option D</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>


        </div>
    </div>
  </section>
@endsection
