<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengguna extends Model
{
    use HasFactory;

    public $incrementing = true;
    protected $table = 'tb_member';
    protected $fillable = ['nama', 
                            'alamat', 
                            'jenis_kelamin', 
                            'tlp'];
}
