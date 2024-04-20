<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimeStampsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_stamps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->time('punch_in')->nullable();
            $table->time('punch_out')->nullable();
            $table->time('total_work')->nullable();
            $table->time('total_break')->nullable();
            $table->timestamps();      
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('time_stamps');
    }
}
