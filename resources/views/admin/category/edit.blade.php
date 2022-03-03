@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Category') }}</div>

                <div class="card-body">
           			<form method="post" action="{{ route('category.update',$data->id)  }}">
           				@csrf
           			  <div class="form-group">
           			    <label for="exampleInputEmail1">Category Name</label>
           			    <input type="text" class="form-control" name="category_name" aria-describedby="emailHelp"  value="{{ $data->category_name }}" required>
           			  </div>
           			  <button type="submit" class="btn btn-primary">Update</button>
           			</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
