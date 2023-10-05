@extends('user.layout.app')

@section('konten')
<main class="main">
    <div class="page-header text-center" style="background-image: url('template-user/assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Product<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->

    <div class="page-content mt-2">
        <div class="container">
            <div class="products">
                <div class="row">
                    @foreach ($produk as $p)
                        <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                            <div class="product product-3 text-center">
                                <figure class="product-media">
                                    <a href="{{route('ProductUser', $p->id_produk)}}">
                                        <img src="{{asset ('template/assets/images/produk/' . $p->foto_produk)}}" alt="Product image" class="product-image">
                                    </a>
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#">{{$p->kategori_produk->nama_kategori_produk}}</a>,
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="{{route('ProductUser', $p->id_produk)}}">{{$p->nama_produk}}</a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                        Rp. {{$p->harga_produk}}
                                    </div><!-- End .product-price -->
                                    <div class="row justify-content-center">
                                        <div>
                                            Ukuran: {{$p->ukuran_sandal}}
                                        </div>

                                        <div class="ml-3">
                                            Stok: {{$p->stok_produk}}
                                        </div>
                                    </div>
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        </div><!-- End .col-sm-6 col-lg-4 col-xl-3 -->
                    @endforeach
                </div><!-- End .row -->
            </div><!-- End .products -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
@endsection
