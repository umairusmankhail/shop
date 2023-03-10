@extends('app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category Form</li>
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
          <form action="{{route('category.store')}}" method="post" name="customer" enctype="multipart/form-data">
            @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label> Category Name</label>
                  <input type="text" class="form-control" placeholder="Category name" name="cat_name">
          
                </div>
                <!-- /.form-group -->
                <div class="form-group">
                
                <div class="col-md-4">
                <button type="submit" class="btn btn-sm btn-primary btn-lg">Add Category</button>
                </div>
            
                  </div><!-- /.form-group -->
</form>
              <!-- /.col -->
        
              <!-- /.col -->
        
            <!-- /.row -->
            <form method="POST" action="{{ route('subcategory.store') }}">
                @csrf
            <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Category</label>
                    <select class="form-control select2" name="category_id" style="width: 100%;">
                    <option value="">Select a Category</option>
           @foreach($category as $categories)
              <option value="{{ $categories->id }}">{{ $categories->cat_name }}</option>
        @endforeach
        </select>
                        
                      
                   
                  </div>
                  <!-- /.form-group -->
                  <div class="form-group">
                    </div><!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                  <div class="form-group">
                      <label>Sub Category</label>
                      <input type="text" class="form-control" placeholder="Sub Category name" name="sub_name">
                    </div> <!-- /.form-group -->
                    <div class="form-group">
                     
              
                    </div> <!-- /.form-group -->
                   
                </div>
                <div class="col-md-4">
                <button type="submit" class="btn btn-sm btn-primary btn-lg">Add Sub Category</button>
                </div>

                <!-- /.col -->
              </div>
              <!-- /.row -->
            </form>
          </div>
          <!-- /.card-body -->
       
        </div>
        <!-- /.card -->
<!--end row-->

<script>
  $(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='customer']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
  
      email: {
        required: true,
        // Specify that email should be validated
        // by the built-in "email" rule
        email: true
      },
      password: {
        required: true,
        minlength: 5,
        maxlength : 12
      }
    },
    // Specify validation error messages
    messages: {
  
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long",
        maxlength: "Your password must be at least 12 characters long"
     
      },
      email: "Please enter a valid email address"
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});

  </script>

@stop