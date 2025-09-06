<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialInsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_ins', function (Blueprint $table) {
            $table->id();

            $table->foreignId('material_id')
                ->nullable()
                ->constrained('materials')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->bigInteger('stock_in')->default(0);
            $table->date('date_in')->nullable();

            $table->softDeletes();
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
        Schema::dropIfExists('material_ins');
    }
}
