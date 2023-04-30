        <form action="{{route('pemohons.store')}}" method="POST"  class="forms-sample">
          @csrf
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Name">
            @error('name')
              <div class="alert alert-danger">{{ $message }}</div>   
            @enderror
          </div>
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            @error('email')
              <div class="alert alert-danger">{{ $message }}</div>
              
            @enderror
          </div>
          <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="62 xxxx xxxx">
            @error('phone')
              <div class="alert alert-danger">{{ $message }}</div>
              
            @enderror
          </div>
          <div class="form-group">
            <label for="gender">Gender</label>
              <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
              @error('jenis_kelamnin')
                <div class="alert alert-danger">{{ $message }}</div>
                
              @enderror
            </div>
          <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Location">
            @error('city')
              <div class="alert alert-danger">{{ $message }}</div>
              
            @enderror
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <a href="/pemohon"  class="btn btn-light">Cancel</a>
        </form>