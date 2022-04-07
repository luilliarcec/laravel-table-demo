<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddTypeToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('type_id')->constrained('types');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table){
            $table->foreignId('type_id')->constrained('types');
        });
    }
}
