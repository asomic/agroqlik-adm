<?php

namespace App\Models\Worker;

use Illuminate\Database\Eloquent\Model;

use App\Models\Account\Account;
use App\Models\Worker\WorkerDay;
use App\Models\Worker\WorkerLabor;

use Freshwork\ChileanBundle\Rut;

class Worker extends Model
{

    public function getStatusAttribute($value)
    {
      $rawStatus = [
        '0'=> ['id'=>'0','admin'=>'inactivo','client'=>'inactivo','css'=>'danger'],
        '1'=> ['id'=>'1','admin'=>'activo','client'=>'activo','css'=>'success'],
      ];
      return $rawStatus[$value];
    }

    public function getAfpAttribute($value)
    {
      $rawStatus = [
        null => ['id'=>'0','name'=>'- sin afp -'], 
        '1'=> ['id'=>'1','name'=>'CAPITAL'],
        '2'=> ['id'=>'2','name'=>'CUPRUM'],
        '3'=> ['id'=>'3','name'=>'HABITAT'],
        '4'=> ['id'=>'4','name'=>'MODELO'],
        '5'=> ['id'=>'5','name'=>'PLANVITAL'],
        '6'=> ['id'=>'6','name'=>'PROVIDA'],
        '7'=> ['id'=>'7','name'=>'UNO'],
        '8'=> ['id'=>'8','name'=>'SISTEMA'],
      ];
      return $rawStatus[$value];
    }
    public function getSaludAttribute($value)
    {
      $rawStatus = [
        null => ['id'=>'0','name'=>'- sin salud -'], 
        '1'=> ['id'=>'1','name'=>'FONASA'],
        '2'=> ['id'=>'2','name'=>'BANMEDICA'],
        '3'=> ['id'=>'3','name'=>'COLMENA'],
        '4'=> ['id'=>'4','name'=>'CONSALUD'],
        '5'=> ['id'=>'5','name'=>'CRUZBLANCA'],
        '6'=> ['id'=>'6','name'=>'MASVIDA'],
        '7'=> ['id'=>'7','name'=>'VIDATRES'],
      ];
      return $rawStatus[$value];
    }
    public function getFullNameAttribute()
    {
      return $this->first_name.' '.$this->last_name; 
    }
    public function getRutFormatedAttribute()
    {
      return Rut::set($this->rut)->fix()->format(); 
    }
    public function getDvAttribute()
    {
      return Rut::set($this->rut)->calculateVerificationNumber(); 
    }
    
    public function Account()
    {
      return $this->belongsTo(Account::class);
    }

    public function workerDays()
    {
      return $this->hasMany(WorkerDay::class);
    }

    public function workerLabors()
    {
      return $this->hasMany(WorkerLabor::class);
    }

    public function workerDay($date)
    {
      return $this->hasOne(WorkerDay::class)->whereDate('date',$date)->first();
    }

}
