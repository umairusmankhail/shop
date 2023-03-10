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
           <a href="{{route('category.edit')}}"> <button type="button" class="btn btn-sm btn-primary ">Edit Only Category</button></a>
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
            <th>Subcategory Name</th>
            <th>Category Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($subcategories as $subcategory)
            <tr>
                <td>{{ $subcategory->sub_name }}</td>
                <td>
                @if ($subcategory->category)
                        {{ $subcategory->category->cat_name }}
                    @endif
</td>
                <td>
                    <a href="{{ route('subcategory-edit', $subcategory->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('subcategory-destroy', $subcategory->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
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