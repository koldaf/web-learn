@extends('layouts.onboard-layout')
@section('content')

<div class="card mb-3">

    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
      <div class="pt-4 pb-2">
        <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
        <p class="text-center small">Complete this form to join the research</p>
      </div>

      <form action="{{ url('/register') }}" method="POST" class="row g-3 needs-validation" novalidate>
        @csrf
        <div class="col-12">
          <label for="yourUsername" class="form-label">Username</label>
          <div class="input-group has-validation">
            <span class="input-group-text" id="inputGroupPrepend">@</span>
            <input type="text" name="username" class="form-control" id="Username" required>
            <div class="invalid-feedback">Please choose a username.</div>
          </div>
        </div>
        <div class="col-12">
          <label for="yourEmail" class="form-label">Your Phone</label>
          <input type="tel" name="phone" class="form-control" id="phone" required>
          <div class="invalid-feedback">Please enter a valid Phone adddress!</div>
        </div>
        <div class="col-12">
            <label for="yourEmail" class="form-label">Your Gender</label>
            <select name="gender" class="form-control" id="gender" required>
                <option value="" selected>Choose your gender</option>
                <option value="Female">Female</option>
                <option value="Male">Male</option>
            </select>
            <div class="invalid-feedback">Please choose your gender!</div>
          </div>
        <div class="col-12">
          <label for="yourPassword" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="yourPassword" required>
          <div class="invalid-feedback">Please enter your password!</div>
        </div>
        <div class="col-12">
            <label for="yourPassword" class="form-label">Password Again</label>
            <input type="password" name="password_confirmation" class="form-control" id="ConfirmYourPassword" required>
            <div class="invalid-feedback">Please enter your password again!</div>
          </div>
        <div class="col-12">
          <div class="form-check">
            <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
            <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
            <div class="invalid-feedback">You must agree before submitting.</div>
          </div>
        </div>
        <div class="col-12">
          <button class="btn btn-primary w-100" type="submit">Create Account</button>
        </div>
        <div class="col-12">
          <p class="small mb-0">Already have an account? <a href="{{ url('/') }}">Log in</a></p>
        </div>
      </form>

    </div>
  </div>
@endsection
