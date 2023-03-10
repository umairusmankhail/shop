@extends('app')
@push('style')
   <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

  @endpush
@section('content')
<style>
  .form-row button {
  margin-right: 10px;
}
  </style>
 
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-6">
            <h4>Add Category</h4>
          </div>
          <!-- Button Grid start here -->
          <div class="col-6">
           <a href="{{route('category.create')}}"> <button type="button" class="btn btn-sm btn-primary ">Add New Category</button></a>
           <a href="{{route('category.edit')}}"> <button type="button" class="btn btn-sm btn-primary ">Edit Category</button></a>
           <a href="{{route('editsubcategory')}}"> <button type="button" class="btn btn-sm btn-primary">Edit SubCategory</button></a>
          </div>
           <!-- Button Grid end here -->
        
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
          <th>SubCategory</th>
         
        
      </tr>
  </thead>
  <tbody>
  @foreach ($category as $categories)
    <tr>
      <td rowspan="{{ count($categories->category) + 1 }}">{{ $categories->cat_name }}</td>
      <td>
    @foreach($categories->category as $sub)
      <tr>
        <td>{{ $sub->sub_name }}</td>
       
                 

              
       
    
              
    
    @endforeach
   
  @endforeach
</tr>
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