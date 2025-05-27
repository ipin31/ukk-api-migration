<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('industri', function (Blueprint $table) {
            $table->id(); // INT UNSIGNED AUTO_INCREMENT PRIMARY KEY
            $table->string('nama', 100);
            $table->string('bidang_usaha', 100);
            $table->string('alamat', 100);
            $table->string('kontak', 100);
            $table->string('email', 100);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            $table->foreignId('guru_id')
                ->nullable()
                ->constrained('guru');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('industri');
    }
};
