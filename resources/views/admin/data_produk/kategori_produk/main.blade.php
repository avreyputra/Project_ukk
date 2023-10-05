@extends('admin.layout.app')

@section('isi')

  <section class="section">
    <div class="card">
      <div class="card-header">{{$judul}} Datatable</div>
      <div class="card-body">
        <a href="{{route('kategoriProdukCreate')}}" class="btn btn-primary rounded-pill">Tambah Data</a>
        <br>
        <br>
        <table class="table tabel-data-kategori" id="table1">
          <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori Produk</th>
                <th>Slug</th>
                <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($kategori_produk as $key => $kp)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$kp->nama_kategori_produk}}</td>
                    <td>{{$kp->slug_kategori_produk}}</td>
                    <td>
                        <a href="{{route('kategoriProdukDelete', $kp->id_kategori_produk)}}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Ingin Menghapus Data ini?')">
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

