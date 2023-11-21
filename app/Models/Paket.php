<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

    public $table = "tbl_paket";

    protected $primaryKey = 'id_paket';

    protected $fillable = [
        'id_paket', 'kd_paket', 'nm_paket', 'jenis_paket', 'nm_konsumen', 'tujuan', 'nm_penerima', 'foto_resi'
    ];
}
