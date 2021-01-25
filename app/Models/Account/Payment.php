<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Model;

use App\Models\Account\Account;
use App\Models\Plan\Plan;

class Payment extends Model
{
  protected $dates = [
      'expiration_at',
      'paid_at'
  ];
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
      return $this->belongsTo(Account::class);
    }

    public function plan()
    {
      return $this->belongsTo(Plan::class);
    }

    public function isExpired()
    {
      //return true;
      if(( $this->status['id'] == 1) && ($this->expiration_at < today()) ) {
        return true;
      } else {
        return false;
      }
    }
}
