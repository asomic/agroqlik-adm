<?php

namespace App\Models\Worker;

use Illuminate\Database\Eloquent\Model;
use App\Models\Farmland\CostCenter;
use App\Models\Farmland\Farmland;
use App\Models\Labor\Labor;
use App\Models\Worker\Worker;
use App\Models\Worker\WorkerDay;
// use App\Models\Worker\WorkerLaborBonus;

class WorkerLabor extends Model
{
  protected $dates = ['date'];

  //getters
  public function getLaborTypeAttribute($value)
  {
    $rawStatus = [
      '1'=> ['id'=>'1','text'=>'Jornada'],
      '2'=> ['id'=>'2','text'=>'Trato'],
      '3'=> ['id'=>'3','text'=>'Hora extra'],
    ];
    return $rawStatus[$value];
  }

  //relaciones

    public function worker()
    {
      return $this->belongsTo(Worker::class);
    }
    public function workerDay()
    {
      return $this->belongsTo(WorkerDay::class);
    }
    public function costCenter()
    {
      return $this->belongsTo(CostCenter::class)->withTrashed();
    }
    public function labor()
    {
      return $this->belongsTo(Labor::class);
    }


    // public function bonuses()
    // {
    //   return $this->hasMany(WorkerLaborBonus::class);
    // }

    // //bonos
    // public function colacion()
    // {
    //   $bonus = $this->bonuses()->where('bonus_type', 1)->first();
    //   if(!$bonus){
    //     return 0;
    //   } else {
    //     return $bonus->amount;
    //   }
    // }
    // public function transporte()
    // {
    //   $bonus = $this->bonuses()->where('bonus_type', 2)->first();
    //   if(!$bonus){
    //     return 0;
    //   } else {
    //     return $bonus->amount;
    //   }
    // }
    // public function produccion()
    // {
    //   $bonus = $this->bonuses()->where('bonus_type', 3)->first();
    //   if(!$bonus){
    //     return 0;
    //   } else {
    //     return $bonus->amount;
    //   }
    // }
    // public function otro()
    // {
    //   $bonus = $this->bonuses()->where('bonus_type', 4)->first();
    //   if(!$bonus){
    //     return 0;
    //   } else {
    //     return $bonus->amount;
    //   }
    // }



}
