<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePollsTable extends Migration
{
    public function up()
    {
        Schema::table('polls', function (Blueprint $table) {
            $table->boolean('singleton')->default(true)->unique();
        });
    }

    public function down()
    {
        Schema::table('polls', function (Blueprint $table) {
            $table->dropColumn('singleton');
        });
    }
}
