@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<!-- Content Wrapper. Contains page content -->
<div class="container-full">
	<!-- Content Header (Page header) -->
	
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<!--------------------- Add category --------------->		
			<div class="col-12">
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Tambah Artikel Blog</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
							<form method="post" action="{{ route('post-store')}}" enctype="multipart/form-data">
								@csrf

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Judul <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="post_title_en" class="form-control"
                                                    required="" placeholder="Judul">
                                                @error('post_title_en')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Kategori Blog <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="category_id" class="form-control" required="">
                                                    <option value="" selected="" disabled="">Pilih Kategori Blog
                                                    </option>
                                                    @foreach($blogcategory as $category)
                                                    <option value="{{ $category->id }}">
                                                        {{ $category->blog_category_name_en }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Gambar <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="post_image" class="form-control"
                                                    onChange="mainThamUrl(this)" required="">
                                                @error('post_image')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                <img src="" id="mainThmb">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Artikel <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <textarea id="editor1" name="post_details_en" rows="10" cols="80" required="">Artikel</textarea>
                                            </div>
                                        </div>
                                    </div>
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

<script type="text/javascript">
    function mainThamUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#mainThmb').attr('src', e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endsection