@extends('layouts.master')

@section('title', 'Product Categories')

@section('content')
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="float-left">
    <ol class="breadcrumb float-sm-right">
      @if (Auth::user()->role == 'admin')
      <li class="breadcrumb-item"><a href="{{url('admin_dashboard')}}">Home</a></li>
      @elseif (Auth::user()->role == 'seller')
      <li class="breadcrumb-item"><a href="{{url('seller_dashboard')}}">Home</a></li> 
      @else
      <li class="breadcrumb-item"><a href="{{url('buyer_dashboard')}}">Home</a></li> 
      @endif
      <li class="breadcrumb-item active">@yield('title')</li>
    </ol>
</div>
<div class="float-right mb-2">
<a class="btn btn-success" onClick="add()" href="javascript:void(0)"> Create Category</a>
</div>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<div class="card-body">
<table class="table table-bordered" id="category-datatable">
<thead>
<tr>
<th>Id</th>
<th>Name</th>
<th>Action</th>
</tr>
</thead>
</table>
</div>
</div>
<!-- boostrap category model -->
<div class="modal fade" id="category-modal" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="CategoryModal"></h4>
</div>
<div class="modal-body">
<form action="javascript:void(0)" id="CategoryForm" name="CategoryForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
<input type="hidden" name="id" id="id">
<div class="form-group">
<label for="name" class="col-sm-2 control-label">Name</label>
<div class="col-sm-12">
<input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" maxlength="50" required="">
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
$('#category-datatable').DataTable({
processing: true,
serverSide: true,
ajax: "{{ url('category-datatable') }}",
columns: [
{ data: 'id', name: 'id' },
{ data: 'name', name: 'name' },
{data: 'action', name: 'action', orderable: false},
],
order: [[0, 'desc']]
});
});
function add(){
$('#CategoryForm').trigger("reset");
$('#CategoryModal').html("Add Category");
$('#category-modal').modal('show');
$('#id').val('');
}   
function editFunc(id){
$.ajax({
type:"POST",
url: "{{ url('edit-category') }}",
data: { id: id },
dataType: 'json',
success: function(res){
$('#CategoryModal').html("Edit Category");
$('#category-modal').modal('show');
$('#id').val(res.id);
$('#name').val(res.name);
}
});
}  
function deleteFunc(id){
if (confirm("Delete Record?") == true) {
var id = id;
// ajax
$.ajax({
type:"POST",
url: "{{ url('delete-category') }}",
data: { id: id },
dataType: 'json',
success: function(res){
var oTable = $('#category-datatable').dataTable();
oTable.fnDraw(false);
}
});
}
}
$('#CategoryForm').submit(function(e) {
e.preventDefault();
var formData = new FormData(this);
$.ajax({
type:'POST',
url: "{{ url('store-category')}}",
data: formData,
cache:false,
contentType: false,
processData: false,
success: (data) => {
$("#category-modal").modal('hide');
var oTable = $('#category-datatable').dataTable();
oTable.fnDraw(false);
$("#btn-save").html('Submit');
$("#btn-save"). attr("disabled", false);
},
error: function(data){
console.log(data);
}
});
});
</script>
@endsection