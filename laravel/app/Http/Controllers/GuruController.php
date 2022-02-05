<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;

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
}
