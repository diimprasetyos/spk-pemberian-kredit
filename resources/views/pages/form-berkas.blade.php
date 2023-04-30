        <form action="{{ route('berkas.store')}}" method="POST" class="forms-sample">
          @csrf
          <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK">
            @error('nik')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label>Upload KTP</label>
            <input type="file" name="img[ktp]" id="ktp" class="file-upload-default">
            @error('img.ktp')
            <div class="alert alert-danger">{{ $message }}</div>
              
            @enderror
            <div class="input-group col-xs-12">
              <input type="file" class="form-control file-upload-info"  placeholder="Upload Image">
            </div>
          </div>
          <div class="form-group">
            <label>Upload Slip Gaji</label>
            <input type="file" name="img[slip_gaji]" id="slip_gaji" class="file-upload-default">
            @error('img.slip_gaji')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="input-group col-xs-12">
              <input type="file" class="form-control file-upload-info"  placeholder="Upload Image">
            </div>
          </div>
          <button type="submit" class="btn btn-primary mr-2">Submit</button>
          <button class="btn btn-light">Cancel</button>
        </form>