<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id(); // sama seperti int unsigned auto_increment primary key
            $table->string('nama', 100);
            $table->string('nis', 100);
            $table->string('gender', 100);
            $table->string('alamat', 100);
            $table->string('kontak', 100);
            $table->string('email', 100);
            $table->boolean('status_pkl')->default(0);
            $table->string('foto', 255)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->foreignId('users_id')
                ->nullable()
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
