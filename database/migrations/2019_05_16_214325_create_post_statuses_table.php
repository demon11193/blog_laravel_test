<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Blog\PostStatus;

class CreatePostStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_statuses', function (Blueprint $table) {
            $table->smallInteger('id')->primary();
            $table->string("name");
        });

        DB::table('post_statuses')
            ->insert([
                ['id' => PostStatus::STATUS_DELETED, 'name' => 'Удалено'],
                ['id' => PostStatus::STATUS_CREATED, 'name' => 'Создано'],
                ['id' => PostStatus::STATUS_PUBLISHED, 'name' => 'Опубликовано']
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_statuses');
    }
}
