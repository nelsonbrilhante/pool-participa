<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionsTable extends Migration
{
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->id();
            $table->foreignId('poll_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('project_number')->unique();
            $table->string('owner');
            $table->string('theme');
            $table->text('description'); // Changed to text to allow longer descriptions
            $table->decimal('amount', 15, 2); // Assuming you'll have values like 999,999,999,999.99
            $table->unsignedBigInteger('vote_count')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('options');
    }
}
