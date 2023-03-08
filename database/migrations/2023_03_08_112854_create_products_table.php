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
            $table->string('item_no');
            $table->string('authorize');
            $table->string('category_id');
            $table->string('subcategory');
            $table->string('size');
            $table->string('size_unit');
            $table->string('weight');
            $table->string('w_unit');
            $table->string('color');
            $table->string('p_trem');
            $table->string('currency');
            $table->string('moq');
            $table->string('moq_unit');
            $table->string('m_grade');
            $table->string('price');
            $table->string('p_unit');
            $table->string('p_qty');
            $table->string('price_qty_unit');
            $table->string('g_w_kg');
            $table->string('lenght');
            $table->string('height');
            $table->string('width');
            $table->string('m3ctn');
            $table->string('hs_code');
            $table->string('in_pack');
            $table->string('inn_pack_unit');
            $table->string('mid_pack');
            $table->string('mid_pack_unit');
            $table->string('big_pack');
            $table->string('big_pack_unit');
            $table->string('thickness');
            $table->string('thickness_unit');
            $table->string('add_element');
            $table->string('description');
           
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
