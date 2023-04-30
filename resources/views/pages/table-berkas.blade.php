<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tabel Data Kriteria</h4>
        <p class="card-description">
          Tabel Data Kriteria 
        </p>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>NIK</th>
                <th>File KTP</th>
                <th>File Slip Gaji</th>
              </tr>
            </thead>
            @foreach ($berkas as $berkas )
            <tbody>
              <tr>
                <td>{{$berkas->nik}}</td>
                <td>{{$berkas->ktp}}</td>
                <td>{{$berkas->slip_gaji}}</td>
                <td>
                    <form action="{{ route('berkas.destroy', $berkas->id)}}" method="POST">
                        @csrf
                      <a class="btn btn-info" href="{{route('berkas.edit', $berkas->id)}}">Edit</a>
                     
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Delete</button>   
                      </form>     
                </td>
              </tr>
            </tbody>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>