<?php

namespace App\Listeners;

use Illuminate\Support\Facades\DB;

class UpdateAutoIncrement
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $table = $event->getTable();

        DB::statement("
            SET @max_id = (SELECT MAX(id) FROM {$table});
            SET @new_ai = @max_id + 1;
            ALTER TABLE {$table} AUTO_INCREMENT = @new_ai;
        ");
    }
}
