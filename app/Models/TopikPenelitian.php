<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopikPenelitian extends Model
{
    // Kasih tau Laravel nama tabelnya
    protected $table = 'topik_penelitian_0292';
    
    // Set false karena kita gak pake kolom created_at dan updated_at bawaan Laravel
    public $timestamps = false; 

    // Kolom apa aja yang boleh diisi (mass assignable)
    protected $fillable = [
        'topik', 
        'rumpun_ilmu', 
        'kata_kunci', 
        'deskripsi'
    ];
}