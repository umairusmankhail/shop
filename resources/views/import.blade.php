@extends('app')
@section('content')
<!-- resources/views/import.blade.php -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-6">
            <h4>Upload Product</h4>
          </div>
     
<form action="{{ route('import.products') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="file">Choose an Excel file:</label>
        <input type="file" name="file" class="form-control-file" id="file" accept=".xls,.xlsx">
    </div>
    <button type="submit" class="btn btn-primary">Import</button>
</form>
</div>
</div>
</div>
@endsection