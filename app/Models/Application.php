<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    public function kartu_kunings()
    {
        return $this->belongsTo(KartuKuning::class, 'kartu_kuning_id');
    }

    public function jobs()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }
}
