@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->

<div class="container-full">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Data Produk <span class="badge badge-pill badge-primary">
                                {{ count($products) }} </span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">No. </th>
                                        <th width="15%">Foto </th>
                                        <th>Barcode </th>
                                        <th width="15%">Nama Produk </th>
                                        <th>Harga </th>
                                        <th>Diskon </th>
                                        <th>Stok </th>
                                        <th>Status</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <img src="{{ asset($item->product_thambnail) }}"
                                                style="width: 70px; height: 70px;" alt="">
                                        </td>
                                        <td>{{ $item->product_code }}</td>
                                        <td>{{ $item->product_name }}</td>
                                        <td>Rp{{ number_format($item->product_price,0,'','.') }}</td>
                                        <td>
                                            @if($item->product_discount == NULL)
                                            <span class="badge badge-pill badge-danger">Tidak ada diskon</span>

                                            @else
                                            @php
                                            $amount = $item->product_price - $item->product_discount;
                                            $discount = ($amount/$item->product_price) * 100;
                                            @endphp
                                            <span class="badge badge-pill badge-danger">{{ round($discount)  }} %</span>

                                            @endif
                                        </td>
                                        <td>{{ $item->product_qty }}</td>
                                        <td>
                                            @if($item->status == 1)
                                            <span class="badge badge-pill badge-success"> Aktif </span>
                                            @else
                                            <span class="badge badge-pill badge-danger"> Non Aktif </span>
                                            @endif
                                        </td>
                                        <td width="20%">

                                            @if($item->is_preorder == 1)
                                                <a href="{{ route('manage.product_material.index', $item->id) }}" class="btn btn-sm btn-info mb-2" title="Tambah Bahan"><i class="fa fa-plus-circle"></i> </a>
                                            @endif

                                            <a href="{{ route('product.edit',$item->id) }}" class="btn btn-sm btn-info mb-2"
                                                title="Edit Data"><i class="fa fa-edit"></i> </a>

                                                <a href="{{ route('product.delete',$item->id) }}"
                                                    class="btn btn-sm mb-2 btn-danger" title="Delete Data" id="delete">
                                                    <i class="fa fa-trash"></i></a>

                                            @if($item->status == 1)
                                            <a href="{{ route('product.inactive',$item->id) }}"
                                                class="btn btn-sm mb-2 btn-danger" title="Inactive Now"><i
                                                    class="fa fa-arrow-down"></i> </a>
                                            @else
                                            <a href="{{ route('product.active',$item->id) }}"
                                                class="btn btn-sm mb-2 btn-success" title="Active Now"><i
                                                    class="fa fa-arrow-up"></i> </a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>

@endsection