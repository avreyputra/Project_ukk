@extends('admin.layout.app')

@section('isi')

<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="d-flex justify-content-center">
            <div class="col-md-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit {{$judul}}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                        <form class="form form-vertical" method="POST" action="{{route('ProdukUpdate', $produk->id_produk)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="nama-produk-vertical">
                                            Nama Produk
                                        </label>
                                        <input
                                        type="text"
                                        id="first-name-vertical"
                                        class="form-control"
                                        name="nama_produk"
                                        value="{{(old('nama_produk')) ? old('nama_produk') : $produk->nama_produk}}"
                                        placeholder="Nama Produk"
                                        />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <fieldset class="form-group">
                                        <label for="kategori-produk-vertical">
                                            Kategori Produk
                                        </label>
                                        <select class="form-select" id="basicSelect" name="id_kategori_produk">
                                            @foreach ($kategori_produk as $kp)
                                                <option value="{{$kp->id_kategori_produk}}" {{($kp->id_kategori_produk == $produk->kategori_produk_id) ? 'selected' : ''}}>{{$kp->nama_kategori_produk}}</option>
                                            @endforeach
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="stok-produk-vertical">
                                            Stok Sandal
                                        </label>
                                        <input
                                        type="number"
                                        id="contact-info-vertical"
                                        class="form-control"
                                        name="stok_produk"
                                        placeholder="Stok Sandal"
                                        value="{{(old('stok_produk')) ? old('stok_produk') : $produk->stok_produk}}"
                                        min="0"
                                        />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="stok-produk-vertical">
                                            Ukuran Sandal
                                        </label>
                                        <input
                                        type="number"
                                        id="contact-info-vertical"
                                        class="form-control"
                                        name="ukuran_sandal"
                                        placeholder="Ukuran Sandal"
                                        value="{{(old('ukuran_sandal')) ? old('ukuran_sandal') : $produk->ukuran_sandal}}"
                                        min="0"
                                        />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="harga-produk-vertical">
                                            Harga Sandal
                                        </label>
                                        <input
                                        type="number"
                                        id="harga-vertical"
                                        class="form-control"
                                        name="harga_produk"
                                        placeholder="Harga Sandal"
                                        value="{{(old('harga_produk')) ? old('harga_produk') : $produk->harga_produk}}"
                                        min="0"
                                        />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label
                                            for="formFile"
                                            class="form-label">
                                            Pilih Foto Produk <sup class="text-danger">(kosongi foto produk bila tidak ada perubahan)</sup>
                                        </label>
                                        <input
                                        class="form-control"
                                        type="file"
                                        id="formFile"
                                        name="foto_produk"
                                        />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="card">
                                            <div class="card-body">
                                                <img src="{{asset('template/assets/images/produk')}}/{{$produk->foto_produk}}" width="200" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label
                                            for="exampleFormControlTextarea1"
                                            class="form-label">
                                            Deskripsi Produk
                                        </label>
                                        <textarea
                                            class="form-control"
                                            id="exampleFormControlTextarea1"
                                            rows="4"
                                            cols="40"
                                            name="deskripsi_produk"
                                            >{{(old('deskripsi_produk')) ? old('deskripsi_produk') : $produk->deskripsi_produk}}</textarea>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                <button
                                    type="submit"
                                    class="btn btn-primary me-1 mb-1">
                                    Submit
                                </button>
                                <a
                                class="btn btn-warning me-1 mb-1"
                                href="{{route('Produk')}}">
                                    Kembali
                                </a>
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
