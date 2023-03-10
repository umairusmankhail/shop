<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('p_name');
            $table->string('item_no')->nullable();
            $table->string('authorize')->nullable();
            $table->string('category_id')->nullable();
            $table->string('subcategory')->nullable();
            $table->string('size')->nullable();
            $table->string('size_unit')->nullable();
            $table->string('weight')->nullable();
            $table->string('w_unit')->nullable();
            $table->string('color')->nullable();
            $table->string('p_trem')->nullable();
            $table->string('currency')->nullable();
            $table->string('moq')->nullable();
            $table->string('moq_unit')->nullable();
            $table->string('m_grade')->nullable();
            $table->string('price')->nullable();
            $table->string('p_unit')->nullable();
            $table->string('p_qty')->nullable();
            $table->string('price_qty_unit')->nullable();
            $table->string('g_w_kg')->nullable();
            $table->string('lenght')->nullable();
            $table->string('height')->nullable();
            $table->string('width')->nullable();
            $table->string('m3ctn')->nullable();
            $table->string('hs_code')->nullable();
            $table->string('in_pack')->nullable();
            $table->string('inn_pack_unit')->nullable();
            $table->string('mid_pack')->nullable();
            $table->string('mid_pack_unit')->nullable();
            $table->string('big_pack')->nullable();
            $table->string('big_pack_unit')->nullable();
            $table->string('thickness')->nullable();
            $table->string('thickness_unit')->nullable();
            $table->string('add_element')->nullable();
            $table->string('description')->nullable();
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
