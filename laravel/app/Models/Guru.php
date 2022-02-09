<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'guru';
    protected $fillable = [
        'nama',
        'nip',
        'jabatan',
        'pendidikan',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'telp',
        'alamat',
        'photo'
    ];

    public function allData()
    {
        return DB::table('guru')->get();
    }

    public function detailData($id)
    {
        return DB::table('guru')->where('id', '=', $id)->first();
    }

    public function updateData($id, $data)
    {
        DB::table('guru')->where('id', '=', $id)->update($data);
    }
}
