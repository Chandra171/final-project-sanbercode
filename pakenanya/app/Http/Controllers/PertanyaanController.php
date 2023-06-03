<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;
use File;
use illuminate\Support\Facades\Auth;
use Alert;


class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pertanyaan = Pertanyaan::all();
        $user = User::all();
        return view('pertanyaan.index', compact('pertanyaan', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('pertanyaan.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'pertanyaan' => 'required',
    		'gambar' => 'required|mimes:png, jpg, jpeg|max:2048',
            'kategori_id' => 'required'
        ]);

        $id = Auth::id();
  
        $namaGambar = time().'.'.$request->gambar->extension();  
   
        $request->gambar->move(public_path('images'), $namaGambar);

        $pertanyaan = new Pertanyaan;
 
        $pertanyaan->pertanyaan = $request->pertanyaan;
        $pertanyaan->kategori_id = $request->kategori_id;
        $pertanyaan->user_id = $id;
        $pertanyaan->gambar = $namaGambar;

        $pertanyaan->save();

        Alert::success('Berhasil', 'Pertanyaan Berhasil disimpan');
        return redirect('/pertanyaan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pertanyaan = Pertanyaan::find($id);
        $kategori = Kategori::all();

        return view('pertanyaan.show', compact('pertanyaan', 'kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pertanyaan = Pertanyaan::find($id);
        $kategori = Kategori::all();
        return view ('pertanyaan.edit', compact('pertanyaan', 'kategori'));
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
        $request->validate([
            'pertanyaan' => 'required',
    		'gambar' => 'required|mimes:png, jpg, jpeg|max:2048',
            'kategori_id' => 'required'
        ]);

        $pertanyaan = Pertanyaan::find($id);
        $namaGambar = $pertanyaan->gambar;

        if($request->has('gambar')){
            $path = "images/";
            file::delete($path . $pertanyaan->gambar);

            $namaGambar = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('images'), $namaGambar);
            $pertanyaan->gambar = $namaGambar;
            $pertanyaan->save();
        }
        
        $pertanyaan->pertanyaan = $request->pertanyaan;
        $pertanyaan->kategori_id = $request->kategori_id;

        $pertanyaan->save();

        Alert::success('Berhasil', 'Pertanyaan Berhasil diedit');
        return redirect('/pertanyaan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pertanyaan = Pertanyaan::find($id);
        $path = 'images/';
        file::delete($path, $pertanyaan->gambar);
        $pertanyaan->delete();

        Alert::success('Berhasil', 'Pertanyaan Berhasil dihapus');
        return redirect('/pertanyaan');
    }

    public function isOwner()
    {
        $users = User::all();
        return Auth::user()->id == $this->$users->id;
    }

}
