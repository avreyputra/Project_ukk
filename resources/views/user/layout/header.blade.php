<header class="header header-8">
    {{-- <div class="header-top">
        <div class="container">

            <div class="header-right">
                <ul class="top-menu">
                    <li>
                        <a href="#">Links</a>
                        <ul>
                            <li><a href="tel:#"><i class="icon-phone"></i>Call: +0123 456 789</a></li>
                            @auth
                                <li><a href="{{route('logout')}}">Logout</a></li>
                            @else
                                <li><a href="{{route('login')}}"><i class="icon-user"></i>Login</a></li>
                            @endauth
                        </ul>
                    </li>
                </ul><!-- End .top-menu -->
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-top --> --}}

    <div class="header-middle sticky-header">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>

                <a href="{{route('userDashboard')}}" class="logo">
                    <img src="{{asset ('template-user/assets/images/demos/demo-10/Xeno.png')}}" alt="Molla Logo" width="80" height="25">
                </a>

            </div><!-- End .header-left -->

            <div class="header-right">
                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li class="megamenu-container {{($menu == 'dashboard') ? 'active' : ''}}">
                            <a href="{{route ('userDashboard')}}" class="#">Home</a>
                        </li>
                        <li class="megamenu-container {{($menu == 'produk') ? 'active' : ''}}">
                            <a href="{{route('userProduk')}}" class="#">Produk</a>
                        </li>
                        <li>
                            <a href="blog.html" class="#">Contact Us</a>
                        </li>
                        @auth
                        <li class="megamenu-container {{($menu == 'alamat') ? 'active' : ''}}">
                            <a href="{{route ('myAccount')}}" class="#">My Profile</a>
                        </li>
                        @else
                        <li>
                            <a href="{{route('login')}}" class="#">Login</a>
                        </li>
                        @endauth
                    </ul><!-- End .menu -->
                </nav><!-- End .main-nav -->
                {{-- <div class="header-search">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                    <form action="#" method="get">
                        <div class="header-search-wrapper">
                            <label for="q" class="sr-only">Search</label>
                            <input type="search" class="form-control" name="q" id="q" placeholder="Search in..." required>
                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div><!-- End .header-search --> --}}

                @if (Auth::check())
                    @php
                        $get_keranjang = DB::table('keranjang as k')
                                        ->where('user_id', Auth::id())
                                        ->join('produk as p', 'p.id_produk', 'k.produk_id')
                                        ->get();
                    @endphp

                    <div class="dropdown cart-dropdown">
                        <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                            <i class="icon-shopping-cart"></i>
                            <span class="cart-count">{{count($get_keranjang)}}</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-cart-products">
                                @if (count($get_keranjang) > 0)
                                    @foreach ($get_keranjang as $gk)
                                        <div class="product">
                                            <div class="product-cart-details">
                                                <h4 class="product-title">
                                                    <a href="product.html">{{$gk->nama_produk}}</a>
                                                </h4>

                                                <span class="cart-product-info">
                                                    <div>
                                                        <span class="cart-product-qty">{{$gk->qty}}</span>
                                                        x Rp. {{$gk->harga_produk}}
                                                    </div>
                                                    <div>
                                                        <span>Ukuran: {{$gk->ukuran_sandal}}</span>
                                                    </div>
                                                </span>
                                            </div><!-- End .product-cart-details -->

                                            <figure class="product-image-container">
                                                <a href="product.html" class="product-image">
                                                    <img src="{{asset ('template/assets/images/produk/' . $gk->foto_produk)}}" alt="product">
                                                </a>
                                            </figure>
                                            <form action="{{route('removeCart')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$gk->produk_id}}">
                                                <button type="submit" class="btn-remove pb-6 mb-4" title="Remove Product"><i class="icon-close"></i></button>
                                            </form>
                                        </div><!-- End .product -->
                                    @endforeach
                                    <form action="{{route('userCheckout')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$keranjang->id_keranjang}}">
                                        <button type="submit" class="btn btn-primary mt-1">
                                            Checkout
                                        </button>
                                    </form>
                                @else
                                    <div>Tidak Ada Produk</div>
                                @endif
                            </div><!-- End .cart-product -->
                        </div><!-- End .dropdown-menu -->
                    </div><!-- End .cart-dropdown -->
                @endif
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-middle -->
</header>
