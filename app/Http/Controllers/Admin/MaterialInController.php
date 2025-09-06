<?php

namespace App\Http\Controllers\Admin;

use App\Models\Material;
use App\Models\MaterialIn;
use Illuminate\Http\Request;
use App\Functions\GlobalFunction;
use App\Http\Controllers\Controller;

class MaterialInController extends Controller
{

    protected $global;

    public function __construct(GlobalFunction $global) {
        $this->global = $global;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Bahan Masuk',
            'materialIn' => MaterialIn::orderBy('id', 'desc')->get()
        ];

        return view('backend.material_in.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Stok Bahan',
            'materials' => Material::where('status', 1)->orderBy('id', 'desc')->get()
        ];

        return view('backend.material_in.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = [
            'material' => ['required'],
            'stock' => ['required']
        ];

        $request->validate($validate);

        $material = $request->material;
        $stock = $request->stock;

        if($stock <= 0) {
            $notificationStock = array(
                'message' => 'Stok harus lebih dari 0 (NOL)',
                'alert-type' => 'info'
            );

            return redirect()->route('material_in.create')->with($notificationStock);
        }

        $data = [
            'material_id' => $material,
            'stock_in' => $stock,
            'date_in' => date('Y-m-d'),
        ];

        $result = MaterialIn::create($data);

        if($result) {

            $this->global->stockIn($material, $result->stock_in);

                $notification = array(
                    'message' => 'Data Berhasil di Simpan',
                    'alert-type' => 'success'
                );

                return redirect()->route('material_in.index')->with($notification);
            } else {

                $notification = array(
                    'message' => 'Data Gagal di Simpan',
                    'alert-type' => 'error'
                );

                return redirect()->route('material_in.index')->with($notification);
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
        //
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {
        $in = MaterialIn::where('id', $id)->first();

        if(empty($in)) {
            $notificationErr = array(
                'message' => 'Terjadi Kesalahan',
                'alert-type' => 'error'
            );

            return redirect()->route('material_in.index')->with($notificationErr);
        }

        $material = Material::where('id', $in->material_id)->first();

        if(empty($material)) {
            $notificationErr = array(
                'message' => 'Terjadi Kesalahan',
                'alert-type' => 'error'
            );

            return redirect()->route('material_in.index')->with($notificationErr);
        }

        $stockIn = $in->stock_in;
        $materialStock = $material->stock;

        if(($stockIn > $materialStock) || ($materialStock < $stockIn)) {
            $notificationNot = array(
                'message' => 'Stok Bahan Tidak Mencukupi, Anda tidak dapat membatalkan stok masuk.',
                'alert-type' => 'error'
            );
            return redirect()->route('material_in.index')->with($notificationNot);
        } else {
            $result = MaterialIn::destroy($id);

            if($result) {

                    $this->global->stockReduction($material->id, $in->stock_in);

                    $notification = array(
                        'message' => 'Data Berhasil di Batalkan',
                        'alert-type' => 'success'
                    );

                    return redirect()->route('material_in.index')->with($notification);
                } else {

                    $notification = array(
                        'message' => 'Data Gagal di Batalkan',
                        'alert-type' => 'error'
                    );

                    return redirect()->route('material_in.index')->with($notification);
            }

        }

    }
}


