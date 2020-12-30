@extends('layout.master',['title'=>'Halaman Utama'])
@section('content')

<table class="table table-hover text-nowrap">
    @if(Auth::user()->role == 'user')<a href="{{ route('ktp.create') }}" class="btn btn-primary btn-xs">Tambah Data</a>@endif
    <thead>
      <tr>
        <th>NIK</th>
        <th>Nama</th>
        <th>Provinsi</th>
        <th>Kota</th>
        <th>Tempat,Tanggal Lahir</th>
        <th>Jenis Kelamin</th>
        <th>Alamat</th>
        <th>Agama</th>
        <th>Status</th>
        @if(Auth::user()->role == 'user')
        <th>Aksi</th>
        @endif
      </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <td>{{ $item->nik }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $data = \Illuminate\Support\Facades\Http::get('http://dev.farizdotid.com/api/daerahindonesia/provinsi/'.$item->provinsi)->json()['nama'] }}</td>
            <td>{{ $data = \Illuminate\Support\Facades\Http::get('http://dev.farizdotid.com/api/daerahindonesia/kota/'.$item->kota)->json()['nama'] }}</td>
            <td>{{ $item->tempat_lahir }},{{ $item->tanggal_lahir }}</td>
            <td>{{ $item->jenis_kelamin }}</td>
            <td>{{ $item->alamat }}</td>
            <td>{{ $item->agama }}</td>
            <td>{{ $item->status_perkawinan }}</td>
            @if(Auth::user()->role == 'user')
            <td><a class='btn btn-primary btn-xs' href="{{ route('ktp.edit',$item) }}">Edit</a>&nbsp;
                <form method="POST" action="{{ route('ktp.delete',$item) }}">
                    @method('delete')
                    @csrf
                    <input type="submit" class='btn btn-danger btn-xs'value="delete">
                </form>
            @endif
        </tr>
        @endforeach

    </tbody>
  </table>
@endsection


