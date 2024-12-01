<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Example extends Model
{
    // Tentukan tabel jika nama tabel tidak sesuai dengan nama model (optional)
    protected $table = 'exemple';

    // Tentukan kolom mana yang boleh diisi secara massal (optional)
    protected $fillable = ['id', 'example', 'created_at', 'updated_at'];

    public static function Getexample()
    {
        return DB::table('example')->get();
    }
}
