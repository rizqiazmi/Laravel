<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UpdateUserTableNameToUsername extends Migration
{
    public function up()
    {
        DB::statement('ALTER TABLE users CHANGE name username VARCHAR(255)');
    }

    public function down()
    {
        DB::statement('ALTER TABLE users CHANGE username name VARCHAR(255)');
    }
}
