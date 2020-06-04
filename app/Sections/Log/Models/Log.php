<?php

namespace App\Sections\Log\Models;

use Illuminate\Support\Str;
use App\Sections\Site\Models\Site;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    /**
     * The attributes that can be ordered by.
     *
     * @var array
     */
    public $orderable = ['date'];

    public $fillable = ['date', 'message', 'level', 'site_id', 'user_id', 'md5'];

    const EXCERPT_LIMIT = 200;

    public $appends = ['site_name', 'message_excerpt'];

    public $dates = ['date'];

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function getSiteNameAttribute()
    {
        return $this->site->name;
    }

    public function getMessageExcerptAttribute()
    {
        return Str::limit($this->message, static::EXCERPT_LIMIT, "...");
    }

    public function getLogHeaderAttribute()
    {
        return "[$this->site_name] - $this->level - $this->date";
    }

    public function getMd5()
    {
        return md5(json_encode([ 
            $this->message,
            $this->level,
            $this->date,
            $this->site_id,
        ]));
    }

    public function hasSimilar()
    {
        return static::where('md5', $this->getMd5())->exists();
    }
}