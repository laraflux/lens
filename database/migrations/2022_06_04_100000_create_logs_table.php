<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration
{
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->nullableMorphs('loggable');
            $table->foreignId('user_id')->nullable()->index();
            $table->string('event');
            $table->json('changes')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('logs');
    }
}
