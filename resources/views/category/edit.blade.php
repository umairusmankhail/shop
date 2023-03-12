@extends('app')
@push('style')
   <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

  @endpush
@section('content')
<style>
  .edit-field {
  display: none;
}

.save-btn,
.cancel-btn {
  display: none;
}

  </style>
 
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
<!-- HTML code -->    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>
                    <span class="editable" data-id="{{ $category->id }}">{{ $category->cat_name }}</span>
                    <input type="text" class="form-control form-control-sm d-none" data-id="{{ $category->id }}" value="{{ $category->cat_name }}" />
                </td>
                <td>
                    <button class="btn btn-sm btn-primary edit" data-id="{{ $category->id }}">Edit</button>
                    <button class="btn btn-sm btn-success save d-none" data-id="{{ $category->id }}">Save</button>
                    <button class="btn btn-sm btn-secondary cancel d-none" data-id="{{ $category->id }}">Cancel</button>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

<!-- JavaScript code -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script>
    $(document).ready(function() {
        $('.edit').on('click', function() {
            var categoryId = $(this).data('id');
            $('.editable[data-id=' + categoryId + ']').addClass('d-none');
            $('input[data-id=' + categoryId + ']').removeClass('d-none');
            $(this).addClass('d-none');
            $('.save[data-id=' + categoryId + ']').removeClass('d-none');
            $('.cancel[data-id=' + categoryId + ']').removeClass('d-none');
        });

        $('.cancel').on('click', function() {
            var categoryId = $(this).data('id');
            $('.editable[data-id=' + categoryId + ']').removeClass('d-none');
            $('input[data-id=' + categoryId + ']').addClass('d-none');
            $('.edit[data-id=' + categoryId + ']').removeClass('d-none');
            $('.save[data-id=' + categoryId + ']').addClass('d-none');
            $(this).addClass('d-none');
        });

        $('.save').on('click', function() {
            var categoryId = $(this).data('id');
            var categoryName = $('input[data-id=' + categoryId + ']').val();

            $.ajax({
                url: '/categories/' + categoryId,
                type: 'PUT',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'cat_name': categoryName
                },
                success: function(response) {
                    $('.editable[data-id=' + categoryId + ']').text(categoryName);
                    $('.editable[data-id=' + categoryId + ']').removeClass('d-none');
                    $('input[data-id=' + categoryId + ']').addClass('d-none');
                    $('.edit[data-id=' + categoryId + ']').removeClass('d-none');
                    $('.save[data-id=' + categoryId + ']').addClass('d-none');
                    $('.cancel[data-id=' + categoryId + ']').addClass('d-none');
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                    alert('An error occurred while trying to update the category.');
                }
            });
        });
    });
</script>

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