<?php

namespace App\Observers;

use App\Sections\Log\Models\Log;

class LogObserver
{
    public function saving(Log $log)
    {
        $log->md5 = $log->md5 ?: $log->getMd5();

        return true;
    }
}
