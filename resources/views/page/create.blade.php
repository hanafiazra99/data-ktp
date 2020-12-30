@extends('layout.master',['title'=>'Tambah Data'])
@section('content')

    <form method="POST" action="{{ route('ktp.store') }}">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputPassword1">Provinsi</label>
          <select name="provinsi" id='provinsi' class="form-control" >

          </select>
          @error('provinsi')
                <span class="invalid-feedback">
                        {{ $message }}
                 </span>
            @enderror
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Kota</label>
          <select name="kota" id='kota' class="form-control kota" >

          </select>
          @error('kota')
                <span class="invalid-feedback">
                        {{ $message }}
                 </span>
            @enderror
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Nik</label>
          <input type="text" class="form-control" name="nik"  >
          @error('nik')
                <span class="invalid-feedback">
                        {{ $message }}
                 </span>
            @enderror
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Nama</label>
          <input type="text" class="form-control" name="nama" >
          @error('nama')
                <span class="invalid-feedback">
                        {{ $message }}
                 </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Tempat Lahir</label>
            <input type="text" class="form-control"  name="tempat_lahir">
            @error('tempat_lahir')
                <span class="invalid-feedback">
                        {{ $message }}
                 </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Tanggal Lahir</label>
            <input type="date" class="form-control" name="tanggal_lahir" >
            @error('tanggal_lahir')
                <span class="invalid-feedback">
                        {{ $message }}
                 </span>
            @enderror
        </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" >
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
            </select>
            @error('jenis_kelamin')
                <span class="invalid-feedback">
                        {{ $message }}
                 </span>
            @enderror
          </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Alamat</label>
            <input type="text" class="form-control"  name="alamat">
            @error('alamat')
                <span class="invalid-feedback">
                        {{ $message }}
                 </span>
            @enderror
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Pekerjaan</label>
          <input type="text" class="form-control"  name="pekerjaan">
          @error('pekerjaan')
                <span class="invalid-feedback">
                        {{ $message }}
                 </span>
            @enderror
      </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Agama</label>
            <select name="agama" class="form-control">
                <option value="Islam">Islam</option>
                <option value="Kristen Protestan">Kristen Protestan</option>
                <option value="Kristen Katolik">Kristen Katolik</option>
                <option value="Budha">Budha</option>
                <option value="Hindu">Hindu</option>
            </select>
            @error('agama')
                <span class="invalid-feedback">
                        {{ $message }}
                 </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Status Perkawinan</label>
            <select name="status_perkawinan" class="form-control" >
                <option value="Sudah Menikah">Sudah Menikah</option>
                <option value="Belum Menikah">Belum Menikah</option>
                <option value="Janda">Janda</option>
                <option value="Duda">Duda</option>
            </select>
            @error('status_perkawinan')
                <span class="invalid-feedback">
                        {{ $message }}
                 </span>
            @enderror
          </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>

@endsection

@section('script')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
    $.get('http://dev.farizdotid.com/api/daerahindonesia/provinsi',function (data){
        $.each(data.provinsi, function(index, provinsi){
            $('#provinsi').append('<option value="'+ provinsi.id +'">'+ provinsi.nama +'</option>');
        })
    });
    $('body').on('change','#provinsi',function(event){
        event.preventDefault();
        var prov = $('#provinsi').val();
        $('#kota').empty();
        console.log(prov);
        $.get('http://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi='+prov,function (data){
            $.each(data.kota_kabupaten, function(index, kota){
                $('#kota').append('<option value="'+ kota.id +'">'+ kota.nama +'</option>');
            })
        });
    })
})
</script>

@endsection
