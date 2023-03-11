@extends('app')
@section('content')
<style>
      input[type=file]::-webkit-file-upload-button {
      background-color: grey;
      color: white;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
    }
    </style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4>Add Product</h4>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product Form</li>
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
          <form action="{{route('product.store')}}" method="post"  enctype="multipart/form-data">
            @csrf
          <div class="card-body">
          <div class="form-row">
    <div class="form-group col-md-4 mb-3">
      <label for="input1">Product Name</label>
      <input type="text" class="form-control" id="productname" name="p_name">
    </div>
    <div class="form-group col-md-4 mb-3">
      <label for="input2">Item No:</label>
      <input type="text" class="form-control" id="item_no" name="item_no">
    </div>
    <div class="form-group col-md-4 mb-3">
    <label for="select1">Authorize</label>
      <select class="form-control" id="select1" name="authorize">
        <option value="">--Select--</option>
        <option value="option1">Option 1</option>
        <option value="option2">Option 2</option>
        <option value="option3">Option 3</option>
      </select>
    </div>
  </div>
    <div class="form-row">
    <div class="form-group col-md-6">
 
    <label for="category">Category</label>
    <select class="form-control" id="category" name="category_id">
        <option value="">--Select--</option>
        @foreach  ($categories as $category )
            <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group col-md-6">
    <label for="subcategory">Subcategory</label>
    <select id="subcategory" name="subcategory" class="form-control">
</select>
</div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4 mb-3">
      <label for="input5">Size</label>
      <input type="text" class="form-control " id="input5" name="size">
    </div>
    <div class="form-group col-md-2 mb-3">
      <label for="input6">Size Unit</label>
      <input type="text" class="form-control" id="input6" name="size_unit">
    </div>
    <div class="form-group col-md-2 mb-3">
      <label for="input7">Weight</label>
      <input type="text" class="form-control" id="input7" name="weight">
    </div>
    <div class="form-group col-md-2 mb-3">
      <label for="input8">Weight unit</label>
      <input type="text" class="form-control" id="input8" name="w_unit">
    </div>
    <div class="form-group col-md-2 mb-3">
      <label for="input9">Color</label>
      <input type="text" class="form-control" id="input9" name="color">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4 mb-3">
      <label for="input5">Price trem</label>
      <input type="text" class="form-control " id="input5" name="p_trem">
    </div>
    <div class="form-group col-md-2 mb-3">
      <label for="input6">Currency</label>
      <input type="text" class="form-control" id="input6" name="currency">
    </div>
    <div class="form-group col-md-2 mb-3">
      <label for="input7">MOQ</label>
      <input type="text" class="form-control" id="input7" name="moq">
    </div>
    <div class="form-group col-md-2 mb-3">
      <label for="input8">MOQ unit</label>
      <input type="text" class="form-control" id="input8" name="moq_unit">
    </div>
    <div class="form-group col-md-2 mb-3">
      <label for="input9">Material Grade</label>
      <input type="text" class="form-control" id="input9" name="m_grade">
    </div>
  </div>
  <div class="form-row">
  
    <div class="form-group col-md-2 mb-3">
      <label for="input6">Price</label>
      <input type="text" class="form-control" id="input6" name="price">
    </div>
    <div class="form-group col-md-2 mb-3">
      <label for="input7">price per unit</label>
      <input type="text" class="form-control" id="input7" name="p_unit">
    </div>
    <div class="form-group col-md-4 mb-3">
      <label for="input5">Price for Quantity</label>
      <input type="text" class="form-control " id="input5" name="p_qty">
    </div>
    <div class="form-group col-md-2 mb-3">
      <label for="input8">Price Qty Unit</label>
      <input type="text" class="form-control" id="input8" name="price_qty_unit">
    </div>
    <div class="form-group col-md-2 mb-3">
      <label for="input9">G.W.(kgs)</label>
      <input type="text" class="form-control" id="input9" name="g_w_kg">
    </div>
  </div>
  <div class="form-row">
  
 
  <div class="form-group col-md-2 mb-3">
    <label for="input7">Lenght</label>
    <input type="text" class="form-control" id="input7" name="lenght">
  </div>
  <div class="form-group col-md-3 mb-3">
    <label for="input6">Height</label>
    <input type="text" class="form-control" id="input6" name="height">
  </div>
  <div class="form-group col-md-2 mb-3">
    <label for="input5">Width</label>
    <input type="text" class="form-control " id="input5" name="width">
  </div>
  <div class="form-group col-md-2 mb-3">
    <label for="input8">M3/CTN</label>
    <input type="text" class="form-control" id="input8" name="m3ctn">
  </div>
  <div class="form-group col-md-2 mb-3">
    <label for="input9">HS Code</label>
    <input type="text" class="form-control" id="input9" name="hs_code">
  </div>
</div>
<div class="form-row">
  <div class="form-group col-md-2 mb-3">
    <label for="input6">Inner Pack</label>
    <input type="text" class="form-control" id="input6" name="in_pack">
  </div>
  <div class="form-group col-md-2 mb-3">
    <label for="input7">Inner Pack unit</label>
    <input type="text" class="form-control" id="input7" name="inn_pack_unit">
  </div>
  <div class="form-group col-md-2 mb-3">
    <label for="input5">Mid Pack</label>
    <input type="text" class="form-control " id="input5" name="mid_pack">
  </div>
  <div class="form-group col-md-2 mb-3">
    <label for="input8">Mid Pack Unit</label>
    <input type="text" class="form-control" id="input8" name="mid_pack_unit">
  </div>
  <div class="form-group col-md-2 mb-3">
    <label for="input9">Big pack</label>
    <input type="text" class="form-control" id="input9" name="big_pack">
  </div>
  <div class="form-group col-md-2 mb-3">
    <label for="input9">Big pack Unit</label>
    <input type="text" class="form-control" id="input9" name="big_pack_unit">
  </div>
</div>
  
  <div class="form-row justify-content-between">
    <div class="form-group col-md-4 mb-3">
      <label for="input1">Thickness</label>
      <input type="text" class="form-control" id="input1" name="thickness">
    </div>
    <div class="form-group col-md-4 mb-3">
      <label for="input2">Thickness Per Unit</label>
      <input type="text" class="form-control" id="input2" name="thickness_unit">
    </div>
    <div class="form-group col-md-3 mb-3">
      <label for="input3">Add new Elenments</label>
      <input type="text" class="form-control" id="input3" name="add_element">
    </div>
  </div>
  <div class ="form-row">
  <div class="form-group col-md-12 mb-3">
      <label for="textarea1">Description</label>
      <textarea class="form-control" id="textarea1" name="description" rows="4"></textarea>
    </div>
  
</div>
<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <label for="input-files">Images</label>
      <div class="d-flex">
        <div class="card p-5 mr-2 image-card" id="dropzone">
          <label for="input-file1" class="btn btn-outline-secondary">
            <i class="fas fa-plus fa-2x"></i><br>
            Upload Image
          </label>
          <input type="file" name="images[]" id="input-file1" class="d-none" onchange="handleImageUpload(this)">
        </div>
        <div class="card p-5 mr-2 image-card" id="card-2">
          <label for="input-file2" class="btn btn-outline-secondary">
            <i class="fas fa-plus fa-2x"></i><br>
            Upload Image
          </label>
          <input type="file" name="images[]" id="input-file2" class="d-none" onchange="handleImageUpload(this)">
        </div>
        <div class="card p-5 mr-2 image-card" id="card-3">
          <label for="input-file3" class="btn btn-outline-secondary">
            <i class="fas fa-plus fa-2x"></i><br>
            Upload Image
          </label>
          <input type="file" name="images[]" id="input-file3" class="d-none" onchange="handleImageUpload(this)">
        </div>
        <div class="card p-5 mr-2 image-card" id="card-4">
          <label for="input-file4" class="btn btn-outline-secondary">
            <i class="fas fa-plus fa-2x"></i><br>
            Upload Image
          </label>
          <input type="file" name="images[]" id="input-file4" class="d-none" onchange="handleImageUpload(this)">
        </div>
        <div class="card p-5 mr-2 image-card" id="card-5">
          <label for="input-file5" class="btn btn-outline-secondary">
            <i class="fas fa-plus fa-2x"></i><br>
            Upload Video
          </label>
          <input type="file" name="video" id="input-file5" class="d-none" onchange="handleImageUpload(this)">
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  function handleImageUpload(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        var card = input.parentNode;
        card.style.backgroundImage = 'url(' + e.target.result + ')';
        card.style.backgroundSize = 'cover';
      }

      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- include the jQuery UI library -->
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>
<script>


$(document).ready(function() {
    $('.d-flex').sortable({
        items: '.image-card',
        axis: 'x',
        containment: 'parent'
    });
});

  </script>

<script>
    $(function () {
        // Make the dropzone a droppable area
        $("#dropzone").on("dragover", function (event) {
            event.preventDefault();
            $(this).addClass("dragover");
        });

        $("#dropzone").on("dragleave", function (event) {
            event.preventDefault();
            $(this).removeClass("dragover");
        });

        $("#dropzone").on("drop", function (event) {
            event.preventDefault();
            $(this).removeClass("dragover");

            // Get the dropped files
            var files = event.originalEvent.dataTransfer.files;

            // Loop through the dropped files
            for (var i = 0; i < files.length; i++) {
                var file = files[i];

                // Check if the dropped file is an image
                if (file.type.match(/^image\//)) {
                    // Create a new image element
                    var img = $("<img>");

                    // Set the source of the image to the dropped file
                    img.attr("src", URL.createObjectURL(file));

                    // Make the image draggable
                    img.draggable({
                        revert: "invalid",
                        helper: "clone"
                    });

                    // Add the image to the dropzone
                    $(this).append(img);
                }
            }
        });

        // Make the dropzone a droppable area
        $("#dropzone").droppable({
            drop: function (event, ui) {
                // Get the dropped image
                var droppedImg = ui.draggable;

                // Add the image to the dropzone
                $(this).append(droppedImg);
            }
        });
    });
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
<script>
    $('#category').on('change', function() {
        var category_id = $(this).val();
        if(category_id) {
            $.ajax({
                url: '{{ url('get-subcategories') }}/'+encodeURI(category_id),
                type: "GET",
                dataType: "json",
                success:function(data) {
                    $('#subcategory').empty();
                    $('#subcategory').append('<option value="">--Select Subcategory--</option>');
                    $.each(data, function(create, subcategory) {
                        $('#subcategory').append('<option value="'+ subcategory.id +'">'+ subcategory.sub_name +'</option>');
                    });
                }
            });
        } else {
            $('#subcategory').empty();
            $('#subcategory').append('<option value="">--Select Subcategory--</option>');
        }
    });
</script>
          <!-- /.col -->
        
              <!-- /.col -->
        
            <!-- /.row -->
          
        <!-- /.card -->
<!--end row-->
<div class="col-md-3">
                <button type="submit" class="btn btn-block btn-primary">Submit</button>
                </div>
  </form>


@endsection