<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pkl', function (Blueprint $table) {
            $table->id(); // INT UNSIGNED AUTO_INCREMENT PRIMARY KEY
            $table->date('mulai');
            $table->date('selesai');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            $table->foreignId('siswa_id')
                ->constrained('siswa')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('industri_id')
                ->nullable()
                ->constrained('industri')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('guru_id')
                ->nullable();            

            // Kalau guru_id juga perlu foreign key:
            // $table->foreign('guru_id')->references('id')->on('guru')
            //     ->onUpdate('cascade')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pkl');
    }
};
