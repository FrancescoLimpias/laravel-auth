<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            // Post Attributes
            $table->string("title", 50);
            $table->text("description");
            $table->string("tags", 50)->nullable();
            $table->date("project_date");
            $table->text("img")->nullable(); //Image url
            $table->text("repo")->nullable(); //Repo url

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
        Schema::dropIfExists('posts');
    }
};
