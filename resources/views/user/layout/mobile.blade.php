<div class="mobile-menu-wrapper">
    <span class="mobile-menu-close"><i class="icon-close"></i></span>

    <form action="#" method="get" class="mobile-search">
        <label for="mobile-search" class="sr-only">Search</label>
        <input type="search" class="form-control" name="mobile-search" id="mobile-search" placeholder="Search in..." required>
        <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
    </form>

    <nav class="mobile-nav">
        <ul class="mobile-menu">
            <li class="{{($menu == 'dashboard') ? 'active' : ''}}">
                <a href="{{route('userDashboard')}}">Home</a>

                {{-- <ul>
                    <li><a href="index-1.html">01 - furniture store</a></li>
                    <li><a href="index-2.html">02 - furniture store</a></li>
                    <li><a href="index-3.html">03 - electronic store</a></li>
                    <li><a href="index-4.html">04 - electronic store</a></li>
                    <li><a href="index-5.html">05 - fashion store</a></li>
                    <li><a href="index-6.html">06 - fashion store</a></li>
                    <li><a href="index-7.html">07 - fashion store</a></li>
                    <li><a href="index-8.html">08 - fashion store</a></li>
                    <li><a href="index-9.html">09 - fashion store</a></li>
                    <li><a href="index-10.html">10 - shoes store</a></li>
                    <li><a href="index-11.html">11 - furniture simple store</a></li>
                    <li><a href="index-12.html">12 - fashion simple store</a></li>
                    <li><a href="index-13.html">13 - market</a></li>
                    <li><a href="index-14.html">14 - market fullwidth</a></li>
                    <li><a href="index-15.html">15 - lookbook 1</a></li>
                    <li><a href="index-16.html">16 - lookbook 2</a></li>
                    <li><a href="index-17.html">17 - fashion store</a></li>
                    <li><a href="index-18.html">18 - fashion store (with sidebar)</a></li>
                    <li><a href="index-19.html">19 - games store</a></li>
                    <li><a href="index-20.html">20 - book store</a></li>
                    <li><a href="index-21.html">21 - sport store</a></li>
                    <li><a href="index-22.html">22 - tools store</a></li>
                    <li><a href="index-23.html">23 - fashion left navigation store</a></li>
                    <li><a href="index-24.html">24 - extreme sport store</a></li>
                </ul> --}}
            </li>
            <li>
                <a href="category.html">Product</a>
                {{-- <ul>
                    <li><a href="category-list.html">Shop List</a></li>
                    <li><a href="category-2cols.html">Shop Grid 2 Columns</a></li>
                    <li><a href="category.html">Shop Grid 3 Columns</a></li>
                    <li><a href="category-4cols.html">Shop Grid 4 Columns</a></li>
                    <li><a href="category-boxed.html"><span>Shop Boxed No Sidebar<span class="tip tip-hot">Hot</span></span></a></li>
                    <li><a href="category-fullwidth.html">Shop Fullwidth No Sidebar</a></li>
                    <li><a href="product-category-boxed.html">Product Category Boxed</a></li>
                    <li><a href="product-category-fullwidth.html"><span>Product Category Fullwidth<span class="tip tip-new">New</span></span></a></li>
                    <li><a href="cart.html">Cart</a></li>
                    <li><a href="checkout.html">Checkout</a></li>
                    <li><a href="wishlist.html">Wishlist</a></li>
                    <li><a href="#">Lookbook</a></li>
                </ul> --}}
            </li>
            <li>
                <a href="product.html" class="#">About Us</a>
                {{-- <ul>
                    <li><a href="product.html">Default</a></li>
                    <li><a href="product-centered.html">Centered</a></li>
                    <li><a href="product-extended.html"><span>Extended Info<span class="tip tip-new">New</span></span></a></li>
                    <li><a href="product-gallery.html">Gallery</a></li>
                    <li><a href="product-sticky.html">Sticky Info</a></li>
                    <li><a href="product-sidebar.html">Boxed With Sidebar</a></li>
                    <li><a href="product-fullwidth.html">Full Width</a></li>
                    <li><a href="product-masonry.html">Masonry Sticky Info</a></li>
                </ul> --}}
            </li>
            <li>
                <a href="#">Contact Us</a>
                {{-- <ul>
                    <li>
                        <a href="about.html">About</a>

                        <ul>
                            <li><a href="about.html">About 01</a></li>
                            <li><a href="about-2.html">About 02</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="contact.html">Contact</a>

                        <ul>
                            <li><a href="contact.html">Contact 01</a></li>
                            <li><a href="contact-2.html">Contact 02</a></li>
                        </ul>
                    </li>
                    <li><a href="login.html">Login</a></li>
                    <li><a href="faq.html">FAQs</a></li>
                    <li><a href="404.html">Error 404</a></li>
                    <li><a href="coming-soon.html">Coming Soon</a></li>
                </ul> --}}
            </li>
            @auth
            <li class="{{($menu == 'alamat') ? 'active' : ''}}">
                <a href="{{route('myAccount')}}">My Profile</a>
            </li>
            @else
            <li>
                <a href="{{route('login')}}">Login</a>
            </li>
            @endauth
        </ul>
    </nav><!-- End .mobile-nav -->

    <div class="social-icons">
        <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
        <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
        <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
        <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
    </div><!-- End .social-icons -->
</div>
