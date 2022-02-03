<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class outlet extends Model
{
    use HasFactory;

    public $incrementing = true;
    protected $table = 'outlets';
    protected $fillable = ['nama', 
                            'alamat', 
                            'tlp'];

    public function paket(){
        return $this->belongsTo(paket::class);
    }

}
