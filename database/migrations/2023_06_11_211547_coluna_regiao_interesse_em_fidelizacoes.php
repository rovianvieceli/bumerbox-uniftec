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
        Schema::table('fidelizacoes', function (Blueprint $table) {
            $table->unsignedBigInteger('regioes_interesse_id')->after('usuario_id');
            $table->foreign('regioes_interesse_id')->references('id')->on('regioes_interesse');
           
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
