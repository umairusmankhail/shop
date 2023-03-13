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
          <form action="{{route('product.store')}}" method="post" name="product"  enctype="multipart/form-data">
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
        <div id="image-upload">
  <label for="file-upload">
    <span id="upload-text">Choose an image to upload or drag it here</span>
    <img id="uploaded-image" class="d-none img-fluid">
    <span id="drag-file-name" class="d-none"></span>
  </label>
  <input type="file" id="file-upload" accept="image/*">
</div>

<div class="card mt-4 d-none" id="image-card">
  <img class="card-img-top" id="card-image">
  <div class="card-body">
    <button type="button" class="btn btn-danger" id="delete-image">Delete Image</button>
  </div>
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
  const imageUpload = document.getElementById("image-upload");
  const uploadText = document.getElementById("upload-text");
  const uploadedImage = document.getElementById("uploaded-image");
  const fileUpload = document.getElementById("file-upload");
  const imageCard = document.getElementById("image-card");
  const cardImage = document.getElementById("card-image");
  const deleteImageBtn = document.getElementById("delete-image");
  const dragFileName = document.getElementById("drag-file-name");

  // Show the uploaded image when a file is selected
  fileUpload.addEventListener("change", function(event) {
    const file = event.target.files[0];
    const reader = new FileReader();
    reader.onload = function(event) {
      uploadedImage.src = event.target.result;
      uploadText.classList.add("d-none");
      uploadedImage.classList.remove("d-none");
      imageCard.classList.remove("d-none");
      cardImage.src = event.target.result;
    };
    reader.readAsDataURL(file);
  });

  // Show the uploaded image and file name when it is dragged and dropped
  imageUpload.addEventListener("dragover", function(event) {
    event.preventDefault();
    imageUpload.classList.add("drag-over");
  });
  imageUpload.addEventListener("dragleave", function(event) {
    event.preventDefault();
    imageUpload.classList.remove("drag-over");
  });
  imageUpload.addEventListener("drop", function(event) {
    event.preventDefault();
    imageUpload.classList.remove("drag-over");
    const file = event.dataTransfer.files[0];
    const reader = new FileReader();
    reader.onload = function(event) {
      uploadedImage.src = event.target.result;
      uploadText.classList.add("d-none");
      uploadedImage.classList.remove("d-none");
      imageCard.classList.remove("d-none");
      cardImage.src = event.target.result;
      dragFileName.innerText = file.name;
      dragFileName.classList.remove("d-none");
    };
    reader.readAsDataURL(file);
  });

  // Delete the uploaded image and file name when the Delete Image button is clicked
  deleteImageBtn.addEventListener("click", function() {
    uploadedImage.src = "";
    uploadText.classList.remove("d-none");
    uploadedImage.classList.add("d-none");
    imageCard.classList.add("d-none");
    cardImage.src = "";
    dragFileName.innerText = "";
    dragFileName.classList.add("d-none");
  });
</script>
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
<script>
$(document).ready(function() {
  $("form[name='product']").validate({
    // Specify validation rules
    rules: {
      p_name: {
        required: true
      },
      description: {
        required: true
      },
      price: {
        required: true,
        min: 0
      }
    },
    // Specify validation error messages
    messages: {
      name: "Please enter a product name",
      description: "Please enter a product description",
      price: {
        required: "Please enter a product price",
        min: "Product price cannot be negative"
      }
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});

</script>

@endsection