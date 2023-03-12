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
          <div class="col-sm-6">
            <h4>Product Page</h4>
          </div>
          <div class="col-sm-6">
          <a href="{{ route('product') }}"> <button type="button" class="btn btn-sm btn-primary ">Add Product</button></a>
          <a href="{{ route('import.form') }}"><button type="button" class="btn btn-sm btn-primary ">Upload Product</button></a>
        
          <button class="btn btn-sm btn-danger" id="delete-selected">Delete Selected</button>

      
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
Check all

<input type="checkbox" class="mb-4" name="check_all" id="checkAll">


 <table class="table table-striped table-bordered user_datatable"> 
                <thead>
                    <tr>
                    <th>
                  
</th>
                       
                        <th>ID</th>
                        <th>ProuductName</th>
                     
                        <th width="180px">Action</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>   
            
            <form action="{{ route('products.deleteSelected') }}" id="providers-delete" method="post">
        @csrf
        <input type="hidden" name="product_delete" id="product_delete">
    </form>

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
          return '<input type="checkbox" class="p_users" name="check_all" value="' + $('<div/>').text(data.id).html() + '">';
        }
      },
      {data: 'id', name: 'id'},
      {data: 'p_name', name: 'p_name'},
      {data: 'description', name: 'description'},
   
      {data: 'action', name: 'action', orderable: false, searchable: false},
    ],
    order: [[ 1, 'asc' ]]
  });
});
</script>

 
 
<script>
    $("#checkAll").click(function () {
        var check = $('#checkAll').is(":checked");

        if (check == true) {
            $('.delete-records').show();
        } else {
            $('.delete-records').hide();
        }
		
        $('input:checkbox').not(this).prop('checked', this.checked);

        var array = []
        var checkboxes = document.querySelectorAll('.p_users:checked')

        for (var i = 0; i < checkboxes.length; i++) {
            array.push(checkboxes[i].value)
        }
        if (array.length == 0) {
            $('.delete-records').hide();
        }
        console.log(array)
        $('#product_delete').val(array)
    });
    $("#delete-selected").click(function (e) {
        e.preventDefault();
        $('form').submit();
    });
</script>



         
@endpush
