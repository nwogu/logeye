<?php

namespace App;

use App\Sections\Site\Models\Site;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'company', 'website', 'phone', '_token'
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

    public static function fromToken($token)
    {
        return static::where('_token', $token)->first();
    }

    public function generateToken()
    {
        $this->_token = bin2hex(random_bytes(32));

        return $this->_token;
    }

    public function sites()
    {
        return $this->hasMany(Site::class);
    }
}
