@extends('admin.layout.app')

@section('isi')

  <section class="section">
    <div class="card">
      <div class="card-header">{{$judul}} Datatable</div>
      <div class="card-body">
        <table class="table" id="table1">
          <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Email</th>
                <th>No Telephone</th>
                <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $key => $us)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$us->nama_lengkap}}</td>
                    <td>{{$us->username}}</td>
                    <td>{{$us->email}}</td>
                    <td>{{$us->no_telp}}</td>
                    <td>
                      <a href="{{route('usersDelete', $us->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Ingin Menghapus Data ini?')">
                        <i class="fa fa-trash"></i>
                      </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
      </div>
    </div>
  </section>

@endsection
