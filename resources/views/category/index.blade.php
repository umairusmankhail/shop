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
<style>
    td.category-name:hover, td.subcategory-name:hover {
        cursor: pointer;
        background-color: #eee;
    }
</style>
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
<table class="table table-striped">
    <thead>
        <tr>
            <th>CategoryName</th>
            <th>Subcategories</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
            @if($category->subcategories->count() > 0)
                @foreach($category->subcategories as $subcategory)
                    <tr>
                        <td class="category-name" data-id="{{ $category->id }}" data-type="cat_name">
                            <span class="cat-name">{{ $category->cat_name }}</span>
                            <input type="text" class="cat-name-input form-control" value="{{ $category->cat_name }}" style="display:none;">
                            <button class="btn btn-primary save-button" data-id="{{ $category->id }}" data-type="cat_name" style="display:none;">Save</button>
                        </td>
                        <td class="subcategory-name" data-id="{{ $subcategory->id }}" data-type="sub_name">
                            <span class="add-subcategory" data-category="{{ $category->id }}"><i class="fas fa-plus-circle"></i></span>
                            <span class="sub-name">{{ $subcategory->sub_name }}</span>
                            <input type="text" class="sub-name-input form-control" value="{{ $subcategory->sub_name }}" style="display:none;">
                            <button class="btn btn-primary save-button" data-id="{{ $subcategory->id }}" data-type="sub_name" style="display:none;">Save</button>
                        </td>
                        <td>
                    <form action="{{ route('subcategory-destroy', $subcategory->id) }}" method="POST" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                  </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="category-name" data-id="{{ $category->id }}" data-type="cat_name">
                        <span class="cat-name">{{ $category->cat_name }}</span>
                        <input type="text" class="cat-name-input form-control" value="{{ $category->cat_name }}" style="display:none;">
                        <button class="btn btn-primary save-button" data-id="{{ $category->id }}" data-type="cat_name" style="display:none;">Save</button>
                    </td>
                    <td class="subcategory-name">
                        <div>
                            <span class="add-subcategory" data-category="{{ $category->id }}"><i class="fas fa-plus-circle"></i></span>
                        </div>
                    </td>
                    <td>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                  </td>
                </tr>
            @endif
        @endforeach
 
    </tbody>

</table>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCategoryModal">
  Add New Category
</button>

<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="categoryName">Category Name</label>
            <input type="text" class="form-control" id="categoryName" name="cat_name" placeholder="Enter category name">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="addSubcategoryModal" tabindex="-1" role="dialog" aria-labelledby="addSubcategoryModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addSubcategoryModalLabel">Add Subcategory</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('subcategory.store') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="subcategoryName">Subcategory Name</label>
            <input type="text" class="form-control" id="subcategoryName" name="sub_name" placeholder="Enter subcategory name">
          </div>
          <input type="hidden" id="category_id" name="category_id">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Add Subcategory</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>


  
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


<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $('.add-subcategory').click(function() {
      var categoryId = $(this).closest('tr').find('.category-name').data('id');
      $('#category_id').val(categoryId);
      $('#addSubcategoryModal').modal('show');
    });
    
    $('#addSubcategoryBtn').click(function() {
      var subcategoryName = $('#subcategoryName').val();
      var categoryId = $('#category_id').val();
      
      // Do something with the subcategoryName and categoryId, such as sending an AJAX request to add the subcategory to the database
      
      $('#addSubcategoryModal').modal('hide');
    });
  });
</script>
<script>
$(function() {
    $('td.category-name, td.subcategory-name').click(function() {
        // Hide save buttons and input fields on all rows
        $('td.save-button').hide();
        $('input.cat-name-input').hide();
        $('span.cat-name').show();
        $('input.sub-name-input').hide();
        $('span.sub-name').show();

        // Show input field and save button on clicked row
        var dataType = $(this).data('type');
        if (dataType === 'cat_name') {
            $(this).find('span').hide();
            $(this).find('input.cat-name-input').show().focus().select();
        } else if (dataType === 'sub_name') {
            $(this).find('span').hide();
            $(this).find('input.sub-name-input').show().focus().select();
        }
        $(this).find('button.save-button').show();

        $(this).find('input.cat-name-input, input.sub-name-input').keypress(function(event){
            if (event.keyCode === 13) {
                $('button.save-button').click();
            }
        });
    });

    $('button.save-button').click(function() {
        var $this = $(this);
        var url = '{{ route('categories.update', '') }}/' + $this.data('id');
        var dataType = $this.data('type');
        var data = {};
        data[dataType] = $this.prev().val();

        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                console.log(response);
                location.reload(); // Reload page after successful update
                $this.hide(); // Hide save button after successful update
            },
            error: function(error) {
                console.log(error);
            }
        });

        $this.parent().find('span.cat-name, span.sub-name').text($this.prev().val());
        $this.prev().hide();
        $this.prev().prev().show();
    });

    $('td.category-name, td.subcategory-name').hover(function() {
        $(this).css('cursor', 'pointer');
        $(this).css('background-color', '#eee');
    }, function() {
        $(this).css('background-color', 'transparent');
    });
});
</script>





@endsection



<!-- jQuery -->
</form>