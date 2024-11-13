<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CandidateController extends Controller
{
    public function index() {
        $candidate = Candidate::all();
        return view('candidate.index', [
            'candidate' => $candidate,
        ]);
    }

    public function create() {
        return view('candidate.create');
    }

    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required|max:45',
            'description' => 'required|min:5',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ],
        [
            'name.required' => 'Nama wajib diisi',
            'name.max' => 'Nama maksimal 45 karakter',
            'photo.max' => 'Foto maksimal 2 Mb',
            'photo.mimes' => 'File ekstensi hanya bisa jpg,png,jpeg,gif, svg',
            'photo.image' => 'File harus berbentuk image'
        ]);

        if(!empty($request->photo)) {
            // proses akan dijalankan
            $fileName = 'photo-' . uniqid() . '.' . $request->photo->extension();
            // setelah fotonya dipastikan sudah masuk, pindahkan ke public
            $request->photo->move(public_path('image'), $fileName);
        } else {
            $fileName = 'nophoto.jpg';
        }

        // tambahkan data ke tabel Candidates
        DB::table('candidates')->insert([
            'name'=>$request->name,
            'description'=>$request->description,
            'photo' => $fileName,
        ]);

        return redirect()->route('index.index');
    }

    public function edit(Candidate $id)
    {
        return view('candidate.edit', compact('id'));
    }

    public function update(Request $request, string $id) {
        $request->validate([
            'name' => 'required|max:45',
            'description' => 'required|min:5',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ],
        [
            'name.required' => 'Nama wajib diisi',
            'name.max' => 'Nama maksimal 45 karakter',
            'photo.max' => 'Foto maksimal 2 Mb',
            'photo.mimes' => 'File ekstensi hanya bisa jpg,png,jpeg,gif,svg',
            'photo.image' => 'File harus berbentuk image'
        ]);

        // foto lama
        $oldPhoto = DB::table('candidates')->select('photo')->where('id', $id)->get();
        foreach($oldPhoto as $photo1) {
            $oldPhoto = $photo1->photo;
        }

        //jika foto sudah ada yang terupload
        if(!empty($request->photo)) {
            // maka jalankan proses
            if(!empty($oldPhoto->photo)) unlink(public_path('image' . $oldPhoto->photo));

            // proses ganti foto
            $fileName = 'photo-' . $request->id . '.' . $request->photo->extension();
            // setelah fotonya dipastikan sudah masuk, pindahkan ke public
            $request->photo->move(public_path('image'), $fileName);
        } else {
            $fileName = $oldPhoto;
        }

        DB::table('candidates')->where('id', $id)->update([
            'name'=> $request->name,
            'description'=> $request->description,
            'photo' => $fileName,
        ]);

        return redirect()->route('index.index');
    }

}
