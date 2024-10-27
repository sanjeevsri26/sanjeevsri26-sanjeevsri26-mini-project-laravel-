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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('subcategories');
            $table->unsignedBigInteger('parent_id')->nullable();  // Parent category, can be null.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};

Schema::table('categories', function (Blueprint $table) {
    $table->unsignedBigInteger('parent_id')->nullable()->after('categoryName');
    $table->foreign('parent_id')->references('id')->on('categories')->onDelete('cascade');
});
