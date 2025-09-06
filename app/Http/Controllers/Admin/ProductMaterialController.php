<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Material;
use Illuminate\Http\Request;
use App\Models\ProductMaterial;
use App\Http\Controllers\Controller;

class ProductMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $product = Product::where('is_preorder', 1)->where('id', $id)->first();

        $productMaterials = ProductMaterial::where('product_id', $id)->get();

        $data = [
            'title' => 'Bahan Produk - ' . $product->product_name,
            'product' => $product,
            'count' => ProductMaterial::where('product_id', $id)->count(),
            'product_materials' => $productMaterials
        ];

        return view('backend.product_material.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $product = Product::where('is_preorder', 1)->where('id', $id)->first();

        $data = [
            'title' => 'Tambah Bahan Produk - ' . $product->product_name,
            'product' => $product,
            'materials' => Material::where('status', 1)->get()
        ];

        return view('backend.product_material.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $validate = [
            'material' => ['required'],
            'qty' => ['required']
        ];

        $message = [
            'material.required' => 'Bahan harus di pilih',
            'qty.required' => 'Jumlah harus di isi'
        ];

        $request->validate($validate, $message);

        $product = Product::where('is_preorder', 1)->where('id', $id)->first();

        if(empty($product)) {
            $notificationErr = array(
                'message' => 'Terjadi Kesalahan',
                'alert-type' => 'warning'
            );

            return redirect()->route('manage.product_material.create', $id)->with($notificationErr);
        }

        $material = ProductMaterial::where('product_id', $product->id)->where('material_id', $request->material)->first();

        if (!empty($material)) {
            $notificationErr = array(
                'message' => 'Material ' . $material->name .' Telah di Tambahkan.',
                'alert-type' => 'warning'
            );

            return redirect()->route('manage.product_material.create', $id)->with($notificationErr);
        }

        $data = [
            'material_id' => $request->material,
            'product_id' => $product->id,
            'qty' => $request->qty
        ];

        $result = ProductMaterial::create($data);

        if($result) {

            $notification = array(
                'message' => 'Data Berhasil di Simpan',
                'alert-type' => 'success'
            );

            return redirect()->route('manage.product_material.index', $id)->with($notification);

        } else {
            $notification = array(
                'message' => 'Data Gagal di Simpan',
                'alert-type' => 'error'
            );

            return redirect()->route('manage.product_material.create', $id)->with($notification);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if(empty($id)) {
            return abort(404);
        }

        $pm = ProductMaterial::where('id', $id)->first();

        $product = Product::where('is_preorder', 1)->where('id', $pm->product_id)->first();

        $data = [
            'title' => 'Edit Bahan Produk - ' . $product->product_name,
            'product' => $product,
            'materials' => Material::where('status', 1)->get(),
            'pm' => $pm
        ];

        return view('backend.product_material.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = [
            'material' => ['required'],
            'qty' => ['required']
        ];

        $message = [
            'material.required' => 'Bahan harus di pilih',
            'qty.required' => 'Jumlah harus di isi'
        ];

        $request->validate($validate, $message);

        $pm = ProductMaterial::where('id', $id)->first();

        $product = Product::where('is_preorder', 1)->where('id', $pm->product_id)->first();

        if (empty($product)) {
            $notificationErr = array(
                'message' => 'Terjadi Kesalahan',
                'alert-type' => 'warning'
            );

            return redirect()->route('manage.product_material.edit', $id)->with($notificationErr);
        }

        $material = ProductMaterial::where('id', '!=', $id)->where('product_id', $product->id)->where('material_id', $request->material)->first();

        if (!empty($material)) {
            $notificationErr = array(
                'message' => 'Material ' . $material->name . ' Telah di Tambahkan.',
                'alert-type' => 'warning'
            );

            return redirect()->route('product_material.edit', $id)->with($notificationErr);
        }

        $data = [
            'material_id' => $request->material,
            'product_id' => $product->id,
            'qty' => $request->qty
        ];

        $result = ProductMaterial::where('id', $id)->update($data);

        if ($result) {

            $notification = array(
                'message' => 'Data Berhasil di Simpan',
                'alert-type' => 'success'
            );

            return redirect()->route('manage.product_material.index', $product->id)->with($notification);

        } else {
            $notification = array(
                'message' => 'Data Gagal di Simpan',
                'alert-type' => 'error'
            );

            return redirect()->route('manage.product_material.edit', $id)->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function delete($id)
    {
        $pm = ProductMaterial::where('id', $id)->first();

        $result = ProductMaterial::destroy($id);

        if ($result) {

            $notification = array(
                'message' => 'Data Berhasil di Hapus',
                'alert-type' => 'success'
            );

            return redirect()->route('manage.product_material.index', $pm->product_id)->with($notification);

        } else {
            $notification = array(
                'message' => 'Data Gagal di Hapus',
                'alert-type' => 'error'
            );

            return redirect()->route('manage.product_material.index', $pm->product_id)->with($notification);
        }
    }
}
