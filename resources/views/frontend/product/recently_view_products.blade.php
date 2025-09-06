<section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">Produk Baru Saja Dilihat</h3>
                    <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
                        @forelse ($recentlyViewedProducts->unique('product_id') as $product)
                            <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image">
                                                <a
                                                    href="{{ url('product/details/'.$product->id.'/'.$product->product_slug ) }}"><img
                                                        src="{{ asset($product->product_thambnail) }}" alt=""></a>
                                            </div><!-- /.image -->
                                        </div><!-- /.product-image -->
                                        <div class="product-info text-left">
                                            <h3 class="name">
                                                <a
                                                    href="{{ url('product/details/'.$product->id.'/'.$product->product_slug ) }}">
                                                    {{ $product->product_name }}
                                                </a>
                                            </h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>

                                            @if ($product->product_discount == NULL)
                                            <div class="product-price">
                                                <span
                                                    class="price">Rp{{ number_format($product->product_price, 0, '', '.') }}</span>
                                            </div><!-- /.product-price -->
                                            @else
                                            <div class="product-price">
                                                <span class="price">
                                                    Rp{{ number_format($product->product_discount, 0, '', '.') }} </span>
                                                <span
                                                    class="price-before-discount">Rp{{ number_format($product->product_price, 0, '', '.') }}</span>
                                            </div><!-- /.product-price -->
                                            @endif
                                        </div><!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon" data-toggle="dropdown"
                                                            type="button">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </button>
                                                        <button class="btn btn-primary cart-btn"
                                                            type="button">Keranjang</button>

                                                    </li>

                                                    <li class="lnk wishlist">
                                                        <a class="add-to-cart" href="{{ route('wishlist') }}"
                                                            title="Wishlist">
                                                            <i class="icon fa fa-heart"></i>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div><!-- /.action -->
                                        </div><!-- /.cart -->
                                    </div><!-- /.product -->
                                </div><!-- /.products -->
                            </div><!-- /.item -->
                        @empty
                        <h5 class="text-danger">Produk Tidak Ditemukan</h5>
                        @endforelse
                    </div><!-- /.home-owl-carousel -->
                </section>