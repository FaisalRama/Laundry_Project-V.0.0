<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paket extends Model
{
    use HasFactory;

    public $incrementing = true;
    protected $table = 'pakets';
    protected $fillable = ['id_outlet', 
                            'jenis', 
                            'nama_paket', 
                            'harga'];

    // Relasi dengan TB_Outlet
    public function outlet(){
        return $this -> belongsTo(outlet::class, "id_outlet");
    }
}
