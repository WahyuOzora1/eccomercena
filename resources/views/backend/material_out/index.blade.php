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
                        <h3 class="box-title">{{ $title }} <span class="badge badge-pill badge-primary"> </span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">


                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Nama Bahan</td>
                                        <td>Satuan</td>
                                        <td>Stok Keluar</td>
                                        <td>Tanggal Keluar</td>
                                        <td>Produk</td>
                                        <td>Order ID</td>
                                        <td>No Invoice</td>
                                        <!-- <td>Aksi</td> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($outs as $out)
                                    <tr>
                                        <td class="text-left">{{ $loop->iteration }}</td>
                                        <td>{{ $out->material->name }}</td>
                                        <td><span class="badge badge-pill badge-primary font-weight-bold">{{
                                                empty($out->material->unit_id) ? '-' : $out->material->unit->name}}</span>
                                        </td>
                                        <td><span class="badge badge-pill badge-outfo">{{ $out->stock_out }}</span></td>
                                        <td>{{ Carbon\Carbon::parse($out->date_out)->format('d / m / Y') }}</td>
                                        <td>{{ $out->product->product_name }}</td>
                                        <td>{{ $out->order->order_number }}</td>
                                        <td>{{ $out->order->invoice_no }}</td>
                                        <!-- <td>
                                            <a href="{{ route('material_out.delete',$out->id) }}"
                                                class="btn btn-sm 	btn-danger" title="Delete Data" id="delete">
                                                <i class="fa fa-trash"></i></a>
                                        </td> -->
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
