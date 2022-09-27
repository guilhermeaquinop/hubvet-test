<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = false;

    static public function getProductsFromSector($data)
    {
        return DB::table('products')->where('id_sector', '=', $data)->get();
    }
}
