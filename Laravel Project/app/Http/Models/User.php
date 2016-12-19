<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticattable;
class User extends Authenticattable
{
    protected $guarded=(['id']);
}
