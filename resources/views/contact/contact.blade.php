@extends('layouts.master')

@section('title', 'Contact Information')

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
<table class="table table-bordered" id="contact-datatable">
<thead>
<tr>
<th>Id</th>
<th>Primary Phone No</th>
<th>Secondary Phone No</th>
<th>Primary Email</th>
<th>Secondary Email</th>
<th>Address</th>
<th>Action</th>
</tr>
</thead>
</table>
</div>
</div>
<!-- boostrap contact model -->
<div class="modal fade" id="contact-modal" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="ContactModal"></h4>
</div>
<div class="modal-body">
<form action="javascript:void(0)" id="ContactForm" name="ContactForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
<input type="hidden" name="id" id="id">
<div class="form-group">
<label for="name" class="col-sm-2 control-label">Primary Phone</label>
<div class="col-sm-12">
<input type="text" class="form-control" id="phone_1" name="phone_1" placeholder="Format +254..." maxlength="13" required="">
</div>
</div>  
<div class="form-group">
<label for="name" class="col-sm-2 control-label">Secondary Phone</label>
<div class="col-sm-12">
<input type="text" class="form-control" id="phone_2" name="phone_2" placeholder="Format +254..." maxlength="13" required="">
</div>
</div> 
<div class="form-group">
<label for="name" class="col-sm-2 control-label">Primary Email</label>
<div class="col-sm-12">
<input type="email" class="form-control" id="email_1" name="email_1" placeholder="Enter Email" maxlength="50" required="">
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-2 control-label">Secondary Email</label>
<div class="col-sm-12">
<input type="email" class="form-control" id="email_2" name="email_2" placeholder="Enter Email" maxlength="50" required="">
</div>
</div>
<div class="form-group">
<label for="name" class="col-sm-2 control-label">Address</label>
<div class="col-sm-12">
<input type="textarea" class="form-control" id="address" name="address" placeholder="Enter Address" maxlength="150" required="">
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
$('#contact-datatable').DataTable({
processing: true,
serverSide: true,
ajax: "{{ url('contact-datatable') }}",
columns: [
{ data: 'id', name: 'id' },
{ data: 'phone_1', name: 'phone_1' },
{ data: 'phone_2', name: 'phone_2' },
{ data: 'email_1', name: 'email_1' },
{ data: 'email_2', name: 'email_2' },
{ data: 'address', name: 'address' },
{data: 'action', name: 'action', orderable: false},
],
order: [[0, 'desc']]
});
});
function add(){
$('#ContactForm').trigger("reset");
$('#ContactModal').html("Add Contact");
$('#contact-modal').modal('show');
$('#id').val('');
}   
function editFunc(id){
$.ajax({
type:"POST",
url: "{{ url('edit-contact') }}",
data: { id: id },
dataType: 'json',
success: function(res){
$('#ContactModal').html("Edit Contact");
$('#contact-modal').modal('show');
$('#id').val(res.id);
$('#phone_1').val(res.phone_1);
$('#phone_2').val(res.phone_2);
$('#email_1').val(res.email_1);
$('#email_2').val(res.email_2);
$('#address').val(res.address);
}
});
}  
function deleteFunc(id){
if (confirm("Delete Record?") == true) {
var id = id;
// ajax
$.ajax({
type:"POST",
url: "{{ url('delete-contact') }}",
data: { id: id },
dataType: 'json',
success: function(res){
var oTable = $('#contact-datatable').dataTable();
oTable.fnDraw(false);
}
});
}
}
$('#ContactForm').submit(function(e) {
e.preventDefault();
var formData = new FormData(this);
$.ajax({
type:'POST',
url: "{{ url('store-contact')}}",
data: formData,
cache:false,
contentType: false,
processData: false,
success: (data) => {
$("#contact-modal").modal('hide');
var oTable = $('#contact-datatable').dataTable();
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