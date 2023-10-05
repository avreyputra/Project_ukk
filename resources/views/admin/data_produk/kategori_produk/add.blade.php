@extends('admin.layout.app')

@section('isi')
<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="d-flex justify-content-center">
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah {{$judul}}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" method="POST" action="{{route('kategoriProdukStore')}}">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">
                                                    Nama Kategori
                                                </label>
                                                <input
                                                type="text"
                                                id="first-name-vertical"
                                                class="form-control"
                                                value="{{old('nama_kategori_produk')}}"
                                                name="nama_kategori_produk"
                                                placeholder="Nama Kategori"
                                                />
                                            </div>
                                            <div class="col-12 d-flex justify-content-end">
                                                <button
                                                    type="submit"
                                                    class="btn btn-primary me-1 mb-1">
                                                    Submit
                                                </button>
                                                <a
                                                    class="btn btn-warning me-1 mb-1"
                                                    href="{{route('kategoriProduk')}}">
                                                    Kembali
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
@endsection
