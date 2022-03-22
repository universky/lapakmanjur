<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekomPassport extends Model
{
    use HasFactory;

    public function kartu_kunings()
    {
        return $this->belongsTo(KartuKuning::class, 'kartu_kuning_id');
    }
}
