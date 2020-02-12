<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateAddCategoryNotificationsTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER `add_category_notifications` BEFORE INSERT ON `notifications` FOR EACH ROW
        BEGIN
            SET
              NEW.category_id = (
                Select
                  category_id
                from
                  `employers`
                WHERE
                  `employers`.id = NEW.employer_id);
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `add_category_notifications`');
    }
}
