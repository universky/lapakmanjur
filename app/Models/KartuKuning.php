<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KartuKuning extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function personals()
    {
        return $this->belongsTo(Personal::class, 'kartu_kuning_id');
    }

    public function applications()
    {
        return $this->hasMany(Application::class, 'kartu_kuning_id');
    }

    public function rekom_passports()
    {
        return $this->belongsTo(RekomPassport::class, 'kartu_kuning_id');
    }
}
