@extends('layouts.main-layout')
@section('content')
<div class="pagetitle">
    <h1>Create Exams</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active">Create Exams</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="card col-8 col-xs-10">
        <div class="card-body">
            <h3 class="card-title">Upload new question set</h3>
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
            <form action="{{ url('/setup-exam') }}" method="POST" enctype="multipart/form-data" class="row g-3 needs-validation" novalidate>
                @csrf
                <div class="col-md-8">
                  <label for="validationCustom01" class="form-label">Exam Title</label>
                  <input type="text" class="form-control" id="validationCustom01" name="title"  required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
                <div class="col-md-8">
                  <label for="validationCustom02" class="form-label">Upload Questions</label>
                  <input type="file" class="form-control" id="validationCustom02" name="exam_file" required>
                  <div class="valid-feedback">
                    Yuppie!
                  </div>
                </div>

                <div class="col-12">
                  <button class="btn btn-primary" type="submit">Upload Exams</button>
                </div>
              </form><!-- End Custom Styled Validation -->
        </div>
    </div>

  </section>
@endsection
