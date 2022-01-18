<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewToTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->timestamp('finished_at')->nullable();
            $table->unsignedBigInteger('child_id');
            $table->foreign('child_id')
                ->references('id')->on('children')
                ->onDelete('cascade');
            $table->boolean('periodic_nonperiodic')->nullable();
            $table->string('picture')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            //
        });
    }
}
