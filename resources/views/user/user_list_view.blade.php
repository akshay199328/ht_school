<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>HT SCHOOL</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/shared/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/demo_1/style.css') }}">
</head>
<body>
    <div class="container-scroller">
        <!-- partial:layouts/header.blade.php -->
        @include('layouts.header')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:layouts/siderbar.blade.php -->
            @include('layouts.sidebar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <h1>User Master</h1>
                    <ol class="breadcrumb">
                      <li><a href="#"><i class="fa fa-dashboard"></i> Home &nbsp;&nbsp; / </a></li>
                      <li class="active"> &nbsp;&nbsp;User Master</li>
                    </ol>
                    <div class="row page-title-header">
                        <div class="col-md-12">
                            <div class="box box-success">
                                
                            </div>
                        </div>
                    </div>
                    <div class="row page-title-header">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    {{-- <th>Edit</th>
                                    <th>Delete</th> --}}
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($users as $key => $value)
                                    <tr>
                                      <td> {{$value['name']}} </td>
                                      <td> {{$value['email']}} </td>
                                      {{-- <td><i style="font-size:24px" class="fa">&#xf044;</i></td>
                                      <td><i style="font-size:24px" class="fa">&#xf014;</i></td> --}}
                                    </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/layouts/footer.blade.php -->
                @include('layouts.footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('assets/js/shared/misc.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- DataTable -->
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js" type="text/javascript"></script>
    @yield('scripts')
</body>

</html>
