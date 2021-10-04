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
                    <a class="navbar-brand" href="#">SCHOOL LIST</a>
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
                            <a style="margin: 5px 37px;" href="{{url("admin_logout")}}" style="color: inherit;">
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
                                        <h4 class="title">School List</h4>
                                    </div>
                                    <div class="content"> 
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="container mt-5">
                                        <table class="table table-bordered mb-5">
                                            <thead>
                                                <tr class="table-success">
                                                    <th scope="col">No</th>
                                                    <th scope="col">School Name</th>
                                                    <th scope="col">School Address</th>
                                                    <th scope="col">District</th>
                                                    <th scope="col">Edit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $count= 1;
                                                @endphp
                                                @foreach($schoolData as $data)
                                                <tr>
                                                    <th scope="row">{{ ++$i; }}</th>
                                                    <td>{{ $data->school_name }}</td>
                                                    <td>{{ $data->school_address }}</td>
                                                    <td>{{ $data->school_district }}</td>
                                                    <td>                        
                                                        <a href="{{ route('school_edit.school_edit', ['id' => encrypt($data->school_id)]) }}" style="color:inherit;"><i class="fa fa-pencil-square-o" aria-hidden="true" style="cursor:pointer;"> </i></a>
                                                        @csrf
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{-- Pagination --}}
                                        <div class="col-md-offset-3 d-flex justify-content-center">
                                            {!! $schoolData->links() !!}
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