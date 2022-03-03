@extends('layouts.app')
@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New Category') }}</div>
                 <div class="card-body">
           			<form method="post" action="{{ route('category.store')  }}">
           				@csrf
           			  <div class="form-group">
           			    <label for="exampleInputEmail1">Category Name</label>
           			    <input type="text" class="form-control @error('category_name') is-invalid @enderror" name="category_name" aria-describedby="emailHelp" placeholder="Category Name" value="{{ old('category_name') }}" >
           			    @error('category_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
           			  </div>
           			  <button type="submit" class="btn btn-primary">Submit</button>
           			</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script type="text/javascript">
    $(document).ready(function(){
        console.log('hello world!');
    });
</script>
@endpush