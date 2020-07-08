<?php

namespace App\Models\Farmland;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// Models
use App\Models\Farmland\Farmland;
use App\Models\Species\Variety;


class CostCenter extends Model
{
  use SoftDeletes;

  public function farmland()
  {
    return $this->belongsTo(Farmland::class)->withTrashed();
  }
  
  public function variety()
  {
    return $this->belongsTo(Variety::class);
  }
}
