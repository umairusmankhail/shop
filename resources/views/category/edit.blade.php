@extends('app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Customer</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Customer Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
       
          <!-- /.card-header -->
        <form action="{{ route('category-update', $category->id) }}" method="post">
    @csrf
    @method('put')
    <label for="category-name">Category name:</label>
    <input type="text" name="cat_name" id="category-name" value="{{ $category['cat_name'] }}">


    <button type="submit">Update</button>
</form>

              <!-- /.col -->
        
              <!-- /.col -->
        
       

        
              
          </div>
          <!-- /.card-body -->
       
        </div>
        <!-- /.card -->
<!--end row-->
@stop