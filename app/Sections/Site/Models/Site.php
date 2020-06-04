<?php

namespace App\Sections\Site\Models;

use App\User;
use App\Sections\Log\Models\Log;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    /**
     * The attributes that can be ordered by.
     *
     * @var array
     */
    public $orderable = [];

    public $fillable = ['name', 'callback', 'user_id'];

    public function logs()
    {
        return $this->hasMany(Log::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}