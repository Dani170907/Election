<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CandidateController extends Controller
{

    // menampillkan halaman
    public function index()
    {
        $candidates = Candidate::all(); // Ambil semua data kandidat dari database
        return view('admin.candidate.index', [
            'candidates' => $candidates,
            'title' => 'Daftar Kandidat'
        ]);
    }

    public function create() {
        return view('admin.candidate.create');
    }

    // mengirimkan data baru dengan validasi
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:45',
            'description' => 'required|min:5',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:4096',
        ],
        [
            'name.required' => 'Nama wajib diisi',
            'name.max' => 'Nama maksimal 45 karakter',
            'photo.max' => 'Foto maksimal 4 Mb',
            'photo.mimes' => 'File ekstensi hanya bisa jpg, png, jpeg, gif, svg',
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

        return redirect()->route('admin.candidate.index');

        // dd($request->all());
    }

    // mengedit data dengan validasi
    public function edit(Candidate $id)
    {
        return view('admin.candidate.edit', compact('id'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:45',
            'description' => 'required|min:5',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:4096',
        ],
        [
            'name.required' => 'Nama wajib diisi',
            'name.max' => 'Nama maksimal 45 karakter',
            'photo.max' => 'Foto maksimal 4 Mb',
            'photo.mimes' => 'File ekstensi hanya bisa jpg,png,jpeg,gif,svg',
            'photo.image' => 'File harus berbentuk image'
        ]);

        // foto lama
        $oldPhoto = DB::table('candidates')->select('photo')->where('id', $id)->get();
        foreach($oldPhoto as $photo1) {
            $oldPhoto = $photo1->photo;
        }

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

        return redirect()->route('admin.candidate.index');
        // dd($request->all());
    }

    // menghapus data
    public function destroy(Candidate $id)
    {
        $id->delete();

        return redirect()->route('admin.candidate.index')
        ->with('success', 'Data Berhasil Dihapus');
    }

}
