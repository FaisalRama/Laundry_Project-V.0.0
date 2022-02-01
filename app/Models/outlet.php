<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class outlet extends Model
{
    use HasFactory;

    public $incrementing = true;
    protected $table = 'tb_outlet';
    protected $fillable = ['nama', 
                            'alamat', 
                            'tlp'];
}
