<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateTasksTable
 * @todo move migration into own module
 */
class CreateTasksTable extends Migration
{
    public $tablename = 'tasks';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tablename, function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('name');
            $table->string('description');
            $table->integer('estimation');
            $table->integer('prio');
            $table->boolean('highlight')->default(false);
            $table->date('created_at');
            $table->date('updated_at');
            $table->integer('TSID');
            $table->integer('PID');
            $table->integer('UID');
            $table->integer('TTID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tablename);
    }
}
