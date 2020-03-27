<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

      if (!Schema::hasTable('posts')) {
    //
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->Text('title');
            $table->enum('category', ['art', 'social', 'sport']);
            $table->longText('description');
            $table->timestamps();
        });
    }

  }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
