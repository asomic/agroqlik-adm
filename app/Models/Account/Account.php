<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Model;
use App\Models\Worker\Worker;
use App\Models\User\User;
use App\Models\Farmland\Farmland;
use App\Models\Plan\Plan;

use Freshwork\ChileanBundle\Rut;


class Account extends Model
{
    public function getRutFormatedAttribute()
    {
      return Rut::set($this->rut)->fix()->format(); 
    }
    
    public function workers()
    {
      return $this->hasMany(Worker::class)->where('status',1);
    }

    public function inactiveWorkers()
    {
      return $this->hasMany(Worker::class)->where('status',0);
    }

    public function allWorkers()
    {
      return $this->hasMany(Worker::class);
    }
    
    public function users()
    {
      return $this->hasMany(User::class);
    }
    public function farmlands()
    {
      return $this->hasMany(Farmland::class);
    }
    public function plan()
    {
      return $this->belongsTo(Plan::class);
    }
}

