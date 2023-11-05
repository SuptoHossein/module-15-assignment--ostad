<?php

namespace App\Models;

use App\Models\Scopes\UserScope;
use Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function booted(): void
    {
        static::addGlobalScope(new UserScope);

        static::creating(function($item){
            $item->user_id = Helper::authUserId();
        });
    }
}
