<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->enum('box_type',['vegetarian', 'gourmet'])->notNull();
            $table->string('title')->notNull()->unique();
            $table->string('slug')->notNull()->unique();
            $table->string('short_title')->default('');
            $table->text('marketing_description')->notNull();
            $table->integer('calories_kcal')->notNull()->default(0);
            $table->integer('protein_grams')->notNull()->default(0);
            $table->integer('fat_grams')->notNull()->default(0);
            $table->integer('carbs_grams')->notNull()->default(0);
            $table->string('bulletpoint1')->default('');
            $table->string('bulletpoint2')->default('');
            $table->string('bulletpoint3')->default('');
            $table->string('recipe_diet_type_id',['meat','fish','vegetarian'])->notNull()->default('meat');
            $table->string('season',['all','spring','summer','autumn','winter'])->notNull();
            $table->string('base')->default('');
            $table->string('protein_source')->notNull();
            $table->integer('preparation_time_minutes')->notNull()->default(0);
            $table->integer('shelf_life_days')->notNull()->default(0);
            $table->string('equipment_needed')->notNull()->default('Appetite');
            $table->text('origin_country')->notNull()->default('Great Britain');
            $table->string('recipe_cuisine',['asian','italian','british','mediterranean','mexican'])->notNull()->default('british');
            $table->text('in_your_box')->default('');
            $table->integer('gousto_reference')->notNull();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}
