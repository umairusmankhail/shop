@extends('app')
@push('css')
   <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  @endpush
@section('content')
 
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-9">
            <h4>Product Page</h4>
          </div>
          <div class="col-sm-3">
          <a href="{{ route('product') }}"> <button type="button" class="btn btn-sm btn-primary ">Add Product</button></a>
          <a href="{{ route('import.form') }}"><button type="button" class="btn btn-sm btn-primary ">Upload Product</button></a>
          <button type="button" class="btn btn-danger" id="delete-selected">Delete Selected</button>
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
@endif <table class="table table-striped table-bordered user_datatable"> 
                <thead>
                    <tr>
                    <th>ID</th>
                       
                        <th>ID</th>
                        <th>ProuductName</th>
                     
                        <th width="180px">Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
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




@push('js')
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    var table = $('.user_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('product.data') }}",
        columns: [
            {
                data: null,
                name: null,
                orderable: false,
                searchable: false,
                width: '10px',
                render: function (data, type, full, meta) {
                    return '<input type="checkbox" class="checkbox" name="id[]" value="' + $('<div/>').text(data.id).html() + '">';
                }
            },
            {data: 'id', name: 'id'},
            {data: 'p_name', name: 'p_name'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        order: [[ 1, 'asc' ]]
    });

  
});
</script>



<script>
  $(document).on('click', '.edit', function() {
    window.location.href = "{{ route('products.edit', ':id') }}".replace(':id', $(this).attr('id'));
});

  </script>


  
                
@endpush
