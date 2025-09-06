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
                        <h3 class="box-title">{{ $title }} <span class="badge badge-pill badge-primary"> {{ $count }} </span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <div class="btn-group mb-3">
                            <a href="{{ route('manage.product') }}"
                                class="btn btn-warning btn-sm rounded shadow font-weight-bold">Kembali</a> &nbsp;
                            <a href="{{ route('manage.product_material.create', $product->id) }}"
                                class="btn btn-success btn-sm rounded shadow font-weight-bold">Tambah Bahan Produk - {{ $product->product_name }}</a>
                        </div>

                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Nama Bahan</td>
                                        <td>Satuan</td>
                                        <td>Jumlah</td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product_materials as $pm)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pm->material->name }}</td>
                                            <td><span class="badge badge-info badge-pill">{{ empty($pm->material->unit_id) ? '-' : $pm->material->unit->name }}</span></td>
                                            <td>{{ $pm->qty }}</td>
                                            <td>
                                                <a href="{{ route('product_material.edit', $pm->id) }}"
                                                    class="btn btn-warning btn-sm rounded shadow font-weight-bold">Edit</a>
                                                <a href="{{ route('product_material.delete',$pm->id) }}" class="btn btn-sm 	btn-danger" title="Delete Data" id="delete">
                                                    <i class="fa fa-trash"></i></a>
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