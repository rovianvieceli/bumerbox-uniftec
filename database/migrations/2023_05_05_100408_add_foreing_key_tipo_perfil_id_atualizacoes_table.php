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
        Schema::table('atualizacoes', function (Blueprint $table) {
            $table->char('tipo_perfil_codigo', 3)->after('id');
            $table->foreign('tipo_perfil_codigo')->references('codigo')->on('tipos_perfil');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('atualizacoes', function (Blueprint $table) {
            $table->dropForeign('atualizacoes_tipo_perfil_codigo_foreign');
            $table->dropColumn('tipo_perfil_codigo');
        });
    }
};
