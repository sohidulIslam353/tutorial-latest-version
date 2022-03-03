@extends('layouts.app')
@section('content')
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Change your password') }}</div>

                <div class="card-body">
                  @if(session()->has('success'))
                    <strong class="text-success">{{ session()->get('success') }}</strong>
                  @endif

                   @if(session()->has('error'))
                    <strong class="text-danger">{{ session()->get('error') }}</strong>
                  @endif

                <form method="post" action="{{ route('update.password') }}">
                    @csrf
                    <div>
                        <label>Current Password</label> 
                        <input type="password" name="current_password" class="form-control" placeholder="Current Password" required value="{{ old('current_password') }}">                   
                    </div><br>

                    <div>
                        <label>New Password</label> 
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="New Password"  required> 
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror                  
                    </div><br>

                    <div>
                        <label>Confirm Password</label> 
                        <input type="password" name="password_confirmation" placeholder="Confirm Password"  class="form-control" required>                   
                    </div><br>
                    <button type="submit" class="btn btn-primary">Change Password</button>
                       
                </form> 
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
