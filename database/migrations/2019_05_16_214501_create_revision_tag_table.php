<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevisionTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revision_tag', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("revision_id");
            $table->unsignedBigInteger("tag_id");
            $table->timestamps();

            $table->foreign("revision_id")
                ->references('id')
                ->on('revisions')
                ->onDelete("cascade");
            $table->foreign("tag_id")
                ->references('id')
                ->on('tags')
                ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('revision_tag');
    }
}
