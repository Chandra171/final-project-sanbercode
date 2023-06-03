<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use illuminate\Support\Facades\Auth;
use Alert;

class ProfileController extends Controller
{
    public function index() {
        $id = Auth::id();

        $profile = Profile::where('user_id', $id)->first();

        return view('profile.index', compact('profile'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'umur' => 'required',
            'alamat' => 'required',
            'bio' => 'required',
        ]);

        $profile = Profile::find($id);
        
        $profile->umur = $request->umur;
        $profile->alamat = $request->alamat;
        $profile->bio = $request->bio;

        $profile->save();
        Alert::success('Berhasil', 'Data Berhasil diedit');

        return redirect('/profile');
    }

    public function destroy($id) {
        //
    }

}
