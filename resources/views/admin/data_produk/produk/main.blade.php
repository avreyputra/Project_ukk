@extends('admin.layout.app')

@section('isi')

  <section class="section">
    <div class="card">
      <div class="card-header">{{$judul}} Datatable</div>
      <div class="card-body">
        <a href="{{route('ProdukCreate')}}" class="btn btn-primary rounded-pill">Tambah Data</a>
        <br>
        <br>
        <table class="table" id="table1">
          <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Nama Kategori Produk</th>
                <th>Slug Produk</th>
                <th>Harga Produk</th>
                <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($produk as $key => $p)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$p->nama_produk}}</td>
                    <td>{{$p->kategori_produk->nama_kategori_produk}}</td>
                    <td>{{$p->slug_produk}}</td>
                    <td>{{$p->harga_produk}}</td>
                    <td>
                        <a href="{{route('ProdukEdit', $p->id_produk)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                        <a href="{{route('ProdukShow', $p->id_produk)}}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                        <a href="{{route('ProdukDelete', $p->id_produk)}}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Ingin Menghapus Data?')">
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
