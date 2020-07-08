<?php

namespace App\Models\User;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Account\Account;



class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRoleAttribute($value)
    {
      $rawStatus = [
        '1'=> ['id'=>'1','name'=>'SUPERADMIN'],
        '2'=> ['id'=>'2','name'=>'ADMIN'],
        '3'=> ['id'=>'3','name'=>'ANALISTA'],
        '4'=> ['id'=>'4','name'=>'DIGITALIZADOR'],
      ];
      return $rawStatus[$value];
    }

    public function getFullNameAttribute()
    {
      return $this->first_name.' '.$this->last_name;
      
    }
    public function account()
    {
      return $this->belongsTo(Account::class);
    }



    
}
