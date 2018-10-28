<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePostsUpdatedAtDefault extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function(Blueprint $table) {
            DB::connection()->getPdo()->exec('alter table posts MODIFY  COLUMN updated_at timestamp default CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function(Blueprint $table) {
            DB::connection()->getPdo()->exec('alter table posts MODIFY  COLUMN updated_at timestamp default CURRENT_TIMESTAMP;');
        });
    }
}
