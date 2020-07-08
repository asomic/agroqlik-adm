<?php

namespace App\Models\Plan;

use Illuminate\Database\Eloquent\Model;
use App\Models\Account\Account;

class Plan extends Model
{
    public function accounts()
    {
      return $this->hasMany(Account::class);
    }
}

