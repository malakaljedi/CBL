<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Partner extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'org_name','org_location','user_id'
    ];
}
