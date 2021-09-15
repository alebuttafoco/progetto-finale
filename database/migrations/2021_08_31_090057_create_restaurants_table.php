<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('address');
            $table->string('cap'); //come stringa perche' Faker lo genera AAAAA-AAAA
            $table->string('city');
            $table->text('description')->nullable();
            $table->bigInteger('piva')->unique(); //11 cifre

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
        Schema::table('plates', function (Blueprint $table) {
            $table->dropForeign('plates_category_id_foreign');
            $table->dropColumn('restaurant_id');
        });
        Schema::dropIfExists('restaurants');
    }
}