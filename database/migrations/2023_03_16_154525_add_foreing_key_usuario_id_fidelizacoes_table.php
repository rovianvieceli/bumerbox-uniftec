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
            $table->unsignedBigInteger('usuario_id')->after('id');
            $table->foreign('usuario_id')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fidelizacoes', function (Blueprint $table) {
            $table->dropForeign('fidelizacoes_usuario_id_foreign');
            $table->dropColumn('usuario_id');
        });
    }
};
