@include('layouts.header_dashboards')
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
                <li class="active">
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
                    <a class="navbar-brand" href="#">SCHOOL DATA IMPORT</a>
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
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title">Import</h4>
                                    </div>
                                    <div class="content"> 
                                        <a href="assets/school_details/school_details.xlsx" style="color:white;"><button type="submit" class="btn btn-primary btn-fill pull-right" style="margin-left: 25px;color: inherit;"><i class="fa fa-download"></i> Download Sample File</a></button>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="content"> 
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif

                                        @if($errors->any())
                                            <div class="alert alert-danger" role="alert">
                                                {{ implode('', $errors->all('')) }}
                                            </div>
                                        @endif

                                        <form action="{{route('fileUpload')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="box box-primary">
                                                <div class="form-group">
                                                    <div class="form-group files color">
                                                       <input type="file" id="file_import" name="file_import">
                                                    </div>
                                                    <div class="form-group col-sm-offset-5">
                                                        <button type="submit" class="btn btn-primary btn-fill pull-left"><i class="fa">&#xf0c7;</i> Save</button>
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
@include('layouts.footer_dashboards')