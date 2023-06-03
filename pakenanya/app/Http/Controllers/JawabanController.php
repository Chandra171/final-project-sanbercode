<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jawaban;
use illuminate\Support\Facades\File;
use illuminate\Support\Facades\Auth;
use Alert;


class JawabanController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'jawaban' => 'required'
        ]);

        $id = Auth::id();
        $jawaban = new Jawaban;

        $jawaban->jawaban = $request->jawaban;
        $jawaban->pertanyaan_id = $request->pertanyaan_id;
        $jawaban->user_id = $id;

        $jawaban->save();

        Alert::success('Berhasil', 'Jawaban Berhasil di simpan');
        return redirect('/pertanyaan/'.$request->pertanyaan_id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jawaban = Jawaban::find($id);
        return view ('jawaban.show', compact('jawaban'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jawaban = Jawaban::find($id);
        
        return view('jawaban.edit', compact('jawaban'));
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
            'jawaban' => 'required'
        ]);

        $user_id = Auth::id();
        $jawaban = Jawaban::find($id);

        $jawaban->jawaban = $request->jawaban;
        $jawaban->pertanyaan_id = $request->pertanyaan_id;
        $jawaban->user_id = $user_id;
        $jawaban->save();

        Alert::success('Berhasil', 'Jawaban Berhasil di Edit');
        return redirect('/pertanyaan/'.$request->pertanyaan_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jawaban = Jawaban::find($id);
        $pertanyaan_id = $jawaban->pertanyaan_id;

        $jawaban->delete();

        Alert::success('Berhasil', 'Jawaban Berhasil dihapus');
        return redirect('/pertanyaan/'. $pertanyaan_id);
    }
}
