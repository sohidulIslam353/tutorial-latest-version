@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item active">Category Table</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Categories</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl.</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                   @foreach($category as $key=>$row)
                   <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $row->category_name }}</td>
                    <td>{{ $row->category_slug }}</td>
                    <td>
                        <a href="{{ route('category.edit',$row->id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                        <a href="{{ route('category.delete',$row->id) }}" class="btn btn-sm btn-danger delete"><i class="fa fa-trash"></i></a>
                    </td>
                   </tr>
                   @endforeach
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
      </div>
   </section>
@endsection
