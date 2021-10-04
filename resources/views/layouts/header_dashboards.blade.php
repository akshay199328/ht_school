<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<link rel="icon" type="image/png" href="asset/img/favicon.svg">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>HT SCHOOL</title>
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
<meta name="viewport" content="width=device-width" />
<!-- Bootstrap core CSS     -->
<link href="../assets_dashboards/css/bootstrap.min.css" rel="stylesheet" />
<!-- Animation library for notifications   -->
<link href="../assets_dashboards/css/animate.min.css" rel="stylesheet"/>
<!--  Light Bootstrap Table core CSS    -->
<link href="../assets_dashboards/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
<!--  CSS for Demo Purpose, don't include it in your project     -->
<link href="../assets_dashboards/css/demo.css" rel="stylesheet" />
<!--     Fonts and icons     -->
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
<link href="../assets_dashboards/css/pe-icon-7-stroke.css" rel="stylesheet" />
<link href="../assets_dashboards/css/pe-icon-7-stroke.css" rel="stylesheet" />
<link href="../assets_dashboards/css/custom.css" rel="stylesheet" />
</head>
<body>
	<div class="sidebar" data-color="purple" data-image="../assets_dashboards/img/sidebar-5.jpg">
	    <div class="sidebar-wrapper">
	        <div class="logo">
	            <a href="#" class="simple-text-admin-dashboard">
	                {{ Session::get('email') }}
	            </a>
	        </div>
	        <ul class="nav">
	            <li class="active">
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
	            <li>
	                <a href="{{ route('school_list') }}">
                        <i class="fa fa-list" aria-hidden="true"></i>
                        <p>School List</p>
                    </a>
	            </li>
	        </ul>
	    </div>
	</div>
</body>