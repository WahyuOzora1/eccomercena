@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Produk</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-6">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Nama Produk <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_name" placeholder="Nama Produk"
                                                            class="form-control">
                                                        @error('product_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Berat Produk <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_weight"
                                                            placeholder="Berat Produk" class="form-control" required="">
                                                        @error('product_weight')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Kode Produk <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_code" placeholder="Barcode"
                                                            class="form-control">
                                                        @error('product_code')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Stok Produk <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_qty"
                                                            placeholder="Jumlah Stok Produk" class="form-control" required="">
                                                        @error('product_qty')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Ukuran Produk <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_size" id="product_size"
                                                            class="form-control" value="36,37,38" data-role="tagsinput"
                                                            required="">
                                                        @error('product_size')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="controls">
                                                    {{-- @php

                                                        $arr_size = $products->product_size;
                                                        $split_size = explode(',',$arr_size);


                                                    @endphp
                                             --}}

                                                    <h5 class="mt-2">Harga Ukuran Produk</h5>

                                                    <div id="product_sizess">

                                                        {{-- @foreach($split_size as $size)
        <div class="d-inline-flex align-items-center">
            <label class="mx-2 text-muted" for="{{$size}}">{{$size}}</label>
                                                        <input class="form-control my-2" id="{{$size}}" name="pre_order"
                                                            id="pre_order" placeholder="eg. RP. 45.000" required>
                                                    </div>

                                                    @endforeach --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Warna Produk <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_color" id="product_color"
                                                        class="form-control" value="hitam,biru,merah"
                                                        data-role="tagsinput" required="">
                                                    @error('product_color')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="controls">
                                                {{-- @php

                                                        $arr_color = $products->product_color;
                                                        $split_color = explode(',',$arr_color);


                                                    @endphp --}}
                                                <h5 class="mt-2">Harga Warna Produk</h5>

                                                <div id="product_colors">

                                                </div>
                                                {{-- @foreach($split_color as $color)
                                                    <span class="d-inline-flex align-items-center">
                                                        <label class="mx-2 text-muted" for="{{$color}}">{{$color}}</label>
                                                <input class="form-control my-2" id="{{$color}}" name="pre_order"
                                                    id="pre_order" placeholder="eg. RP. 45.000" required>
                                                </span>
                                                @endforeach --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <h5>jenis Product<span class="text-danger">*</span></h5>
                                                <div class="controls">

                                                    <input type="text" name="product_jenis" id="product_jenis"
                                                        class="form-control" value="plastik,polycarbonat,kulit"
                                                        data-role="tagsinput" required="">
                                                    @error('product_jenis')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                </div>
                                                <div class="controls">
                                                    {{-- @php

                                                            $arr_color = $products->product_color;
                                                            $split_color = explode(',',$arr_color);


                                                            @endphp --}}
                                                    <h5 class="mt-2">Harga Jenis Produk</h5>

                                                    <div id="product_jeniss">

                                                    </div>
                                                    {{-- @foreach($split_color as $color)
                                                                <span class="d-inline-flex align-items-center">
                                                                    <label class="mx-2 text-muted" for="{{$color}}">{{$color}}</label>
                                                    <input class="form-control my-2" id="{{$color}}" name="pre_order"
                                                        id="pre_order" placeholder="eg. RP. 45.000" required>
                                                    </span>
                                                    @endforeach --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h5>Tag Produk <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_tags" class="form-control"
                                                        value="sneakers adidas" data-role="tagsinput" required="">
                                                    @error('product_tags')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Produk Digital <span class="text-danger">pdf,xlx,csv*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="file" class="form-control" required="">
                                                    </div>
                                                </div>
                                            </div> --}}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Harga Produk <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="product_price" class="form-control"
                                                        required>
                                                    @error('product_price')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>Harga Diskon </h5>
                                                <div class="controls">
                                                    <input type="text" name="product_discount" class="form-control"
                                                        id="harga" placeholder="Harga Diskon" >
                                                    @error('product_discount')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h5>Deskripsi Pendek (Short) <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea name="product_short_desc" id="textarea"
                                                        class="form-control" required
                                                        placeholder="Textarea text"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h5>Deskripsi Panjang (Long) <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea id="editor1" name="product_long_desc" rows="10" cols="80"
                                                        required="">Deskripsi Panjang (Long)</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End col-7 -->
                            <div class="col-6">
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5>Pilih Merek <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="brand_id" class="form-control">
                                                        <option value="" selected="" disabled="">Pilih Merek
                                                        </option>
                                                        @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}">{{ $brand->brand_name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @error('brand_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <h5>Kategori<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="category_id" class="form-control">
                                                        <option value="" selected="" disabled="">Pilih Kategori
                                                        </option>
                                                        @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">
                                                            {{ $category->category_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5>Sub Kategori <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="subcategory_id" class="form-control" required="">
                                                        <option value="" selected="" disabled="">Pilih Sub Kategori
                                                        </option>
                                                    </select>
                                                    @error('subcategory_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Sub-Sub Kategori <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="subsubcategory_id" class="form-control"
                                                            >
                                                            <option value="" selected="" disabled="">Sub-Sub
                                                                Kategori
                                                            </option>

                                                        </select>
                                                        @error('subsubcategory_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_2" name="product_promo"
                                                            value="1">
                                                        <label for="checkbox_2">Promo</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_3" name="new_product"
                                                            value="1">
                                                        <label for="checkbox_3">Produk Baru</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_4" name="new_arrival"
                                                            value="1">
                                                        <label for="checkbox_4">Baru Datang</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_5" name="new_arrival"
                                                            value="1">
                                                        <label for="checkbox_5">Best Seller</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" name="" id="checkbox_0" name="pre_order">
                                                        <label for="checkbox_0">Pre Order</label>
                                                        <input type="hidden" name="is_preorder" value="0" class="form-control is_preorder" id="is_preorder" readonly>
                                                        <input class="form-control" hidden name="pre_order"
                                                            id="pre_order" placeholder="eg. max 60 days">
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5>Produk (Thumbnail) <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" name="product_thambnail" class="form-control"
                                                        id="gambar" onChange="ThumbUrl(this)" required="">
                                                    @error('product_thambnail')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <img src="" id="mainThmb">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <h5>Produk Galeri <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" name="multi_img[]" for="galeri"
                                                        class="form-control" id="multiImg" multiple required="">
                                                    @error('multi_img')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row ml-1 mt-4">
                                            <div class="col-md-6">
                                                <img src="" id="Thumb">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="row ml-1" id="preview_img"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- End col-5 -->
                    </div>
                    <div class="card-footer">
                        <div class="text-xs-right">
                            <input type="submit" class="btn btn-md btn-primary mb-5" value="Tambah Produk">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
</div>
</section>
</div>
{{-- Ajax Sub Kategori, Sub-Sub Kategori --}}
<script type="text/javascript">
// Ajax Sub Kategori
$(document).ready(function() {
    $('select[name="category_id"]').on('change', function() {
        var category_id = $(this).val();
        if (category_id) {
            $.ajax({
                url: "{{  url('/category/subcategory/ajax') }}/" + category_id,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('select[name="subsubcategory_id"]').html('');
                    var d = $('select[name="subcategory_id"]').empty();
                    $('select[name="subcategory_id"]').append('<option value="" disabled selected>-- Pilih Sub Category --</option>');
                    $.each(data, function(key, value) {
                        $('select[name="subcategory_id"]').append(
                            '<option value="' + value.id + '">' + value
                            .subcategory_name + '</option>');
                    });
                },
            });
        } else {
            alert('danger');
        }
    });

    // Ajax Sub-Sub Kategori
    $('select[name="subcategory_id"]').on('change', function() {
        var subcategory_id = $(this).val();
        if (subcategory_id) {
            $.ajax({
                url: "{{  url('/category/sub-subcategory/ajax') }}/" + subcategory_id,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var d = $('select[name="subsubcategory_id"]').empty();
                      $('select[name="subsubcategory_id"]').append('<option value="" disabled selected>-- Pilih Sub-Subcategory --</option>');
                    $.each(data, function(key, value) {
                        $('select[name="subsubcategory_id"]').append(
                            '<option value="' + value.id + '">' + value
                            .subsubcategory_name + '</option>');
                    });
                },
            });
        } else {
            alert('danger');
        }
    });
});
</script>

{{-- Ajax Foto Thumbnail --}}
<script type="text/javascript">
function ThumbUrl(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#Thumb').attr('src', e.target.result).width(150).height(150);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>




{{-- Ajax Galeri Foto --}}
<script>
$(document).ready(function() {
    $('#multiImg').on('change', function() { //on file input change
        if (window.File && window.FileReader && window.FileList && window
            .Blob) //check File API supported browser
        {
            var data = $(this)[0].files; //this file data

            $.each(data, function(index, file) { //loop though each file
                if (/(\.|\/)(gif|jpe?g|png)$/i.test(file
                        .type)) { //check supported file type
                    var fRead = new FileReader(); //new filereader
                    fRead.onload = (function(file) { //trigger function on successful read
                        return function(e) {
                            var img = $('<img/>').addClass('thumb').attr('src',
                                    e.target.result).width(75)
                                .height(75); //create image element
                            $('#preview_img').append(
                                img); //append image to output element
                        };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });

        } else {
            alert("Your browser doesn't support File API!"); //if File API is absent
        }
    });
});
</script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>



<script>
$(document).ready(function() {

    // var total_harga_product = 0;


    $('#product_size').on('change', function(event) {

        $('#product_sizess').empty();
        var arrval = $(this).val().split(',');

        arrval.forEach(function(size) {
            var label = $('<label>').addClass('mx-2 text-muted').attr('for', size).text(size);
            var input = $('<input>').addClass('form-control my-2 pre-order-input')
                .attr({
                    'id': size,
                    'name': 'productsize_price' + size,
                    'placeholder': 'eg. RP. 45.000',
                    'required': true
                })
            // .on('change', function () {
            //     sizeproduct(size);
            // });
            var inputName = $('<input>')
                .attr({

                    'name': 'product_size_name' + size,
                    'required': true,
                    'hidden': true,
                    'value': size,
                })
            $('#product_sizess').append($('<div>').addClass('d-inline-flex align-items-center')
                .append(label, input, inputName));


        });

        // function sizeproduct(size) {
        //     // alert($('#'+size).val());
        //     var harga = $('#'+size).val();
        //     total_harga_product = parseInt(total_harga_product) + parseInt(harga);
        //     $('#harga_produk').val(total_harga_product);
        // }


        $('#product_jenis').on('change', function(event) {

            $('#product_jeniss').empty();
            var arrJenis = $(this).val().split(',');
            arrJenis.forEach(function(jenis) {
                var labelJenis = $('<label>').addClass('mx-2 text-muted').attr('for',
                    jenis).text(jenis);
                var inputJenis = $('<input>').addClass(
                        'form-control my-2 pre-order-input')
                    .attr({
                        'id': jenis,
                        'name': 'jenis_price' + jenis,
                        'placeholder': 'eg. RP. 45.000',
                        'required': true
                    })
                // .on('change', function() {
                //     jenisProduct(jenis);
                // });
                var inputJenisName = $('<input>')
                    .attr({

                        'name': 'product_jenis_name' + jenis,
                        'required': true,
                        'hidden': true,
                        'value': jenis,
                    })


                // Membuat elemen <select> menggunakan jQuery
                var selectJenis = $('<select>').addClass(
                        'form-control my-2 mx-2 pre-order-input')
                    .attr({

                        'name': 'productjenis_active' + jenis,
                        'required': true
                    }).on('change', function() {

                        if ($(this).val() === "0") {
                            alert('berhasil');
                            $('#checkbox_0').attr({
                                'disabled': true,
                            });
                        } else {
                            $('#checkbox_0').attr({
                                'disabled': false,
                            });

                        }
                    });


                // Menambahkan opsi ke dalam elemen <select>
                var optionJenis1 = $('<option>').val(1).text('ada');
                var optionJenis2 = $('<option>').val(0).text('tidak ada');
                selectJenis.append(optionJenis1, optionJenis2);






                $('#product_jeniss').append($('<div>').addClass(
                    'd-inline-flex align-items-center').append(labelJenis,
                    inputJenis, selectJenis, inputJenisName));
            });
        });

        //     function jenisProduct(jenis) {
        //     var hargaJenis = $('#' + jenis).val();
        //     var hargaJenisNumerik = parseInt(hargaJenis);
        //     total_harga_product = total_harga_product +  hargaJenisNumerik;
        //     $('#harga_produk').val(total_harga_product);
        // }
        $('#product_color').on('change', function(event) {

            $('#product_colors').empty();
            var arrColors = $(this).val().split(',');

            arrColors.forEach(function(color) {
                var labelColor = $('<label>').addClass('mx-2 text-muted').attr('for',
                    color).text(color);
                var inputColor = $('<input>').addClass(
                        'form-control my-2 pre-order-input')
                    .attr({
                        'id': color,
                        'name': 'productcolor_price' + color,
                        'placeholder': 'eg. RP. 45.000',
                        'required': true,
                    })
                // .on('change', function() {
                //     colorProduct(color);
                // });
                var inputProductColor = $('<input>')
                    .attr({

                        'name': 'product_color_name' + color,
                        'required': true,
                        'hidden': true,
                        'value': color,
                    })
                $('#product_colors').append($('<div>').addClass(
                    'd-inline-flex align-items-center').append(labelColor,
                    inputColor, inputProductColor));
            });
        });
    });
    //     function colorProduct(color) {
    //     var hargaColor = $('#' + color).val();
    //     var hargaColorNumerik = parseInt(hargaColor);
    //     total_harga_product = total_harga_product +  hargaColorNumerik;
    //     // $('#harga_produk').val(total_harga_product);

    // }
    // $('#harga_produk').val(total_harga_product);
});
</script>

{{--Pre Order--}}
<script>
$(document).ready(function() {

    $('#checkbox_0').on('change', function(event) {
        var isChecked = $(this).prop('checked');
        console.log(isChecked);

        if (isChecked) {
            $('#is_preorder').val(1);
            $('#pre_order').removeAttr('hidden');
        } else {
            $('#is_preorder').val(0);
            $('#pre_order').prop('hidden', true);
        }
    });


});
</script>
@endsection
