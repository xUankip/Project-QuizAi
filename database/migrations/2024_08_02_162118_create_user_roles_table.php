<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('user_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('user_type');
            $table->integer('status');
            $table->timestamps();
        });
        Schema::create('topic', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->notNull();
            $table->string('description', 255)->nullable();
            $table->string('thumbnail_url', 255)->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
        Schema::create('game', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->notNull();
            $table->text('description')->nullable();
            $table->text('cover_img')->nullable();
            $table->foreignId('topic_id')->constrained('topic')->onDelete('cascade');
            $table->text('qr_code')->nullable();
            $table->foreignId('created_by')->constrained('user')->onDelete('cascade');
            $table->foreignId('deleted_by')->nullable()->constrained('user')->onDelete('set null');
            $table->timestamp('start_time')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('deleted_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('end_time')->nullable();
            $table->foreignId('updated_by')->nullable()->constrained('user')->onDelete('set null');
        });
        Schema::create('question', function (Blueprint $table) {
            $table->id();
            $table->foreignId('game_id')->constrained('game')->onDelete('cascade');
            $table->text('content')->notNull();
            $table->integer('countdown_time')->notNull();
            $table->json('correct_answer');
            $table->integer('score')->notNull();
            $table->foreignId('created_by')->nullable()->constrained('user')->onDelete('set null');
            $table->foreignId('updated_by')->nullable()->constrained('user')->onDelete('set null');
            $table->foreignId('deleted_by')->nullable()->constrained('user')->onDelete('set null');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('deleted_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
        Schema::create('answer', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->constrained('question')->onDelete('cascade');
            $table->json('answer_content');
            $table->foreignId('created_by')->nullable()->constrained('user')->onDelete('set null');
            $table->foreignId('updated_by')->nullable()->constrained('user')->onDelete('set null');
            $table->foreignId('deleted_by')->nullable()->constrained('user')->onDelete('set null');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
        Schema::create('user_answer', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('user')->onDelete('cascade');
            $table->foreignId('game_id')->constrained('game')->onDelete('cascade');
            $table->foreignId('question_id')->constrained('question')->onDelete('cascade');
            $table->json('selected_answer');
            $table->decimal('score', 8, 2);
            $table->integer('time_taken');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
        Schema::dropIfExists('game');
        Schema::dropIfExists('answer');
        Schema::dropIfExists('question');
        Schema::dropIfExists('topic');
    }
};
