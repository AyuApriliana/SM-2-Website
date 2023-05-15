<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Laporan::latest()->get();
        return view('laporan.index',['data'=> $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'image'                 => 'required',
            'location'              => 'required',
            'description'           => 'required',
            'laporan_diproses'      => 'required',
            'laporan_selesai'       => 'required',
        ]);

        Laporan::create([
            'image'                 => $request->image,
            'location'              => $request->location,
            'description'           => $request->description,
            'laporan_diproses'      => $request->laporan_diproses,
            'laporan_selesai'       => $request->laporan_selesai,
        ]);

        return redirect()->route('laporan.index')->with(['success' => 'berhasil']);
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
        $this->validate($request,[
            'image'                 => 'required',
            'location'              => 'required',
            'description'           => 'required',
            'laporan_diproses'      => 'required',
            'laporan_selesai'       => 'required',
        ]);

        //update data
        DB::table('laporans')->where('id_laporan',$id)->update([
            'image'                 => $request->image,
            'location'              => $request->location,
            'description'           => $request->description,
            'laporan_diproses'      => $request->laporan_diproses,
            'laporan_selesai'       => $request->laporan_selesai,

        ]);
        return redirect()->route('laporan.index')->with(['success' => 'berhasil']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('laporans')->where('id_laporan',$id)->delete();
        return redirect()->route('laporan.index')->with(['success' => 'berhasil']);
    }
}
