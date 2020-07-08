<?php

namespace App\Models\Worker;

use Illuminate\Database\Eloquent\Model;

use App\Models\Worker\Worker;
use App\Models\Worker\WorkerLabor;

class WorkerDay extends Model
{
    protected $dates = ['date'];
    
    public function worker()
    {
      return $this->belongsTo(Worker::class);
    }

    public function workerLabors()
    {
      return $this->hasMany(WorkerLabor::class);
    }
}
