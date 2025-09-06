<?php

namespace App\Http\Controllers\Admin;

use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Unit::orderBy('id', 'desc')->get();

        $data = [
            'title' => 'Data Satuan Bahan',
            'count' => Unit::count(),
            'units' => $units
        ];

        return view('backend.unit.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Satuan'
        ];

        return view('backend.unit.add', $data);
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
            'status' => ['required']
        ];

        $request->validate($validate);

        $name = $request->name;
        $status = $request->status;

        $data = [
            'name' => $name,
            'status' => $status
        ];

        $result = Unit::create($data);

        if ($result) {

            $notification = array(
                'message' => 'Data Berhasil di Simpan',
                'alert-type' => 'success'
            );

            return redirect()->route('units.index')->with($notification);

        } else {
            $notification = array(
                'message' => 'Data Gagal di Simpan',
                'alert-type' => 'error'
            );

            return redirect()->route('units.create')->with($notification);
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
        $unit = Unit::where('id', $id)->first();

        $data = [
            'title' => 'Edit Stuan ' . $unit->name,
            'data' => $unit
        ];

        return view('backend.unit.edit', $data);
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
            'status' => ['required']
        ];

        $request->validate($validate);

        $name = $request->name;
        $status = $request->status;

        $data = [
            'name' => $name,
            'status' => $status
        ];

        $result = Unit::where('id', $id)->update($data);

        if ($result) {

            $notification = array(
                'message' => 'Data Berhasil di Simpan',
                'alert-type' => 'success'
            );

            return redirect()->route('units.index')->with($notification);

        } else {
            $notification = array(
                'message' => 'Data Gagal di Simpan',
                'alert-type' => 'error'
            );

            return redirect()->route('units.edit', $id)->with($notification);
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
        //
    }

    public function delete($id)
    {
        $result = Unit::destroy($id);

        if ($result) {

            $notification = array(
                'message' => 'Data Berhasil di Hapus',
                'alert-type' => 'success'
            );

            return redirect()->route('units.index')->with($notification);

        } else {
            $notification = array(
                'message' => 'Data Gagal di Hapus',
                'alert-type' => 'error'
            );

            return redirect()->route('units.index')->with($notification);
        }
    }
}
