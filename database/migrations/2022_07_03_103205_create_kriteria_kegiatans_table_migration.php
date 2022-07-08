<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKriteriaKegiatansTableMigration extends Migration
{
    public function up()
    {
        Schema::create('kriteria_kegiatans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor');
            $table->string('kegiatan');
            $table->string('batas_diakui')->nullable();
            $table->string('angka_kredit')->nullable();
            $table->integer('parent_id')->unsigned()->nullable();
            $table->integer('position', false, true);
            $table->softDeletes();

            $table->foreign('parent_id')
                ->references('id')
                ->on('kriteria_kegiatans')
                ->onDelete('set null');

        });

        Schema::create('kriteria_kegiatan_closure', function (Blueprint $table) {
            $table->increments('closure_id');

            $table->integer('ancestor', false, true);
            $table->integer('descendant', false, true);
            $table->integer('depth', false, true);

            $table->foreign('ancestor')
                ->references('id')
                ->on('kriteria_kegiatans')
                ->onDelete('cascade');

            $table->foreign('descendant')
                ->references('id')
                ->on('kriteria_kegiatans')
                ->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::dropIfExists('kriteria_kegiatan_closure');
        Schema::dropIfExists('kriteria_kegiatans');
    }
}
