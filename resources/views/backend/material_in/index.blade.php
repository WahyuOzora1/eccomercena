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

                        <div class="btn-group mb-3">
                            <a href="{{ route('material_in.create') }}"
                                class="btn btn-success btn-sm rounded shadow font-weight-bold">Tambah Stok</a>
                        </div>

                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Nama Bahan</td>
                                        <td>Satuan</td>
                                        <td>Stok Masuk</td>
                                        <td>Tanggal Masuk</td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($materialIn as $in)
                                    <tr>
                                        <td class="text-left">{{ $loop->iteration }}</td>
                                        <td>{{ $in->material->name }}</td>
                                        <td><span class="badge badge-pill badge-primary font-weight-bold">{{ empty($in->material->unit_id) ? '-' : $in->material->unit->name}}</span></td>
                                        <td><span class="badge badge-pill badge-info">{{ $in->stock_in }}</span></td>
                                        <td>{{ Carbon\Carbon::parse($in->date_in)->format('d / m / Y') }}</td>
                                        <td>
                                            <a href="{{ route('material_in.delete',$in->id) }}"
                                                class="btn btn-sm 	btn-danger" title="Delete Data" id="delete">
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
