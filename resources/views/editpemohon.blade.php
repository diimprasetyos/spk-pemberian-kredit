<!DOCTYPE html>
<html>
<head>
  <title>App</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <!-- CSRF Token -->
  <meta name="_token" content="{{ csrf_token() }}">
  
  <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">

  <!-- plugin css -->
  <link rel="stylesheet" href="{{ asset('css/vertical-layout-light/style.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
  <!-- end plugin css -->

  <!-- css for page -->
    <link rel="stylesheet" href="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">


  <!-- end css for page -->
  @stack('plugin-styles')

  <!-- common css -->
  <link rel="stylesheet" href="{{ asset('style.css') }}">
  <!-- end common css -->

  @stack('style')
</head>
<body data-base-url="{{url('/')}}">
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper">
            @include('layouts.header')
            <div class="sidebar sidebar-offcanvas" id="sidebar">
                @include('layouts.sidebar')
            </div>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Data Diri Pemohon</h4>
                            <p class="card-description">
                              Data Diri Pemohon
                            </p>
                            <form action="{{route('pemohons.update', $pemohons->id)}}" method="POST"  class="forms-sample">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="nama" value="{{$pemohons->nama}}" name="nama" placeholder="Name">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>   
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" value="{{$pemohons->email}}" name="email" placeholder="Email">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                        </div>
                        <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="no_hp" value="{{$pemohons->no_hp}}" name="no_hp" placeholder="62 xxxx xxxx">
                        @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                            
                        @enderror
                        </div>
                        <div class="form-group">
                        <label for="gender">Gender</label>
                            <select class="form-control" id="jenis_kelamin" value="{{$pemohons->jenis_kelamin}}" name="jenis_kelamin">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            </select>
                            @error('jenis_kelamnin')
                            <div class="alert alert-danger">{{ $message }}</div>
                            
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" value="{{$pemohons->city}}" name="city" placeholder="Location">
                        @error('city')
                            <div class="alert alert-danger">{{ $message }}</div>
                            
                        @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                    </form>
                </div>
            </div>
          </div>
                </div>
                @include('layouts.footer')
        </div>
        </div>
    </div>

  <!-- base js -->
    <script src="{{ asset('js/app.js') }}"></script>

  <!-- end base js -->

  <!-- plugin js -->
  @stack('plugin-scripts')
  <!-- end plugin js -->

  <!-- common js -->
 <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- end common js -->
 <!-- plugin js this page -->
 <script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
 <script src="{{ asset('vendors/datatables.net/jquery.dataTables.js') }}"></script>
 <script src="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
 <script src="{{ asset('js/dataTables.select.min.js') }}"></script>

 <!-- end plugin js for this page -->
 <!-- inject:js -->
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('js/template.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>
    <script src="{{ asset('js/todolist.js') }}"></script>

 <!-- Custom js for this page-->
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/Chart.roundedBarCharts.js') }}"></script>


</body>
</html>