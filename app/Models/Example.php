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

    public static function GetExampleById($id)
    {
        return DB::table('example')->where('id', $id)->first();
    }

    public static function SaveExample($data)
    {
        $id = DB::table('example')->insertGetId($data);
        return $id;
    }

    public static function UpdateExample($id, $data)
    {
        return DB::table('example')->where('id', $id)->update($data);
    }

    public static function DeleteExample($id)
    {
        return DB::table('example')->where('id', $id)->delete();
    }
}
