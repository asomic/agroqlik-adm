<?php

namespace App\Models\Farmland;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
//models
use App\Models\Farmland\CostCenter;
use App\Models\Worker\WorkerLabor;
use App\Models\Worker\WorkerDay;
use App\Models\User\User;
use App\Models\Account\Account;

class Farmland extends Model
{
    use SoftDeletes;
    
    public function costCenters()
    {
      return $this->hasMany(CostCenter::class);
    }
    public function account()
    {
      return $this->belongsTo(Account::class);
    }
    public function users()
    {
      return $this->hasMany(User::class);
    }

    public function workerLabors($date)
    {
      return $this->hasManyThrough(WorkerLabor::class,CostCenter::class)->whereDate('date',$date);
    }

    public function workerDays($date)
    {
      return $this->hasMany(WorkerDay::class)->whereDate('date',$date);
    }

}
