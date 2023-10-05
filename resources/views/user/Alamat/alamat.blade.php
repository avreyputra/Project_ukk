@extends('user.layout.app')

@section('konten')
<main class="main">
    <div class="container">
        <div class="page-header text-center" style="background-image: url('template-user/assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Tambah {{$judul}}<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
    </div><!-- End .container -->

    <div class="container">
        <div class="page-content">
            <div class="dashboard">
                <div class="container-fluid">
                    <div class="row justify-content-center mt-2">
                        <div class="col-md-12">
                            <div class="tab-content">
                                <form action="{{route('simpanAlamat')}}" method="POST">
                                    @csrf
                                    <label>Provinsi</label>
                                    <select name="provinsi" id="provinsi" class="form-control" onchange="getKabupaten()">
                                        <option value="">Pilih Provinsi</option>
                                        @foreach ($provinsi as $key => $prov)
                                            <option value="{{$prov->id_provinsi}}">{{$prov->nama_provinsi}}</option>
                                        @endforeach
                                    </select>

                                    <label>Kabupaten / Kota</label>
                                    <select name="kabupaten" id="kabupaten" class="form-control">
                                        <option value="">Pilih Kabupaten Atau Kota</option>
                                    </select>

                                    <label>Kode Pos</label>
                                    <input type="text" name="kode_pos" class="form-control">

                                    <label>Alamat Lengkap</label>
                                    <textarea name="alamat_lengkap" class="form-control mb-2" id="alamat" cols="30" rows="3"></textarea>

                                    <button class="btn btn-primary rounded-pill">
                                        <span>Simpan</span>
                                    </button>
                                </form>
                            </div>
                        </div><!-- End .col-lg-6 -->
                    </div><!-- End .row -->
                </div><!-- End .container-fluid -->
            </div><!-- End .dashboard -->
        </div><!-- End .page-content -->
    </div><!-- End .container -->
</main><!-- End .main -->
@endsection

@section('script')
    <script>
        function getKabupaten() {
            var id_provinsi = $('#provinsi').val();
            if (id_provinsi) {
                $.post("{{route('GetKabupaten')}}", {id_provinsi:id_provinsi}).done((data) => {
                    if (data.status == 'success') {
                        var html = '<option value="">Pilih Kabupaten Atau Kota</option>';
                        data.data.forEach((v,i) => {
                            html += `<option value="${v.id_kabupaten}">${v.nama_kabupaten}</option>`
                        })

                        $('#kabupaten').html(html)
                    } else {
                        toastr.error(`${data.message}`)
                    }
                })
            } else {
                toastr.error(`Provinsi Tidak Boleh Kosong`)
            }
        }
    </script>
@endsection
