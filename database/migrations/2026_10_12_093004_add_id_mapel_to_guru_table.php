<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        // Kolom id_mapel sudah dibuat di migration create_gurus_table.
    }

    public function down(): void
    {
        // Tidak ada perubahan yang perlu dibatalkan.
    }
};