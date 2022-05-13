<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('owner_towers', function (Blueprint $table) {
            $table->foreign('added_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
        });

        Schema::table('towers', function (Blueprint $table) {
            $table->foreign('owner_id')->references('id')->on('owner_towers')->onDelete('set null')->onUpdate('set null');
            $table->foreign('added_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
        });

        Schema::table('tasks', function (Blueprint $table) {
            $table->foreign('tower_id')->references('id')->on('towers')->onDelete('set null')->onUpdate('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->foreign('completed_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->foreign('added_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('added_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null')->onUpdate('set null');
        });
    }
}
