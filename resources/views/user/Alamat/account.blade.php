@extends('user.layout.app')

@section('konten')
<main class="main">
    <div class="container">
        <div class="page-header text-center" style="background-image: url('template-user/assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">My Profile<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
    </div><!-- End .container -->

    <div class="container">
        <div class="page-content">
            <div class="dashboard">
                <div class="container-fluid">
                    <div class="row mt-3">
                        <div class="col-lg-6">
                            <div class="tab-content">
                                <form action="#">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" value="{{Auth::user()->nama_lengkap}}" disabled>

                                    <label>Username</label>
                                    <input type="text" class="form-control" value="{{Auth::user()->username}}" disabled>

                                    <label>Email</label>
                                    <input type="email" class="form-control" value="{{Auth::user()->email}}" disabled>

                                    <label>No Telephone</label>
                                    <input type="text" class="form-control mb-2" value="{{Auth::user()->no_telp}}" disabled>

                                    <a class="btn btn-outline-primary-2" onclick="logout()">
                                        <span>Logout</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </a>
                                </form>
                            </div>
                        </div><!-- End .col-lg-6 -->

                        <div class="col-lg-6">
                            <div class="card card-dashboard">
                                <div class="card-body">
                                    <h3 class="card-title">Alamat</h3><!-- End .card-title -->

                                    @if ($akun_login_id == "ada")
                                    <label>Provinsi</label>
                                    <input type="text" class="form-control" value="{{$provinsi->nama_provinsi}}" disabled>

                                    <label>Kabupaten</label>
                                    <input type="text" class="form-control" value="{{$kabupaten->nama_kabupaten}}" disabled>

                                    <label>Kode Pos</label>
                                    <input type="text" class="form-control" value="{{$alamat->kode_pos}}" disabled>

                                    <label>Alamat Lengkap</label>
                                    <textarea name="" id="" class="form-control mb-2" cols="30" rows="3" disabled>{{$alamat->alamat_lengkap}}</textarea>

                                    <a class="btn btn-outline-primary-2" href="{{route('alamatEdit', $alamat->id_alamat)}}">
                                        <span>Edit</span>
                                        <i class="icon-edit"></i>
                                    </a>
                                    @else
                                    <a class="btn btn-outline-primary-2" href="{{route('tambahAlamat')}}">
                                        <span>Tambah</span>
                                        <i class="icon-edit"></i>
                                    </a>
                                    @endif
                                </div><!-- End .card-body -->
                            </div><!-- End .card-dashboard -->
                        </div><!-- End .col-lg-6 -->
                    </div><!-- End .row -->
                </div><!-- End .container-fluid -->
            </div><!-- End .dashboard -->
        </div><!-- End .page-content -->
    </div><!-- End .container -->
</main><!-- End .main -->
@endsection
