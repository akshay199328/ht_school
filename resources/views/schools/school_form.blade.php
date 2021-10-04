@include('layouts.header_dashboards')
<style type="text/css">
	.btn-group>.btn:first-child {
	    margin-left: 0;
	    margin-top: 27px;
	}
	.btn-group .btn+.btn, .btn-group .btn+.btn-group, .btn-group .btn-group+.btn, .btn-group .btn-group+.btn-group {
	    margin-left: 0px;
	    margin-top: 27px;
	}

</style>
<div class="wrapper">
	<div class="sidebar" data-color="purple" data-image="assets_dashboards/img/sidebar-5.jpg">
	    <div class="sidebar-wrapper">
	        <div class="logo">
	            <a href="#" class="simple-text-admin-dashboard">
	                {{ Session::get('email') }}
	            </a>
	        </div>
	        <ul class="nav">
	            <li>
	                <a href="{{ route('admin_dashboard') }}">
	                    <i class="pe-7s-graph"></i>
	                    <p>Dashboard</p>
	                </a>
	            </li>
	            <li>
	                <a href="{{ route('import_add') }}">
	                    <i class="fa fa-file-excel-o" aria-hidden="true"></i>
	                    <p>School Data Import</p>
	                </a>
	            </li>
	            <li class="active">
	                <a href="{{ route('school_list') }}">
	                    <i class="fa fa-list" aria-hidden="true"></i>
	                    <p>School List</p>
	                </a>
	            </li>
	        </ul>
	    </div>
	</div>
	<div class="main-panel">
		<nav class="navbar navbar-default navbar-fixed">
		    <div class="container-fluid">
		        <div class="navbar-header">
		            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
		                <span class="sr-only">Toggle navigation</span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		            </button>
		            <a class="navbar-brand" href="#">EDIT SCHOOL PROFILE</a>
		        </div>
		        <div class="collapse navbar-collapse">
		            <ul class="nav navbar-nav navbar-left">
		                <li>
		                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
		                        <i class="fa fa-dashboard"></i>
		                        <p class="hidden-lg hidden-md">Dashboard</p>
		                    </a>
		                </li>
		            </ul>
		            <ul class="nav navbar-nav navbar-right">
		                <li>
		                    <a style="margin: 5px 37px;"  href="{{url("admin_logout")}}" style="color: inherit;">
		                        <p>({{ Session::get('email') }}) Log out <i class="fa fa-power-off" aria-hidden="true"></i></p>
		                    </a>
		                </li>
		                <li class="separator hidden-lg"></li>
		            </ul>
		        </div>
		    </div>
		</nav>
		<div class="content">
		    <div class="container-fluid">
		        <div class="row">
		            <div class="content">
		                <div class="container-fluid">
		                    <div class="row">
		                        <div class="col-md-12">
		                            <div class="card">
		                                <div class="header">
		                                    <h4 class="title">Edit School Profile</h4>
		                                </div>
		                                <div class="content">
		                                    <form role="form" method="POST" action="/update_school/{{encrypt($school_data[0]->school_id)}}">
		                                    	@csrf
		                                    	@if (session('status'))
		                                    	<div x-data="{show: true}" x-init="setTimeout(() => show = false, 1500)" x-show="show">
		                                    	    <div class="alert alert-success" role="alert">
		                                    	        {{ session('status') }}
		                                    	    </div>
		                                    	</div>
		                                    	@endif

		                                    	@if(session('errors'))
		                                    		<div x-data="{show: true}" x-init="setTimeout(() => show = false, 1500)" x-show="show">
		                                    		    <div class="alert alert-danger" role="alert">
		                                    		        {{ implode('', $errors->all('')) }}
		                                    		    </div>
		                                    		</div>
		                                    	@endif

		                                        <div class="row">
		                                            <div class="col-md-5">
		                                                <div class="form-group">
		                                                    <label>School Name</label>
		                                                    <input type="text" class="form-control" placeholder="School Name" id="school_name" name="school_name" value="{{ $school_data[0]->school_name }}" autocomplete="off" tabindex="1"/>
		                                                </div>
		                                            </div>
		                                            <div class="col-md-4">
		                                                <div class="form-group">
		                                                    <label>State</label>
		                                                    <select name="school_state" name="school_state" id="school_state" class="form-control" autocomplete="off" tabindex="2">
		                                                       <option value="0">Please Select</option>
		                                                       @foreach ($states as $key => $value)
		                                                           <option value="{{ $value->state_id }}" {{$school_data[0]->school_state == $value->state_id  ? 'selected' : ''}}>{{ $value->state_name }}</option>
		                                                       @endforeach
		                                                    </select>
		                                                </div>
		                                            </div>
		                                            <div class="col-md-3">
		                                                <div class="form-group">
		                                                    <label>District</label>
		                                                    <input type="text" class="form-control" placeholder="District" id="school_district" name="school_district" value="{{ $school_data[0]->school_district }}" autocomplete="off" tabindex="3"/>
		                                                </div>
		                                            </div>
		                                        </div>
		                                        <div class="row">
		                                            <div class="col-md-12">
		                                                <div class="form-group">
		                                                    <label>Address</label>
		                                                    <textarea class="form-control" placeholder="Address" tabindex="4" rows="5" name="school_address" autocomplete='off' id="school_address">{{ $school_data[0]->school_address }}</textarea>
		                                                </div>
		                                            </div>
		                                        </div>
		                                        <div class="row">
		                                            <div class="col-md-4">
		                                                <div class="form-group">
		                                                    <label>Email Id</label>
		                                                    <input type="text" class="form-control" tabindex="5" placeholder="Email Id" name="school_email_id" id="school_email_id" value="{{ $school_data[0]->school_email_id }}">
		                                                </div>
		                                            </div>
		                                            <div class="col-md-4">
		                                                <div class="form-group">
	                                                      	<div class="btn-group" data-toggle="buttons">
	                                                      	    <label class="btn btn-primary {{ ($school_data[0]->status =="1")? "active focus" : "" }}" style="border: 1px solid #E3E3E3;text-decoration: none;color: black;font-weight: bold;font-size: 14px;">
	                                                      	        <input type="radio" value="1" name="status" id="status1" {{ ($school_data[0]->status =="1")? "checked" : "" }}> Active
	                                                      	    </label>
	                                                      	    <label class="btn btn-primary {{ ($school_data[0]->status =="0")? "active focus" : "" }}" style="border: 1px solid #E3E3E3;text-decoration: none;color: black;font-weight: bold;font-size: 14px;">
	                                                      	        <input type="radio" name="status" value="0" id="status2" {{ ($school_data[0]->status =="0")? "checked" : "" }}> Inactive
	                                                      	    </label>
	                                                      	    <label class="btn btn-primary {{ ($school_data[0]->status =="-2")? "active focus" : "" }}" style="border: 1px solid #E3E3E3;text-decoration: none;color: black;font-weight: bold;font-size: 14px;">
                                                      	        	<input type="radio" name="status" value="-2" id="status3" {{ ($school_data[0]->status =="-2")? "checked" : "" }}> Disabled
	                                                      	    </label>
	                                                      	</div>
	                                                    </div>
	                                                </div>
		                                        </div>
		                                        <div class="row">
		                                            <div class="col-md-4 col-md-offset-1">
		                                                <div class="form-group">
		                                                    <button type="submit" class="btn btn-info btn-fill pull-right">Update</button>
		                                                    <div class="clearfix"></div>
		                                                </div>
		                                            </div>
		                                            <div class="col-md-1">
		                                                <div class="form-group">
		                                                    <a class="btn btn-default btn-close btn-fill pull-right" href="{{ route('school_list') }}">Cancel</a>
		                                                    <div class="clearfix"></div>
		                                                </div>
		                                            </div>
		                                        </div>
		                                    </form>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
	</div>
</div>
@include('layouts.footer_dashboards')