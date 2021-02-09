<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserPostCreationPermission extends Migration
{
    
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_auther')->after('email')->default(false);
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_auther');
        });
    }
}
