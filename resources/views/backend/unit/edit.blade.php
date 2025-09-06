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
                        <h3 class="box-title">{{ $title }}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <div class="btn-group mb-3">
                            <a href="{{ route('units.index') }}" class="btn btn-warning btn-sm rounded shadow font-weight-bold">Kembali</a>
                        </div>

                        <form action="{{ route('units.update', $data->id) }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            @method("PUT")

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>Nama Bahan :</label>
                                        <input name="name" type="text" class="form-control rounded shadow text-white" value="{{ $data->name }}" placeholder="Ketikkan nama bahan baku ...">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>Status :</label>
                                        <select name="status" class="form-control rounded shadow text-white">
                                            <option selected disabled>-- Pilih Status --</option>
                                            <option {{ $data->status == 1 ? 'selected' : '' }} value="1">Aktif</option>
                                            <option {{ $data->status == 2 ? 'selected' : '' }} value="2">Tidak Aktif</option>
                                        </select>
                                        @error('status')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-sm rounded shadow btn-success mb-3" value="Edit Satuan">
                            </div>

                        </form>


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
