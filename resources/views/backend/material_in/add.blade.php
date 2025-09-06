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
                            <a href="{{ route('materials.index') }}"
                                class="btn btn-warning btn-sm rounded shadow font-weight-bold">Kembali</a>
                        </div>

                        <form action="{{ route('material_in.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            @method("POST")

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>Nama Bahan :</label>
                                            <select name="material" class="form-control rounded shadow text-white">
                                                <option selected disabled>-- Pilih Bahan --</option>
                                                @forelse ($materials as $material)
                                                    <option value="{{ $material->id }}">{{ $material->name }} - {{ empty($material->unit_id) ? '-' : $material->unit->name}}</option>
                                                @empty
                                                    <option value="" disabled>Data tidak di temukan</option>
                                                @endforelse
                                            </select>
                                        @error('material')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group mb-3">
                                        <label>Stok Masuk :</label>
                                        <input name="stock" type="number" class="form-control rounded shadow text-white" value="{{ @old('stok') }}"
                                            placeholder="Ketikkan jumlah stok ...">
                                        @error('stock')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-sm rounded shadow btn-success mb-3"
                                    value="Tambah Stok">
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
