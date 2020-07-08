<?php

namespace App\Models\Species;

use Illuminate\Database\Eloquent\Model;

use App\Models\Species\Variety;


class Specie extends Model
{
    public function varieties()
    {
      return $this->hasMany(Variety::class);
    }
}
