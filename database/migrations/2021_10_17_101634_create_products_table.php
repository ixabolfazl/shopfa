<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('introduction');
            $table->string('slug')->nullable()->unique();
            $table->text('image')->nullable();
            $table->decimal('weight', 10, 2)->nullable()->comment('unit g');
            $table->decimal('length', 10, 1)->nullable()->comment('unit cm');
            $table->decimal('width', 10, 1)->nullable()->comment('unit cm');
            $table->decimal('height', 10, 1)->nullable()->comment('unit cm');
            $table->decimal('price', 20, 1);
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('marketable')->default(0)->comment('1 => marketable , 0 => not marketable');
            $table->text('tags');
            $table->integer('sold_number')->default(0);
            $table->integer('frozen_number')->default(0);
            $table->integer('marketable_number')->default(0);
            $table->foreignId('brand_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('product_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamp('published_at');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
