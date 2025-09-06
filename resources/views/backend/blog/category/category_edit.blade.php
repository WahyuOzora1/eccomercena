@extends('admin.admin_master')
@section('admin')


<!-- Content Wrapper. Contains page content -->
<div class="container-full">
	<!-- Content Header (Page header) -->
	
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<!--------------------- Add blogcategory --------------->		
			<div class="col-6">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Ubah Kategori Blog </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					<form method="post" action="{{ route('blogcategory.update',$blogcategory->id)}}" enctype="multipart/form-data">
						@csrf

						<input type="hidden" name="id" value="{{ $blogcategory->id }}">
										
						<div class="form-group">
							<h5>Kategori Blog<span class="text-danger">*</span></h5>
							<div class="controls">
								<input type="text"  name="blog_category_name_en" class="form-control" value="{{ $blogcategory->blog_category_name_en }}" >
								@error('blog_category_name_en')
								<span class="text-danger">{{ $message }}</span>
								@enderror
							</div>
						</div>
						<div class="text-xs-right">
							<input type="submit" class="btn btn-md btn-primary mb-5" value="Ubah">
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