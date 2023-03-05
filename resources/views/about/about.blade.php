@extends('layouts.master')

@section('title', 'About Us Information')

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
<!-- <div class="float-right mb-2">
<a class="btn btn-success" onClick="add()" href="javascript:void(0)"> Create User</a>
</div> -->
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<div class="card-body">
<table class="table table-bordered" id="about-datatable">
<thead>
<tr>
<th>Id</th>
<th>Brief Description</th>
<th>Quote</th>
<th>Full Description</th>
<th>Action</th>
</tr>
</thead>
</table>
</div>
</div>
<!-- boostrap about model -->
<div class="modal fade" id="about-modal" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="AboutModal"></h4>
</div>
<div class="modal-body">
<form action="javascript:void(0)" id="AboutForm" name="AboutForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
<input type="hidden" name="id" id="id">
<div class="form-group">
<label for="name" class="col-sm-2 control-label">Brief Description</label>
<div class="col-sm-12">
<input type="textarea" class="form-control" id="short_description" name="short_description" placeholder="Enter a brief overview..." maxlength="13" required="">
</div>
</div>  
<div class="form-group">
<label for="name" class="col-sm-2 control-label">Quote</label>
<div class="col-sm-12">
<input type="textarea" class="form-control" id="quote" name="quote" placeholder="Enter Quote" maxlength="13" required="">
</div>
</div> 
<div class="form-group">
<label for="name" class="col-sm-2 control-label">Full Description</label>
<div class="col-sm-12">
<input type="textarea" class="form-control" id="long_description" name="long_description" placeholder="Enter full description" maxlength="50" required="">
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
$('#about-datatable').DataTable({
processing: true,
serverSide: true,
ajax: "{{ url('about-datatable') }}",
columns: [
{ data: 'id', name: 'id' },
{ data: 'short_description', name: 'short_description' },
{ data: 'quote', name: 'quote' },
{ data: 'long_description', name: 'long_description' },
{data: 'action', name: 'action', orderable: false},
],
order: [[0, 'desc']]
});
});
function add(){
$('#AboutForm').trigger("reset");
$('#AboutModal').html("Add About");
$('#about-modal').modal('show');
$('#id').val('');
}   
function editFunc(id){
$.ajax({
type:"POST",
url: "{{ url('edit-about') }}",
data: { id: id },
dataType: 'json',
success: function(res){
$('#AboutModal').html("Edit About");
$('#about-modal').modal('show');
$('#id').val(res.id);
$('#short_description').val(res.short_description);
$('#quote').val(res.quote);
$('#long_description').val(res.long_description);
}
});
}  
function deleteFunc(id){
if (confirm("Delete Record?") == true) {
var id = id;
// ajax
$.ajax({
type:"POST",
url: "{{ url('delete-about') }}",
data: { id: id },
dataType: 'json',
success: function(res){
var oTable = $('#about-datatable').dataTable();
oTable.fnDraw(false);
}
});
}
}
$('#AboutForm').submit(function(e) {
e.preventDefault();
var formData = new FormData(this);
$.ajax({
type:'POST',
url: "{{ url('store-about')}}",
data: formData,
cache:false,
contentType: false,
processData: false,
success: (data) => {
$("#about-modal").modal('hide');
var oTable = $('#about-datatable').dataTable();
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