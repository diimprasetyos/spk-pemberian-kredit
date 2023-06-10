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
                            <h4 class="card-title">Tambah Data Pemohon</h4>
                            <p class="card-description">
                                Tambah Data Pemohon
                              </p>
                        <br>
                        <form action="{{route('riwayats.store')}}" method="POST"  class="forms-sample">
                          @csrf
                          <div class="form-group">
                            <label for="id_pemohon">Nama Pemohon</label>
                                  <select class="form-control" name="id_pemohon"
                              id="id_pemohon">
                             
                              @foreach($pemohons as $p)
                              <option value="{{ $p->id }}">{{ $p->nama }}</option>
                              @endforeach
                          </select>
                          </div>
                          
                          <div class="form-group">
                            <label for="tanggal_pengajuan">Tanggal Pengajuan</label>
                            <input type="date" name="tanggal_pengajuan" id="tanggal_pengajuan" class="form-control">
                        
                          </div>
                          <div class="form-group">
                            <label for="status_pengajuan">Status Pengajuan</label>
                                    <select class="form-control"
                                name="status_pengajuan" id="status_pengajuan">
                                @foreach (['Sudah Diverifikasi', 'Belum Diproses'] as $status)
                                <option value="{{ $status }}" {{ old('status_pengajuan') == $status ? 'selected' : '' }}>
                                    {{ $status }}</option>
                                @endforeach
                            </select>
                          </div>
                      
                          <button type="submit" class="btn btn-primary mr-2">Submit</button>
                          <a href="/riwayats"  class="btn btn-light">Cancel</a>
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

  @stack('custom-scripts')
</body>
</html>