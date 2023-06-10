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
                            <h4 class="card-title">Data Alternatif</h4>
                           
                            <form action="{{route('alternatives.update', $alternative->id)}}" method="POST">
                              @csrf
                              @method('PUT')
                              <div class="form-group">
                                  <label for="name">Name :</label>
                                  <div class="input-group">
                                      <input id="name" type="text" class="form-control" placeholder="e.g. Speed"
                                          name="name" value="{{ $alternative->name }}" disabled>
                                  </div>
                              </div>
                              @foreach ($criteriaweights as $key => $cw)
                              <div class="form-group">
                                  <label for="criteria[{{$cw->id}}]">{{$cw->name}} :</label>
                                  <select class="form-control" id="criteria[{{$cw->id}}]"
                                      name="criteria[{{$cw->id}}]">
                                      <!--
                                      @php
                                          $res = $criteriaratings->where('criteria_id', $cw->id)->all();
                                      @endphp
                                      -->
                                      @foreach ($res as $cr)
                                      <option value="{{$cr->id}}"
                                          {{ $cr->id == $alternativescores[$key]->rating_id ? "selected=selected" : "" }}>
                                          {{$cr->description}}</option>
                                      @endforeach
                                  </select>
                              </div>
                              @endforeach
                              <button type="submit" class="btn btn-primary">Submit</button>
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