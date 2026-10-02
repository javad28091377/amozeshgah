<?php

namespace App\Listeners;

use App\Events\LoginAdmin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNotifToAdmin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        // 
    }

    /**
     * Handle the event.
     */
    public function handle(LoginAdmin $event): void
    {
        file_put_contents("notifacation.txt","message:admin with username".$event->admin." login in date ".date("Y-m-d H:i:s").PHP_EOL,FILE_APPEND);
    }
}
