<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsumen extends Model
{
    use HasFactory;

    public $table = "tbl_konsumen";

    protected $primaryKey = 'id_konsumen';

    protected $fillable = [
        'id_konsumen', 'nama', 'alamat', 'no_hp', 'foto'
    ];
}
