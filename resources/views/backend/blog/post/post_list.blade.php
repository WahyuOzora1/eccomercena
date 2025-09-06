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
						<h3 class="box-title">Artikel Blog <span class="badge badge-pill badge-danger"> {{ count($blogpost) }} </span></h3>
                        <a href="{{ route('add.post') }}" class="btn btn-success" style="float: right;">Tambah Artikel</a>
					</div>
					<!-- /.box-header -->
						<div class="box-body">
							<div class="table-responsive">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th width="5%">No.</th>
                                            <th>Gambar</th>
											<th>Kategori</th>
											<th>Judul</th>
											<th>Artikel</th>
											<th width="20%">Opsi</th>
										</tr>
									</thead>
									<tbody>
										@foreach ( $blogpost as $key => $item )
											<tr>
												<td>{{ $key+1 }}</td>
                                                <td> <img src="{{ asset($item->post_image) }}" style="width: 60px; height: 60px;"> </td>
												<td>{{ $item->category->blog_category_name_en }}</td>
                                                <td>{{ $item->post_title_en }}</td>
												<td>{!! $item->post_details_en !!}</td>
                                                <td width="20%">
                                                    <a href="{{ route('blog.category.edit',$item->id) }}" class="btn btn-info"title="Edit Data"><i class="fa fa-pencil"></i> </a>
                                                    <a href="{{ route('category.delete',$item->id) }}" class="btn btn-danger"title="Delete Data" id="delete"><i class="fa fa-trash"></i></a>
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
		</div>
		<!-- /.row -->
	</section>
	<!-- /.content -->
	
</div>
<!-- /.content-wrapper -->

@endsection