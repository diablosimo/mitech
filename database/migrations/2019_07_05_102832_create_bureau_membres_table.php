<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBureauMembresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bureau_members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fonction');
            $table->softDeletes();
            $table->unsignedBigInteger('adherent_id')->nullable();
            $table->foreign('adherent_id')
                ->references('id')->on('adherents')
                ->onDelete('cascade');
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
        Schema::dropIfExists('bureau_members');
    }
}
