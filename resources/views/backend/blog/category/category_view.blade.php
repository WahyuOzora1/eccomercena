@extends('admin.admin_master')
@section('admin')


<!-- Content Wrapper. Contains page content -->
<div class="container-full">
	<!-- Content Header (Page header) -->
	
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-8">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Kategori Blog <span class="badge badge-pill badge-danger"> {{ count($blogcategory) }} </span></h3>
					</div>
					<!-- /.box-header -->
						<div class="box-body">
							<div class="table-responsive">
								<table id="example1" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th width="5%">No.</th>
											<th>Kategori</th>
											<th>Slug</th>
											<th width="20%">Opsi</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($blogcategory as $key => $item)
											<tr>
												<td>{{ $key + 1 }}</td>
												<td>{{ $item->blog_category_name_en }}</td>
												<td>{{ $item->blog_category_slug_en }}</td>
												<td>
													<a href="{{ route('blog.category.edit', $item->id) }}"
														class="btn btn-sm btn-warning">
														<i class="fa fa-edit"></i>
													</a>
													<a href="{{ route('blog.category.delete', $item->id) }}"
														class="btn btn-sm btn-danger" id="delete">
														<i class="fa fa-trash"></i>
													</a>
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

			<!--------------------- Add category --------------->		
			<div class="col-4">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Tambah Kategori Blog</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div class="table-responsive">
							<form method="post" action="{{ route('blogcategory.store')}}" enctype="multipart/form-data">
								@csrf
											
								<div class="form-group mt-5 pt-5">
									<h5>Kategori Blog <span class="text-danger">*</span></h5>
									<div class="controls">
										<input type="text"  name="blog_category_name_en" class="form-control" placeholder="Nama Sub Kategori" >
										@error('blog_category_name_en')
											<span class="text-danger">{{ $message }}</span>
										@enderror
									<div>
								</div>
								<div class="text-xs-right mt-5 pt-5">
									<input type="submit" class="btn btn-md btn-primary mb-5" value="Tambah">
								</div>
							</form>
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
<!-- /.content-wrapper -->

@endsection