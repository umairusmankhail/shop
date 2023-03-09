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

              <!-- /.col -->
        
              <!-- /.col -->
     {{$get=$_GET['id']}}

            <!-- /.row -->
            <form method="POST" action="{{ route('subcategory-update', $subcategory->id) }}">
                @csrf
                @method('put')
            <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Category</label>
                   
                    <select class="form-control select2" name="category_id" value="" style="width: 100%;">
                    <option value="">{{$subcategory->cat_name}}</option>
           @foreach($subcategory as $categories)
              <option value="{{ $categories->$get }}">{{ $categories->cat_name }}</option>
        @endforeach

        </select>
                        
                      
                   
                  </div>
                  <!-- /.form-group -->
               
                <!-- /.col -->
                <div class="col-md-6">
                  <div class="form-group">
                
                      <label>Sub Category</label>
                      <input type="text" class="form-control" value="{{$categories->sub_name}}"  name="sub_name">
                     
                    </div> <!-- /.form-group -->
                   
                </div>
                <div class="col-md-4">
                <button type="submit" class="btn btn-block btn-primary btn-lg">Submit</button>
                </div>

            </form>
          </div>
          <!-- /.card-body -->
       
        </div>
        <!-- /.card -->
<!--end row-->
@stop