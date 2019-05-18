<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revisions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("post_id");
            $table->unsignedInteger("rubric_id");
            $table->string("name");
            $table->text("content");
            $table->unsignedBigInteger("user_id")->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign("user_id")
                ->references('id')
                ->on('users')
                ->onDelete('set null');
            $table->foreign("rubric_id")
                ->references('id')
                ->on('rubrics');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('revisions');
    }
}
