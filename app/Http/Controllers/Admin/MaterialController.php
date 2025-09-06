<?php

namespace App\Http\Controllers\Admin;

use App\Models\Unit;
use App\Models\Material;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Data Bahan',
            'count' => Material::count(),
            'materials' => Material::orderBy('id', 'desc')->get()
        ];

        return view('backend.material.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Bahan',
             'units' => Unit::where('status', 1)->orderBy('id', 'desc')->get()
        ];

        return view('backend.material.add', $data);

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
            'name' => ['required'],
            'unit' => ['required'],
            'status' => ['required']
        ];

        $request->validate($validate);

        $name = $request->name;
        $unit = $request->unit;
        $status = $request->status;
        $stock = 0;

        $data = [
            'name' => $name,
            'stock' => $stock,
            'unit_id' => $unit,
            'status' => $status
        ];

        $result = Material::create($data);

        if($result) {

            $notification = array(
                'message' => 'Data Berhasil di Simpan',
                'alert-type' => 'success'
		    );

		    return redirect()->route('materials.index')->with($notification);

        } else {
            $notification = array(
                'message' => 'Data Gagal di Simpan',
                'alert-type' => 'error'
            );

            return redirect()->route('materials.create')->with($notification);
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

        $material = Material::where('id', $id)->first();

         $data = [
            'title' => 'Edit Bahan ' . $material->name,
            'units' => Unit::where('status', 1)->orderBy('id', 'desc')->get(),
            'data' => $material
        ];

        return view('backend.material.edit', $data);
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
            'name' => ['required'],
            'unit' => ['required'],
            'status' => ['required']
        ];

        $request->validate($validate);

        $name = $request->name;
        $unit = $request->unit;
        $status = $request->status;

        $data = [
            'name' => $name,
            'unit_id' => $unit,
            'status' => $status
        ];

        $result = Material::where('id', $id)->update($data);

        if ($result) {

            $notification = array(
                'message' => 'Data Berhasil di Simpan',
                'alert-type' => 'success'
            );

            return redirect()->route('materials.index')->with($notification);

        } else {
            $notification = array(
                'message' => 'Data Gagal di Simpan',
                'alert-type' => 'error'
            );

            return redirect()->route('materials.edit', $id)->with($notification);
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

    public function delete($id) {
        $result = Material::destroy($id);

        if ($result) {

            $notification = array(
                'message' => 'Data Berhasil di Hapus',
                'alert-type' => 'success'
            );

            return redirect()->route('materials.index')->with($notification);

        } else {
            $notification = array(
                'message' => 'Data Gagal di Hapus',
                'alert-type' => 'error'
            );

            return redirect()->route('materials.index')->with($notification);
        }
    }
}
