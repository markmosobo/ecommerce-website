@extends('layouts.master')

@section('title', 'My Products')  

@section('content')
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="float-left">
    <ol class="breadcrumb float-sm-right">
      @can('isAdmin')
      <li class="breadcrumb-item"><a href="{{url('admin_dashboard')}}">Home</a></li>        
      @endcan
      @can('isSeller')
      <li class="breadcrumb-item"><a href="{{url('seller_dashboard')}}">Home</a></li>         
      @endcan
      @can('isBuyer')
      <li class="breadcrumb-item"><a href="{{url('buyer_dashboard')}}">Home</a></li>         
      @endcan
      <li class="breadcrumb-item active">@yield('title')</li>
    </ol>
</div>
<div class="float-right mb-2">
  <a class="btn btn-success" onClick="add()" href="javascript:void(0)"> Create Product</a>    
</div>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<div class="card-body">
<table class="table table-bordered" id="sellerproduct-datatable">
<thead>
<tr>
<th>Id</th>
<th>Name</th>
<th>Category</th>
<th>Price</th>
<th>Stock</th>
<th>Action</th>  
</tr>
</thead>
</table>
</div>
</div>
<!-- boostrap product model -->
<div class="modal fade" id="product-modal" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="ProductModal"></h4>
</div>
<div class="modal-body">
<form action="javascript:void(0)" id="ProductForm" name="ProductForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
<input type="hidden" name="id" id="id">
<div class="form-group">
<label for="name" class="col-sm-2 control-label">Name</label>
<div class="col-sm-12">
<input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" maxlength="50" required="">
</div>
</div>  
<div class="form-group">
<label for="name" class="col-sm-2 control-label">Category</label>
<div class="col-sm-12">
    <select name="category_id" id="category_id" class="form-control" maxlength="50" required="">
    <option value="0">Select category</option>
    @foreach ($categories as $category)
    @if ($category->sex == 'M')
    <option value="{{$category->id}}">{{$category->name}} (Men)</option>            
    @elseif ($category->sex == 'F')  
    <option value="{{$category->id}}">{{$category->name}} (Women)</option>            
    @else
    <option value="{{$category->id}}">{{$category->name}}</option>                
    @endif
    @endforeach
    </select>
</div>
</div> 
<div class="form-group">
<label for="name" class="col-sm-2 control-label">Price</label>
<div class="col-sm-12">
<input type="text" class="form-control" id="price" name="price" placeholder="Enter Price" maxlength="50" required="">
</div>
</div> 
<div class="form-group">
<label for="name" class="col-sm-2 control-label">Quantity</label>
<div class="col-sm-12">
<input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter Quantity" min="1" max="1000000" required="">
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-2 control-label">Description</label>
<div class="col-sm-12">
<input type="text" class="form-control" id="description" name="description" placeholder="Enter description" maxlength="2250" required="">
</div>
</div> 
<div class="col-md-12">
<div class="form-group">
<input type="file" name="images[]" id="images" placeholder="Choose images" multiple >
</div>
<div class="col-md-12">
<div class="mt-1 text-center">
<div class="show-multiple-image-preview"> </div>
</div>  
</div>
<div class="col-sm-offset-2 col-sm-10">
<button type="submit" class="btn btn-primary" id="btn-save">Save changes
</button>
</div>
</form>
</div>
<div class="modal-footer">
</div>
</div>
</div>
</div>
<!-- end bootstrap model -->
<script type="text/javascript">
$(document).ready( function () {
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$(function() {
// Multiple images preview with JavaScript
var ShowMultipleImagePreview = function(input, imgPreviewPlaceholder) {
if (input.files) {
var filesAmount = input.files.length;
for (i = 0; i < filesAmount; i++) {
var reader = new FileReader();
reader.onload = function(event) {
$($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
}
reader.readAsDataURL(input.files[i]);
}
}
};
$('#images').on('change', function() {
ShowMultipleImagePreview(this, 'div.show-multiple-image-preview');
});
});
$('#sellerproduct-datatable').DataTable({
processing: true,
serverSide: true,
ajax: "{{ url('sellerproduct-datatable') }}",
columns: [
{ data: 'id', name: 'id' },
{ data: 'name', name: 'name' },
{ data: 'category', name: 'category.name' },
{ data: 'price', name: 'price' },
{ data: 'quantity', name: 'quantity' },
{data: 'action', name: 'action', orderable: false},  
],
order: [[0, 'desc']]
});
});
function add(){
$('#ProductForm').trigger("reset");
$('#ProductModal').html("Add Product");
$('#product-modal').modal('show');
$('#id').val('');
}   
function editFunc(id){
$.ajax({
type:"POST",
url: "{{ url('edit-product') }}",
data: { id: id },
dataType: 'json',
success: function(res){
$('#ProductModal').html("Edit Product");
$('#product-modal').modal('show');
$('#id').val(res.id);
$('#name').val(res.name);
$('#price').val(res.price);
$('#quantity').val(res.quantity);
}
});
}  
function deleteFunc(id){
if (confirm("Delete Record?") == true) {
var id = id;
// ajax
$.ajax({
type:"POST",
url: "{{ url('delete-product') }}",
data: { id: id },
dataType: 'json',
success: function(res){
var oTable = $('#sellerproduct-datatable').dataTable();
oTable.fnDraw(false);
}
});
}
}
$('#ProductForm').submit(function(e) {
e.preventDefault();
var formData = new FormData(this);
let TotalImages = $('#images')[0].files.length; //Total Images
let images = $('#images')[0];
for (let i = 0; i < TotalImages; i++) {
formData.append('images' + i, images.files[i]);
}
formData.append('TotalImages', TotalImages);
$.ajax({
type:'POST',
url: "{{ url('store-product')}}",
data: formData,
cache:false,
contentType: false,
processData: false,
success: (data) => {
$("#product-modal").modal('hide');
var oTable = $('#sellerproduct-datatable').dataTable();
oTable.fnDraw(false);
$("#btn-save").html('Submit');
$("#btn-save"). attr("disabled", false);
this.reset();
alert('Images has been uploaded successfully');
$('.show-multiple-image-preview').html("")
},
error: function(data){
console.log(data);
}
});
});
</script>
@endsection