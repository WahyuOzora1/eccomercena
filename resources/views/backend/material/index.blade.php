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
                        <h3 class="box-title">{{ $title }} <span class="badge badge-sm badge-pill badge-primary"> {{ $count }} </span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <div class="btn-group mb-3">
                            <a href="{{ route('materials.create') }}" class="btn btn-success btn-sm rounded shadow font-weight-bold">Tambah Bahan</a>
                        </div>

                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Nama Bahan</td>
                                        <td>Stok</td>
                                        <td>Satuan</td>
                                        <td>Status</td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($materials as $material)
                                        <tr>
                                            <td class="text-left">{{ $loop->iteration }}</td>
                                            <td>{{ $material->name }}</td>
                                            <td><span class="badge badge-pill badge-info">{{ $material->stock }}</span></td>
                                            <td>
                                                @if ($material->status == 1)
                                                    <span class="badge badge-pill badge-success">Aktif</span>
                                                @else
                                                    <span class="badge badge-pill badge-danger">Tidak Aktif</span>
                                                @endif
                                            </td>
                                            <td><span class="badge badge-pill badge-primary font-weight-bold">{{ empty($material->unit_id) ? '-' : $material->unit->name}}</span></td>
                                            <td>
                                                <a href="{{ route('materials.edit', $material->id) }}" class="btn btn-warning btn-sm rounded shadow font-weight-bold">Edit</a>
                                                <a href="{{ route('materials.delete',$material->id) }}" class="btn btn-sm 	btn-danger" title="Delete Data" id="delete">
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
