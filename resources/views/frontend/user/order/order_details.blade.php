@extends('frontend.main_master')
@section('content')

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ route('dashboard') }}">Beranda</a></li>
                <li><a href="{{ route('my.orders') }}">Transaksi</a></li>
                <li class='active'>Detail Transaksi</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="sign-in-page" style="margin: 30px 0">
            <div class="row">
                <div class="col-md-7">
                    <h4>Rincian Produk</h4>
                    <hr>
                    @foreach ($orderItem as $item)
                    <div class="media product-card">
                        <a class="pull-left" href="#">
                            <img style="width: 150px" src="{{ asset($item->product->product_thambnail) }}"
                                alt="Image" />
                        </a>
                        <div class="media-body">
                            @if ($order->status != 'selesai')
                                <h4 style="font-size: 16px; font-weight: 500" class="media-heading">
                                    {{ $item->product->product_name }}</h4>
                                <p class="">{{ $item->size }} -
                                    {{ $item->color }}</p>
                                <p>{{ $item->product->product_code }}</p>
                                <p style="font-size: 14px">{{ $item->qty }}
                                    produk x Rp{{ number_format($item->price, 0, ',', '.') }}
                                </p>
                            @else
                                <h4 style="font-size: 16px; font-weight: 500" class="media-heading">
                                    {{ $item->product->product_name }}</h4>
                                <span style="float: right">
                                    <a title="Keranjang" data-toggle="modal"
                                    data-target="#exampleModal" id="{{ $item->product->id }}"
                                    onclick="productView(this.id)" class="btn btn-primary" style="padding: 6px 40px;">Beli Lagi
                                    </a>
                                </span>
                                <p class="">{{ $item->size }} -
                                    {{ $item->color }}</p>
                                <p>{{ $item->product->product_code }}</p>
                                <span style="float: right">
                                    <a href="{{ url('product/details/'.$item->product_id.'/'.$item->product->product_slug ) }}"
                                        class="" style="padding: 6px 40px; ">Beri Ulasan</a>
                                </span>
                                <p style="font-size: 14px">{{ $item->qty }}
                                    produk x Rp{{ number_format($item->price, 0, ',', '.') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    @endforeach

                    <h4 style="padding-top: 30px">Info Pengiriman</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <p>Nama</p>
                            <p>No Telepon</p>
                            <p>Email</p>
                            <p>Alamat</p>
                        </div>
                        <div class="col-md-8">
                            <p style="margin-bottom: 10px">
                                <span style="margin-right: 10px">:</span>
                                {{ $order->name }}
                            </p>
                            <p style="margin-bottom: 10px">
                                <span style="margin-right: 10px">:</span>
                                {{ $order->phone }}
                            </p>
                            <p style="margin-bottom: 10px">
                                <span style="margin-right: 10px">:</span>
                                {{ $order->email }}
                            </p>
                            <p style="margin-bottom: -20px;">
                                <span style="margin-right: 10px">:</span>
                                <div style="padding: 0 20px">
                                    {{ $order->address }} <br>
                                    {{ $order->state->state_name }}, {{ $order->district->district_name }}, <br>
                                    {{ $order->division->division_name }}, {{ $order->poscode }}
                                </div>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <h4>Rincian Pembayaran</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <p style="margin-bottom: 20px">Status Pesanan</p>
                            <p>Invoice</p>
                            <p>Tanggal Pembelian</p>
                            <p>Metode Pembayaran</p>
                        </div>
                        <div class="col-md-8">
                            <p style="margin-bottom: 10px">
                                {{-- <span style="margin-bottom: 15px;">Status (Pesanan)</span> --}}
                                @if($order->status == 'ditunda')
                                <span class="badge badge-pill badge-warning" style="background: #800080; padding: 10px;"> Ditunda
                                </span>
                                @elseif($order->status == 'di konfirmasi')
                                <span class="badge badge-pill badge-warning" style="background: #0000FF; padding: 10px;"> Dikonfirmasi
                                </span>

                                @elseif($order->status == 'dikemas')
                                <span class="badge badge-pill badge-warning" style="background: #FFA500; padding: 10px;"> Dikemas
                                </span>

                                @elseif($order->status == 'dikirim')
                                <span class="badge badge-pill badge-warning" style="background: #808000; padding: 10px;"> Dalam
                                    Pengiriman </span>

                                @elseif($order->status == 'dalam perjalanan')
                                <span class="badge badge-pill badge-warning" style="background: #808080; padding: 10px;"> Dalam
                                    perjalanan </span>

                                @elseif($order->status == 'selesai')
                                <span class="badge badge-pill badge-warning" style="background: #008000; padding: 10px;"> Selesai
                                </span>

                                @if($order->return_order == 1)
                                <span class="badge badge-pill badge-warning" style="background:red; padding: 10px;">Pengembalian
                                </span>

                                @endif

                                @else
                                <span class="badge badge-pill badge-warning" style="background: #FF0000; padding: 10px;"> Batal </span>
                                @endif
                            </p>
                            <p style="margin-bottom: 10px">
                                @if ($order->status == 'selesai')
                                <a href="{{ url('user/invoice_download/' . $order->id) }}" target="_blank"
                                    class="text-success">
                                    <i class="fa fa-print"></i>
                                    {{-- {{ $order->invoice_no }}/00{{ $order->id }}/00{{ $order->user_id }} --}}
                                    {{ $order->invoice_no }}
                                </a>
                                @else
                                <span>
                                    <i class="fa fa-print"></i>
                                    {{-- {{ $order->invoice_no }}/00{{ $order->id }}/00{{ $order->user_id }} --}}
                                    {{ $order->invoice_no }}
                                </span>
                                @endif
                            </p>
                            <p style="margin-bottom: 10px">
                                <span style="margin-bottom: 10px;">{{ $order->order_date }}</span>
                            </p>
                            <p style="margin-bottom: 10px;">
                                <span class="">{{ $order->payment_method }}</span>
                            </p>
                            {{-- <p style="margin-bottom: 10px;">
                                <span style="margin-bottom: 10px;">
                                    Total Harga 
                                </span>
                                <span class="">Rp{{ number_format($order->amount, 0, '', '.') }}</span>
                            </p> --}}
                            <p style="margin-bottom: 10px;">
                                <span style="checkout-btn">
                                    <strong style="font-size: 16px">Total Belanja</strong>
                                </span>
                                <span class="">
                                    <strong
                                        style="font-size: 16px">Rp{{ number_format($order->amount, 2, ',', '.') }}</strong>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>

                {{-- 
                    <li>
                        <span style="margin-bottom: 10px;">
                            Total Ongkos Kirim ({{ number_format($order->totalberat, 0, ',', '.') }} gr)
                </span>
                <span class="">Rp{{ number_format($order->totalongkir, 0, '', '.') }}</span>
                </li>
                --}}
            </div>



            <div class="row">
                <div class="col-md-12">

                    @if($order->status !== "selesai")

                    @else

                    @php
                    $order = App\Models\Order::where('id',$order->id)->where('return_reason','=',NULL)->first();
                    @endphp


                    @if($order)
                    <h4 style="padding-top: 30px">Pengembalian Pesanan</h4>
                    <hr>
                    <form action="{{ route('return.order',$order->id) }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="label"> Alasan Pengembalian Pesanan :</label>
                            <textarea name="return_reason" id="" class="form-control" cols="30"
                                rows="05">Tulis alasan</textarea>
                        </div>

                        <button type="submit" class="btn btn-danger">Kirim</button>

                    </form>
                    @else

                    <span class="badge badge-pill badge-warning" style="background: red">Anda telah mengirim permintaan
                        pengembalian untuk produk ini </span>

                    @endif
                    @endif
                    <br><br>
                </div>

            </div>

        </div>
    </div>
</div>

@endsection