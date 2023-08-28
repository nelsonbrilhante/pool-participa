<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropTableColumnFromVoters extends Migration
{
    public function up()
    {
        Schema::table('voters', function (Blueprint $table) {
            $table->dropColumn('table'); // Drop the column
        });
    }

    public function down()
    {
        Schema::table('voters', function (Blueprint $table) {
            $table->string('table'); // Add the column back if needed
        });
    }
}
