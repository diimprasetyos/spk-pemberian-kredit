<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tabel Data Pemohon</h4>
        <p class="card-description">
          Tabel Data Pemohon 
        </p>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Nama Pemohon</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>City</th>
                <th>Status</th>
              </tr>
            </thead>
            @foreach ($pemohons as $pemohon )
            <tbody>
              <tr>
                <td>{{$pemohon->nama}}</td>
                <td>{{$pemohon->email}}</td>
                <td>{{$pemohon->no_hp}}</td>
                <td>{{$pemohon->jenis_kelamin}}</td>
                <td>{{$pemohon->city}}</td>
                <td>
                  <form action="{{ route('pemohons.destroy', $pemohon->id)}}" method="POST">
                    @csrf
                  <a class="btn btn-info" href="{{route('pemohons.edit', $pemohon->id)}}">Edit</a>
                 
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger" href="/editpemohon">Delete</button>   
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
