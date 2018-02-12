<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscribersTable extends Migration
{
    public function up()
    {
        Schema::create('subscribers', function (Blueprint $table) {
            $table->integer('user_id');
            $table->integer('subscriber_id');
            $table->primary(['user_id', 'subscriber_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('subscribers');
    }
}
