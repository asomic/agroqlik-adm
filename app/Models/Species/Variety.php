<?php

namespace App\Models\Species;

use Illuminate\Database\Eloquent\Model;
use App\Models\Species\Specie;

class Variety extends Model
{
    public function specie()
    {
      return $this->belongsTo(Specie::class);
    }
}
