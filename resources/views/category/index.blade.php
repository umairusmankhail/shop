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
            <h1>Add Category</h1>
          </div>
          <div class="col-sm-3">
           <a href="{{route('category.create')}}"> <button type="button" class="btn btn-block btn-primary btn-lg">Add New Customer</button></a>
           
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
          <th>SubCategory</th>

        
      </tr>
  </thead>
  <tbody>
  @foreach ($category as $categories)
    <tr>
      <td rowspan="{{ count($categories->category) + 1 }}">{{ $categories->cat_name }}</td>
    </tr>
    @foreach($categories->category as $sub)
      <tr>
        <td>{{ $sub->sub_name }}</td>
      </tr>
    @endforeach
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
