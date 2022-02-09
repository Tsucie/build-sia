<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use Illuminate\Support\Facades\DB;

class GuruController extends Controller
{
    public function __construct()
    {
        $this->Guru = new Guru();
    }
    
    public function index()
    {
        $data = [
            'guru' => $this->Guru->allData(),
        ];
        return view('guru.index', $data);
    }

    public function profil($id)
    {
        $guru = Guru::find($id);
        $data = [
            'guru' => $this->Guru->detailData($id),
        ];
        return view('guru.profil', ['guru' => $guru, 'data' => $data]);
    }

    public function create()
    {
        return view('guru.create');
    }

    public function insert(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|min:4',
            'nip' => 'required|numeric|min:7',
            'jabatan' => 'required|string',
            'pendidikan' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|string',
            'agama' => 'required|string',
            'telp' => 'required|string',
            'photo' => 'required|mimes:jpg,jpeg,png,jfif|max:2048',
        ]);

        $guru = $request->all();
        if ($img = $request->file('photo'))
        {
            $storePath = public_path('images');
            $profileImg = date('YmdHis').".".$img->getClientOriginalExtension();
            $img->move($storePath, $profileImg);
            $guru['photo'] = "$profileImg";
        }

        Guru::create($guru);

        return redirect()->route('guru')->with('message', 'Data guru berhasil dibuat!');
    }

    public function edit($id)
    {
        $guru = Guru::find($id);
        $data = [
            'guru' => $this->Guru->detailData($id),
        ];
        return view('guru.edit', ['guru' => $guru, 'data' => $data]);
    }

    public function update($id)
    {
        Request()->validate([
            'nama' => 'required|string|min:4',
            'nip' => 'required|numeric|min:7',
            'jabatan' => 'required|string',
            'pendidikan' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|string',
            'agama' => 'required|string',
            'telp' => 'required|string',
            'photo' => 'mimes:jpg,jpeg,png,jfif|max:2048',
        ]);
        if (Request()->photo <> "") {
            $file = Request()->photo;
            $fileName = Request()->nama . '.' . $file->extension();
            $file->move(public_path('images'), $fileName);

            $data = [
                'nama' => Request()->nama,
                'nip' => Request()->nip,
                'jabatan' => Request()->jabatan,
                'pendidikan' => Request()->pendidikan,
                'tempat_lahir' => Request()->tempat_lahir,
                'tanggal_lahir' => Request()->tanggal_lahir,
                'agama' => Request()->agama,
                'telp' => Request()->telp,
                'alamat' => Request()->alamat,
                'photo' => $fileName,
            ];
            $this->Guru->updateData($id, $data);
        }
        else
        {
            $data = [
                'nama' => Request()->nama,
                'nip' => Request()->nip,
                'jabatan' => Request()->jabatan,
                'pendidikan' => Request()->pendidikan,
                'tempat_lahir' => Request()->tempat_lahir,
                'tanggal_lahir' => Request()->tanggal_lahir,
                'agama' => Request()->agama,
                'telp' => Request()->telp,
                'alamat' => Request()->alamat,
            ];
            $this->Guru->updateData($id, $data);
        }
        return redirect()->route('guru')->with('message', 'Data guru berhasil diedit!');
    }

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        if ($guru->photo <> "")
        {
            unlink(public_path('images') . '/' . $guru->photo);
        }
        $guru->delete();
        return redirect()->route('guru')->with('message', 'Data guru berhasil dihapus!');
    }
}
