<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class DatabaseUpdated
{
    use Dispatchable, SerializesModels;

    public function __construct()
    {
        // يمكن إضافة خصائص إذا كنت بحاجة إليها
    }
}
