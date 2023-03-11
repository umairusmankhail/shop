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
            <h1>Add Product</h1>
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
        
<form action="{{ route('product.update', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
      <div class="card-body">
          <div class="form-row">
    <div class="form-group col-md-4 mb-3">
      <label for="input1">Product Name</label>
      <input type="text" value="{{$product->p_name}}" class="form-control" id="productname" name="p_name">
    </div>
    <div class="form-group col-md-4 mb-3">
      <label for="input2">Item No:</label>
      <input type="text" class="form-control" id="item_no" value="{{$product->item_no}}" name="item_no">
    </div>
    <div class="form-group col-md-4 mb-3">
    <label for="select1">Authorize</label>
      <select class="form-control" id="select1" name="authorize">
        <option value="{{$product->authorize}}">"{{$product->authorize}}"</option>
        <option value="option1">Option 1</option>
        <option value="option2">Option 2</option>
        <option value="option3">Option 3</option>
      </select>
    </div>
  </div>
    <div class="form-row">
    <div class="form-group col-md-6">
      <label for="select1">Category</label>
      <select class="form-control" id="selecth4" name="category_id">
        <option value="{{$product->category_id}}">"{{$product->category_id}}"</option>
        <option value="option1">Option 1</option>
        <option value="option2">Option 2</option>
        <option value="option3">Option 3</option>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="select1">Sub Category</label>
      <select class="form-control" id="select4" name="subcategory">
        <option value="">"{{$product->subcategory}}"</option>
        <option value="option1">Option 1</option>
        <option value="option2">Option 2</option>
        <option value="option3">Option 3</option>
      </select>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4 mb-3">
      <label for="input5">Size</label>
      <input type="text" class="form-control " value="{{$product->size}}" id="input5" name="size">
    </div>
    <div class="form-group col-md-2 mb-3">
      <label for="input6">Size Unit</label>
      <input type="text" class="form-control"value= "{{$product->size_unit}}"  id="input6" name="size_unit">
    </div>
    <div class="form-group col-md-2 mb-3">
      <label for="input7">Weight</label>
      <input type="text" class="form-control"value= "{{$product->weight}}" id="input7" name="weight">
    </div>
    <div class="form-group col-md-2 mb-3">
      <label for="input8">Weight unit</label>
      <input type="text" class="form-control" value="{{$product->w_unit}}" id="input8" name="w_unit">
    </div>
    <div class="form-group col-md-2 mb-3">
      <label for="input9">Color</label>
      <input type="text" class="form-control" value="{{$product->color}}" id="input9" name="color">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4 mb-3">
      <label for="input5">Price trem</label>
      <input type="text" class="form-control " value="{{$product->p_trem}}" id="input5" name="p_trem">
    </div>
    <div class="form-group col-md-2 mb-3">
      <label for="input6">Currency</label>
      <input type="text" class="form-control" value="{{$product->currency}}" id="input6" name="currency">
    </div>
    <div class="form-group col-md-2 mb-3">
      <label for="input7">MOQ</label>
      <input type="text" class="form-control" value="{{$product->moq}}" id="input7" name="moq">
    </div>
    <div class="form-group col-md-2 mb-3">
      <label for="input8">MOQ unit</label>
      <input type="text" class="form-control" value="{{$product->moq_unit}}" id="input8" name="moq_unit">
    </div>
    <div class="form-group col-md-2 mb-3">
      <label for="input9">Material Grade</label>
      <input type="text" class="form-control" id="input9"value= "{{$product->m_grade}}" name="m_grade">
    </div>
  </div>
  <div class="form-row">
  
    <div class="form-group col-md-2 mb-3">
      <label for="input6">Price</label>
      <input type="text" class="form-control" id="input6" value="{{$product->price}}" name="price">
    </div>
    <div class="form-group col-md-2 mb-3">
      <label for="input7">price per unit</label>
      <input type="text" class="form-control" id="input7" value="{{$product->p_unit}}" name="p_unit">
    </div>
    <div class="form-group col-md-4 mb-3">
      <label for="input5">Price for Quantity</label>
      <input type="text" class="form-control " id="input5"value= "{{$product->qty}}" name="p_qty">
    </div>
    <div class="form-group col-md-2 mb-3">
      <label for="input8">Price Qty Unit</label>
      <input type="text" class="form-control" id="input8" value="{{$product->price_qty_unit}}" name="price_qty_unit">
    </div>
    <div class="form-group col-md-2 mb-3">
      <label for="input9">G.W.(kgs)</label>
      <input type="text" class="form-control" id="input9"value= "{{$product->g_w_kg}}" name="g_w_kg">
    </div>
  </div>
  <div class="form-row">
  
 
  <div class="form-group col-md-2 mb-3">
    <label for="input7">Lenght</label>
    <input type="text" class="form-control" id="input7" value="{{$product->lenght}}" name="lenght">
  </div>
  <div class="form-group col-md-3 mb-3">
    <label for="input6">Height</label>
    <input type="text" class="form-control" id="input6" value= "{{$product->height}}" name="height">
  </div>
  <div class="form-group col-md-2 mb-3">
    <label for="input5">Width</label>
    <input type="text" class="form-control " value=""{{$product->width}}"" id="input5" name="width">
  </div>
  <div class="form-group col-md-2 mb-3">
    <label for="input8">M3/CTN</label>
    <input type="text" class="form-control" value="{{$product->m3ctn}}" id="input8" name="m3ctn">
  </div>
  <div class="form-group col-md-2 mb-3">
    <label for="input9">HS Code</label>
    <input type="text" class="form-control" id="input9" value="{{$product->hs_code}}" name="hs_code">
  </div>
</div>
<div class="form-row">
  
  <div class="form-group col-md-2 mb-3">
    <label for="input6">Inner Pack</label>
    <input type="text" class="form-control" id="input6" value="{{$product->in_pack}}"  name="in_pack">
  </div>
  <div class="form-group col-md-2 mb-3">
    <label for="input7">Inner Pack unit</label>
    <input type="text" class="form-control" id="input7" value="{{$product->inn_pack_unit}}"  name="inn_pack_unit">
  </div>
  <div class="form-group col-md-4 mb-3">
    <label for="input5">Mid Pack</label>
    <input type="text" class="form-control " id="input5" value="{{$product->mid_pack}}"  name="mid_pack">
  </div>
  <div class="form-group col-md-2 mb-3">
    <label for="input8">Mid Pack Unit/label>
    <input type="text" class="form-control" id="input8" value="{{$product->mid_pack_unit}}" name="mid_pack_unit">
  </div>
  <div class="form-group col-md-2 mb-3">
    <label for="input9">Big pack</label>
    <input type="text" class="form-control" id="input9"value="{{$product->big_pack}}"  name="big_pack">
  </div>
  <div class="form-group col-md-2 mb-3">
    <label for="input9">Big pack Unit</label>
    <input type="text" class="form-control" id="input9"value="{{$product->big_pack_unit}}"  name="big_pack_unit">
  </div>
</div>


  
  
  <div class="form-row justify-content-between">
    <div class="form-group col-md-4 mb-3">
      <label for="input1">Thickness</label>
      <input type="text" class="form-control" id="input1"value="{{$product->thickness}}"  name="thickness">
    </div>
    <div class="form-group col-md-4 mb-3">
      <label for="input2">Thickness Per Unit</label>
      <input type="text" class="form-control" id="input2" value="{{$product->thickness_unit}}"  name="thickness_unit">
    </div>
    <div class="form-group col-md-3 mb-3">
      <label for="input3">Add new Elenments</label>
      <input type="text" class="form-control" id="input3" value="{{$product->add_element}}" name="add_element">
    </div>
  </div>
  <div class ="form-row">
  <div class="form-group col-md-8 mb-3">
      <label for="textarea1">Description</label>
      <textarea class="form-control" id="textarea1" value="{{$product->description}}" name="description" rows="4"></textarea>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <label for="input-files">Images</label>
      <div class="d-flex">
        <div class="card p-5 mr-2 image-card">
          <label for="input-file1" class="btn btn-outline-secondary">
            <i class="fas fa-plus fa-2x"></i><br>
            Upload Image
          </label>
          <input type="file" name="images[]" id="input-file1" class="d-none" onchange="handleImageUpload(this)">
        </div>
        <div class="card p-5 mr-2 image-card">
          <label for="input-file2" class="btn btn-outline-secondary">
            <i class="fas fa-plus fa-2x"></i><br>
            Upload Image
          </label>
          <input type="file" name="images[]" id="input-file2" class="d-none" onchange="handleImageUpload(this)">
        </div>
        <div class="card p-5 mr-2 image-card">
          <label for="input-file3" class="btn btn-outline-secondary">
            <i class="fas fa-plus fa-2x"></i><br>
            Upload Image
          </label>
          <input type="file" name="images[]" id="input-file3" class="d-none" onchange="handleImageUpload(this)">
        </div>
        <div class="card p-5 mr-2 image-card">
          <label for="input-file4" class="btn btn-outline-secondary">
            <i class="fas fa-plus fa-2x"></i><br>
            Upload Image
          </label>
          <input type="file" name="images[]" id="input-file4" class="d-none" onchange="handleImageUpload(this)">
        </div>
        <div class="card p-5 mr-2 image-card">
          <label for="input-file5" class="btn btn-outline-secondary">
            <i class="fas fa-plus fa-2x"></i><br>
            Upload Image
          </label>
          <input type="file" name="images[]" id="input-file5" class="d-none" onchange="handleImageUpload(this)">
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
<script>
document.addEventListener("DOMContentLoaded", function() {
  const imageCards = document.querySelectorAll('.image-card');
  const dFlex = document.querySelector('.d-flex');

  imageCards.forEach(function(imageCard) {
    imageCard.addEventListener('mousedown', function() {
      this.classList.add('dragging');
    });

    imageCard.addEventListener('mouseup', function() {
      this.classList.remove('dragging');
    });
  });

  dFlex.addEventListener('mousedown', function() {
    this.classList.add('sorting');
  });

  dFlex.addEventListener('mouseup', function() {
    this.classList.remove('sorting');
  });

  dFlex.addEventListener('dragover', function(event) {
    event.preventDefault();
    const afterElement = getDragAfterElement(dFlex, event.clientX);
    const draggable = document.querySelector('.dragging');
    if (afterElement == null) {
      dFlex.appendChild(draggable);
    } else {
      dFlex.insertBefore(draggable, afterElement);
    }
  });

  function getDragAfterElement(container, clientX) {
    const draggableElements = [...container.querySelectorAll('.image-card:not(.dragging)')];
    return draggableElements.reduce(function(closest, child) {
      const box = child.getBoundingClientRect();
      const offset = clientX - box.left - box.width / 2;
      if (offset < 0 && offset > closest.offset) {
        return { offset: offset, element: child };
      } else {
        return closest;
      }
    }, { offset: Number.NEGATIVE_INFINITY }).element;
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