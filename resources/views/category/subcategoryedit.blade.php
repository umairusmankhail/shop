@extends('app')
@push('style')
   <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

  @endpush
@section('content')
 
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-9">
            <h1>Edit Category</h1>
          </div>
          <div class="col-sm-3">
       
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
              
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<table class="table">
  <thead>
      <tr>
          <th>Category</th>
     
          <th> action</th>
        
      </tr>
  </thead>
  <tbody>
  @foreach ($subcategory as $categories)
    <tr>
      <td>{{ $categories->sub_name }}</td></tr>
      <td>
          

          <a class="btn btn-primary" href="{{ route('subcategory-edit',$categories->id) }}">Edit</a> 
       
       

         <a href="{{ route('subcategory-destroy',$categories->id) }}" class="btn btn-danger">Delete</a>
     
 </td>
   
 
       
                 

              
       
    
              
    

   
  @endforeach
  </tbody>
</table>

</section>

<!-- right col -->
</div>
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

</div>
<!-- ./wrapper -->





@endsection



<!-- jQuery -->