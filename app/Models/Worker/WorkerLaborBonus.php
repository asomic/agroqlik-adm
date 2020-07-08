<?php

namespace App\Models\Worker;

use Illuminate\Database\Eloquent\Model;

class WorkerLaborBonus extends Model
{
    protected $fillable = ['worker_labor_id','bonus_type','amount'];
}
