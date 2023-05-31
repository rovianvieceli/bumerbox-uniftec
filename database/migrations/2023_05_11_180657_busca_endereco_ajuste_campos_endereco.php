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
        Schema::table('enderecos', function($table) {
            $table->string('complemento', 255)->after('rua')->nullable();;
            $table->string('bairro', 255)->after('complemento')->nullable();;
            $table->string('nomecidade', 255)->after('bairro')->nullable();;
            $table->string('nomeestado', 2)->after('nomecidade')->nullable();;

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('enderecos', function($table) {
            $table->dropColumn('nomeestado');
        });

        Schema::table('enderecos', function($table) {
            $table->dropColumn('nomecidade');
        });

        Schema::table('enderecos', function($table) {
            $table->dropColumn('bairro');
        });

        Schema::table('enderecos', function($table) {
            $table->dropColumn('complemento');
        });
    }
};
