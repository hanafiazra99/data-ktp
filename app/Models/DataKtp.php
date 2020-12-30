<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKtp extends Model
{
    use HasFactory;
    protected $table = 'data_penduduk';
    protected $fillable = ['user_id','provinsi','kota','nik','nama','tempat_lahir','tanggal_lahir','jenis_kelamin','alamat','agama','status_perkawinan','pekerjaan'];
}
