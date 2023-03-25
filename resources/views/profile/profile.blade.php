@extends('layouts.master')

@section('content')

<div class="x_title">
    <h2>Profile <small>Activity Report</small></h2>

    <div class="clearfix"></div>
    </div>
    <div class="x_content">
    @foreach ($currentuser as $user)
    <div class="col-md-3 col-sm-3  profile_left">
        <div class="profile_img">
        <div id="crop-avatar">
            <!-- Current avatar -->
            <img class="img-responsive avatar-view" src="{{Storage::url($user->image_path)}}" alt="Avatar" title="Change the avatar">
        </div>
        </div>
        <h3>{{$user->first_name}} {{$user->last_name}}</h3>

        <ul class="list-unstyled user_data">
        <li><i class="fa fa-map-marker user-profile-icon"></i> {{$user->address}}
        </li>

        <li>
            <i class="fa fa-user user-profile-icon"></i> {{$user->role}}
        </li>

        <li class="m-top-xs">
            <i class="fa fa-envelope user-profile-icon"></i>
            {{$user->email}}
        </li>
        </ul>

        <a class="btn btn-success" onClick="editFunc({{ $user->id }})" data-toggle="tooltip" data-original-title="Edit" href="javascript:void(0)"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
        <br />

    </div>                        
    @endforeach

    <div class="col-md-9 col-sm-9 ">

        <div class="" role="tabpanel" data-example-id="togglable-tabs">
        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
            <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Recent Activity</a>
            </li>
            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Projects Worked on</a>
            </li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div role="tabpanel" class="tab-pane active " id="tab_content1" aria-labelledby="home-tab">

            <!-- start recent activity -->
            <ul class="messages">
                @foreach($userlogs as $log)
                <li>
                    <!-- <div class="message_date">
                        <h3 class="date text-info">24</h3>
                        <p class="month">May</p>
                    </div> -->
                    <div class="message_wrapper">
                        <h4 class="heading">{{$log->title}}</h4>
                        <blockquote class="message"> {{$log->activity}}</blockquote>
                        <br />
                        <p class="url">
                        <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                        </p>
                    </div>
                </li>
                @endforeach
            </ul>
            <!-- end recent activity -->

            </div>
            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

            <!-- start user projects -->
            <table class="data table table-striped no-margin">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Project Name</th>
                    <th>Client Company</th>
                    <th class="hidden-phone">Hours Spent</th>
                    <th>Contribution</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>New Company Takeover Review</td>
                    <td>Deveint Inc</td>
                    <td class="hidden-phone">18</td>
                    <td class="vertical-align-mid">
                    <div class="progress">
                        <div class="progress-bar progress-bar-success" data-transitiongoal="35"></div>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>New Partner Contracts Consultanci</td>
                    <td>Deveint Inc</td>
                    <td class="hidden-phone">13</td>
                    <td class="vertical-align-mid">
                    <div class="progress">
                        <div class="progress-bar progress-bar-danger" data-transitiongoal="15"></div>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Partners and Inverstors report</td>
                    <td>Deveint Inc</td>
                    <td class="hidden-phone">30</td>
                    <td class="vertical-align-mid">
                    <div class="progress">
                        <div class="progress-bar progress-bar-success" data-transitiongoal="45"></div>
                    </div>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>New Company Takeover Review</td>
                    <td>Deveint Inc</td>
                    <td class="hidden-phone">28</td>
                    <td class="vertical-align-mid">
                    <div class="progress">
                        <div class="progress-bar progress-bar-success" data-transitiongoal="75"></div>
                    </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <!-- end user projects -->

            </div>
        </div>
        </div>
    </div>
    </div>

<!-- boostrap user model -->
<div class="modal fade" id="profile-modal" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="ProfileModal"></h4>
</div>
<div class="modal-body">
<form action="javascript:void(0)" id="ProfileForm" name="ProfileForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
<input type="hidden" name="id" id="id">
<div class="form-group">
<label for="first_name" class="col-sm-2 control-label">First Name</label>
<div class="col-sm-12">
<input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" maxlength="50" required="">
</div>
</div>  
<div class="form-group">
<label for="last_name" class="col-sm-2 control-label">Last Name</label>
<div class="col-sm-12">
<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" maxlength="50" required="">
</div>
</div> 
<div class="form-group">
<label for="name" class="col-sm-2 control-label">Email</label>
<div class="col-sm-12">
<input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" maxlength="50" required="">
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Role</label>
<div class="col-sm-12">
     <select name="role" id="role" class="form-control" maxlength="50" required="">
        <option value="admin">Administrator</option>
        <option value="buyer">Buyer</option>
        <option value="seller">Seller</option>
      </select>
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
function editFunc(id){
$.ajax({
type:"POST",
url: "{{ url('edit-profile') }}",
data: { id: id },
dataType: 'json',
success: function(res){
$('#ProfileModal').html("Edit Profile");
$('#profile-modal').modal('show');
$('#id').val(res.id);
$('#first_name').val(res.first_name);
$('#last_name').val(res.last_name);
$('#email').val(res.email);
}
});
}  
$('#ProfileForm').submit(function(e) {
e.preventDefault();
var formData = new FormData(this);
$.ajax({
type:'POST',
url: "{{ url('store-profile')}}",
data: formData,
cache:false,
contentType: false,
processData: false,
success: (data) => {
$("#profile-modal").modal('hide');
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