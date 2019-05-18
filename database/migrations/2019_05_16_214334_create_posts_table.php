<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Blog\PostStatus;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("link")->unique();
            $table->smallInteger("post_status_id")->default(PostStatus::STATUS_CREATED);
            $table->unsignedBigInteger("actual_revision_id");
            $table->timestamps();

            $table->foreign("post_status_id")
                ->references('id')
                ->on('post_statuses');
        });

        Schema::table('revisions', function (Blueprint $table) {
            $table->foreign("post_id")
                ->references('id')
                ->on('posts')
                ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('revisions', function(Blueprint $table){
            $table->dropForeign('revisions_post_id_foreign');
        });
        Schema::dropIfExists('posts');
    }
}
