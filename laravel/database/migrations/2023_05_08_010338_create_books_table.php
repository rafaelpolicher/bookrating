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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->text('review');
            $table->integer('editor_rating');
            $table->integer('users_rating')->nullable();

            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');


            $table->enum('genre', ['Biografia', 'Ficção', 'Aventura', 'Drama', 'Novela', 'HQ', 'Infantil', 'Romance', 'Terror', 'Acadêmico', 'Religioso', 'Auto Ajuda', 'Clássico', 'Não-Ficçao', 'Outros']);


            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
