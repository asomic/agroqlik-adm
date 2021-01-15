<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function getStatusAttribute($value)
    {
      $rawStatus = [
        '1'=> ['id'=>'1','text'=>'pendiente','css'=>'danger'],
        '2'=> ['id'=>'2','text'=>'pagado','css'=>'success'],
      ];
      return $rawStatus[$value];
    }

    public function getTypeAttribute($value)
    {
      $rawType = [
        '1'=> ['id'=>'1','text'=>'Transferencia'],
        '2'=> ['id'=>'2','text'=>'flow'],
      ];
      return $rawType[$value];
    }

    public function account()
    {
      return $this->belongsTo(App\Models\Account\Account::class);
    }

    public function plan()
    {
      return $this->belongsTo(App\Models\Plan\Plan::class);
    }
}
