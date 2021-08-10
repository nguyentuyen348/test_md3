<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $table='status';

    public function agency(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Agency::class);
    }
}
