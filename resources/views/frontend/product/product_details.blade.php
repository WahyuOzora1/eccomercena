@extends('frontend.main_master')
@section('content')

@section('title')
{{ $product->product_name }} Detail Produk
@endsection

<style>
.checked {
    color: orange;
}
</style>

<!-- ===== ======== HEADER : END ============================================== -->
<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ url('/') }}">Beranda</a></li>
                <li class='active'>Detail Produk</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
    <div class='container'>
        <div class='row single-product'>
            <div class='col-md-12'>
                <div class="detail-block">
                    <div class="row wow fadeInUp">
                        <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                            <div class="product-item-holder size-big single-product-gallery small-gallery">

                                <div id="owl-single-product">
                                    @foreach($multiImag as $img)
                                    <div class="single-product-gallery-item" id="slide{{ $img->id }}">
                                        <a data-lightbox="image-1" data-title="Gallery"
                                            href="{{ asset($img->photo_name ) }} ">
                                            <img class="img-responsive" alt="" src="{{ asset($img->photo_name ) }} "
                                                data-echo="{{ asset($img->photo_name ) }} " />
                                        </a>
                                    </div><!-- /.single-product-gallery-item -->
                                    @endforeach
                                </div><!-- /.single-product-slider -->

                                <div class="single-product-gallery-thumbs gallery-thumbs">

                                    <div id="owl-single-product-thumbnails">
                                        @foreach($multiImag as $img)
                                        <div class="item">
                                            <a class="horizontal-thumb active" data-target="#owl-single-product"
                                                data-slide="1" href="#slide{{ $img->id }}">
                                                <img class="img-responsive" width="85" alt=""
                                                    src="{{ asset($img->photo_name ) }} "
                                                    data-echo="{{ asset($img->photo_name ) }} " />
                                            </a>
                                        </div>
                                        @endforeach
                                    </div><!-- /#owl-single-product-thumbnails -->
                                </div><!-- /.gallery-thumbs -->

                            </div><!-- /.single-product-gallery -->
                        </div><!-- /.gallery-holder -->

                        @php
                        $reviewcount =
                        App\Models\Review::where('product_id',$product->id)->where('status',1)->latest()->get();
                        $avarage =
                        App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');
                        @endphp

                        <div class='col-sm-6 col-md-7 product-info-block'>
                            <div class="product-info">
                                <h1 class="name" id="pname">{{ $product->product_name }}</h1>
                                <div class="rating-reviews m-t-20">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            @if($avarage == 0)
                                            Tidak ada ulasan
                                            @elseif($avarage == 1 || $avarage < 2) <span class="fa fa-star checked">
                                                </span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                @elseif($avarage == 2 || $avarage < 3) <span class="fa fa-star checked">
                                                    </span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    @elseif($avarage == 3 || $avarage < 4) <span
                                                        class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star checked"></span>
                                                        <span class="fa fa-star"></span>
                                                        <span class="fa fa-star"></span>
                                                        @elseif($avarage == 4 || $avarage < 5) <span
                                                            class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star"></span>
                                                            @elseif($avarage == 5 || $avarage < 5) <span
                                                                class="fa fa-star checked"></span>
                                                                <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star checked"></span>
                                                                <span class="fa fa-star checked"></span>
                                                                @endif
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="reviews">
                                                <a href="#" class="lnk">({{ count($reviewcount) }} Reviews)</a>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.rating-reviews -->

                                <div class="stock-container info-container m-t-10">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="stock-box">
                                                <h6>Berat <span id="pweight">{{ $product->product_weight }}</span> gram
                                                </h6>
                                                <h6>Stok {{ $product->product_qty }}</h6>
                                                <h6>Pre Order maksimal {{ $product->pre_order }} hari</h6>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.stock-container -->

                                <div class="description-container m-t-10">
                                    <p style="color: #000">{!! $product->product_short_desc !!}</p>
                                </div><!-- /.description-container -->

                                <div class="price-container info-container m-t-20">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="price-box">
                                                @if ($product->product_discount == NULL)
                                                <span class="price"
                                                    id="setPrice">Rp{{ number_format($product->product_price, 0, '', '.') }}</span>
                                                @else
                                                <span class="price"
                                                    id="setPrice">Rp{{ number_format($product->product_discount, 0, '', '.') }}</span>
                                                <span class="price-strike"
                                                    id="setPrice">Rp{{ number_format($product->product_price, 0, '', '.') }}</span>
                                                @endif


                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="favorite-button m-t-10">
                                                <a href="{{ route('wishlist') }}" class="btn btn-primary"
                                                    data-toggle="tooltip" data-placement="right" title="Wishlist"
                                                    href="#">
                                                    <i class="fa fa-heart"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.price-container -->

                                <!--     /// Add Product Color And Product Size ///// -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="info-title control-label">Pilih Warna <span> </span></label>
                                            <select class="form-control unicase-form-control selectpicker"
                                                style="display: none;" id="color">
                                                <option selected="" disabled="">--Pilih Warna--</option>
                                                @foreach($product_color as $color)
                                                <option value="{{ $color }}">{{ ucwords($color) }}</option>
                                                @endforeach
                                            </select>
                                        </div> <!-- // end form group -->
                                    </div> <!-- // end col 6 -->
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            @if($product->product_size == null)

                                            @else

                                            <label class="info-title control-label">Pilih Ukuran <span> </span></label>
                                            <select class="form-control unicase-form-control selectpicker"
                                                style="display: none;" id="size">
                                                <option selected="" disabled="">--Pilih Ukuran--</option>
                                                @foreach($product_size as $size)
                                                <option value="{{ $size }}">{{ ucwords($size) }}</option>
                                                @endforeach
                                            </select>
                                            @endif

                                        </div> <!-- // end form group -->
                                    </div> <!-- // end col 6 -->
                                    <!-- pilih jenis -->

                                    <script>

                                    function compoPrice() {
                                        // change on input text to send server
                                        var changePrice = document.getElementById("composition").value;
                                        var formattedPrice = 'Rp ' + number_format(changePrice, 0, '', '.');

                                        // Set the value of the input field
                                        document.getElementById("setPrice").value = formattedPrice;

                                        // change on label
                                        var changePrice = document.getElementById("composition").value;
                                        document.getElementById("setPrice").innerHTML = 'Rp ' + number_format(
                                            changePrice, 0, '', '.');
                                    }

                                    function number_format(number, decimals, dec_point, thousands_sep) {
                                        number = parseFloat(number);
                                        if (isNaN(number)) return false;
                                        if (number % 1 !== 0) {
                                            number = number.toFixed(decimals);
                                        }
                                        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, thousands_sep || ',');
                                    }
                                    </script>
                                    
                                    <div class="col-sm-6">
                                        @if($product->pre_order == null)
                                        <div class="form-group">
                                            <label class="info-title control-label">Pilih Jenis <span> </span></label>
                                            <select class="form-control unicase-form-control selectpicker"
                                                style="display: none;" id="composition" onChange="compoPrice()">
                                                <option selected="" disabled="">--Pilih Jenis--</option>
                                                @foreach($compositionProducts as $compo)
                                                <option value="{{ $compo->price }}">{{ strtoupper($compo->name) }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @endif

                                    </div> <!-- // end form group -->
                                </div </div><!-- /.row -->

                                <div class="quantity-container info-container">
                                    <div class="row">

                                        <div class="col-sm-2">
                                            <span class="label">Atur Jumlah :</span>
                                        </div>

                                        <div class="col-sm-2">
                                            <div class="cart-quantity">
                                                <div class="quant-input">
                                                    <div class="arrows">
                                                        <div class="arrow plus gradient"><span class="ir"><i
                                                                    class="icon fa fa-sort-asc"></i></span></div>
                                                        <div class="arrow minus gradient"><span class="ir"><i
                                                                    class="icon fa fa-sort-desc"></i></span></div>
                                                    </div>
                                                    <input type="text" id="qty" value="1" min="1" >
                                                    <input hidden id="stock" type="text"  value="{{$product->product_qty}}" min="1" >
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" id="product_id" value="{{ $product->id }}">
                                       
                                        <div class="col-sm-7">
                                            <button type="submit" id="btnCart" onclick="addToKeranjang('{{csrf_token()}}')" class="btn btn-primary" {{ $product->product_qty < 1 ? 'disabled' : ''}} ><i
                                                    class="fa fa-shopping-cart inner-right-vs"></i> Keranjang</button>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.quantity-container -->
                            </div><!-- /.product-info -->
                        </div><!-- /.col-sm-7 -->
                    </div><!-- /.row -->
                </div>
                <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                    <div class="row">
                        <div class="col-sm-3">
                            <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                <li class="active"><a data-toggle="tab" href="#description">Deskripsi</a></li>
                                <li><a data-toggle="tab" href="#review">Penilaian dan Ulasan</a></li>
                            </ul><!-- /.nav-tabs #product-tabs -->
                        </div>
                        <div class="col-sm-9">
                            <div class="tab-content">
                                <div id="description" class="tab-pane in active">
                                    <div class="product-tab">
                                        <p class="text">{!! $product->product_long_desc !!} </p>
                                    </div>
                                </div><!-- /.tab-pane -->

                                <div id="review" class="tab-pane">
                                    <div class="product-tab">
                                        <div class="product-reviews">
                                            <h4 class="title">Ulasan Pembeli</h4>

                                            @php
                                            $reviews =
                                            App\Models\Review::where('product_id',$product->id)->latest()->limit(5)->get();
                                            @endphp
                                            <div class="reviews">
                                                @foreach($reviews as $item)
                                                @if($item->status == 0)

                                                @else
                                                <div class="review">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <img style="border-radius: 50%"
                                                                src="{{ (!empty($item->user->profile_photo_path))? url('upload/user_images/'.$item->user->profile_photo_path):url('upload/no_image.jpg') }}"
                                                                width="40px;" height="40px;"><b>
                                                                {{ $item->user->name }}</b>

                                                            @if($item->rating == NULL)

                                                            @elseif($item->rating == 1)
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            @elseif($item->rating == 2)
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            @elseif($item->rating == 3)
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            @elseif($item->rating == 4)
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star"></span>
                                                            @elseif($item->rating == 5)
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            @endif
                                                        </div>
                                                        <div class="col-md-6">

                                                        </div>
                                                    </div> <!-- // end row -->
                                                    <div class="review-title">
                                                        <span class="date"><i class="fa fa-calendar"></i>
                                                            <span>
                                                                {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}
                                                            </span>
                                                        </span>
                                                    </div>
                                                    <div class="text">"{{ $item->comment }}"</div>
                                                </div>
                                                @endif
                                                @endforeach
                                            </div><!-- /.reviews -->
                                        </div><!-- /.product-reviews -->

                                        <div class="product-add-review">
                                            <h4 class="title">Beri Penilaian dan Ulasan</h4>
                                            <div class="review-table">

                                            </div><!-- /.review-table -->

                                            <div class="review-form">
                                                @guest
                                                <p> <b> Untuk menambahkan ulasan. Anda harus login terlebih dahulu <a
                                                            href="{{ route('login') }}">Login disini</a> </b> </p>
                                                @else
                                                <div class="form-container">

                                                    <form role="form" class="cnt-form" method="post"
                                                        action="{{ route('review.store') }}">
                                                        @csrf

                                                        <input type="hidden" name="product_id"
                                                            value="{{ $product->id }}">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th class="cell-label">&nbsp;</th>
                                                                    <th>1 star</th>
                                                                    <th>2 stars</th>
                                                                    <th>3 stars</th>
                                                                    <th>4 stars</th>
                                                                    <th>5 stars</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="cell-label">Rating</td>
                                                                    <td><input type="radio" name="quality" class="radio"
                                                                            value="1"></td>
                                                                    <td><input type="radio" name="quality" class="radio"
                                                                            value="2"></td>
                                                                    <td><input type="radio" name="quality" class="radio"
                                                                            value="3"></td>
                                                                    <td><input type="radio" name="quality" class="radio"
                                                                            value="4"></td>
                                                                    <td><input type="radio" name="quality" class="radio"
                                                                            value="5"></td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="exampleInputReview">Ulasan <span
                                                                            class="astk">*</span></label>
                                                                    <textarea class="form-control txt txt-review"
                                                                        name="comment" id="exampleInputReview" rows="4"
                                                                        placeholder="Bagaimana pengalaman anda setelah menggunakan produk ini ?"></textarea>
                                                                </div><!-- /.form-group -->
                                                            </div>
                                                        </div><!-- /.row -->
                                                        <div class="action text-right">
                                                            <button type="submit"
                                                                class="btn btn-primary btn-upper">Kirim Ulasan</button>
                                                        </div><!-- /.action -->
                                                    </form><!-- /.cnt-form -->
                                                </div><!-- /.form-container -->
                                                @endguest
                                            </div><!-- /.review-form -->

                                        </div><!-- /.product-add-review -->

                                    </div><!-- /.product-tab -->
                                </div><!-- /.tab-pane -->
                            </div><!-- /.tab-content -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.product-tabs -->

                <!-- ===== ======= UPSELL PRODUCTS ==== ========== -->
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">Produk Terkait</h3>
                    <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
                        @forelse ($relatedProduct as $product)
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
                </section><!-- /.section -->
                <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
                <!-- FEATURED PRODUCTS RECENTLY VIEWED -->
                @include('frontend.product.recently_view_products')
                <!-- FEATURED PRODUCTS RECENTLY VIEWED -->
            </div><!-- /.col -->
            <div class="clearfix"></div>
        </div><!-- /.row -->
    </div>
</div>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e4b85f98de5201f"></script>
<script>
    const qtyInput = document.getElementById("qty");
    const stock = document.getElementById("stock");

    qtyInput.addEventListener("input", (event) => {
      // Dapatkan nilai dari input
      const qtyValue = event.target.value;
      const stockValue = stock.value;

      
      //document.getElementById("btnCart").disabled = true;
      if (qtyValue > stockValue) {
          document.getElementById("btnCart").disabled = true;
      } else {
          document.getElementById("btnCart").disabled = false;
      }
  
    });


    function addToKeranjang(token) {
            //alert("Keranjang");
            var product_name = $('#pname').text();
            var product_weight = $('#pweight').text();
            var id = $('#product_id').val();
            var color = $('#color option:selected').text();
            var size = $('#size option:selected').text();
            var quantity = $('#qty').val();
            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    _token : token,
                    color: color,
                    size: size,
                    quantity: quantity,
                    product_weight: product_weight,
                    product_name: product_name
                },
                url: "/cart/data/store/" + id,
                success: function (data) {

                    miniCart()
                    $('#closeModel').click();
                    // console.log(data)

                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            type: 'success',
                            title: data.success
                        })

                    } else {
                        Toast.fire({
                            type: 'error',
                            title: data.error
                        })

                    }

                    // End Message 
                }
            })

    }

    function miniCart() {
        $.ajax({
            type: 'GET',
            url: '/product/mini/cart',
            dataType: 'json',
            success: function (response) {

                $('span[id="cartSubTotal"]').text(response.cartTotal);
                $('#cartQty').text(response.cartQty);
                var miniCart = ""

                $.each(response.carts, function (key, value) {
                    miniCart += `<div class="cart-item product-summary">
        <div class="row">
        <div class="col-xs-4">
            <div class="image"> <a href="#"><img src="/${value.options.image}" alt=""></a> </div>
        </div>
        <div class="col-xs-7">
            <h3 class="name"><a href="#">${value.name}</a></h3>
            <div class="price"> Rp${numberformat(value.price)} X ${value.qty} </div>
        </div>
        <div class="col-xs-1 action"> 
        <button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fa fa-trash"></i></button> </div>
        </div>
    </div>
    <!-- /.cart-item -->
    <div class="clearfix"></div>
    <hr>`
                });

                $('#miniCart').html(miniCart);
            }
        })

    }
</script>
@endsection
