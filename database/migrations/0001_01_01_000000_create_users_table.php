<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // int8 primary key
            $table->string('user_code', 255)->unique();
            $table->unsignedInteger('school_id'); // int4
            $table->unsignedInteger('board_of_education_id'); // int4 NOT NULL
            $table->string('name', 255);
            $table->string('name_hiragana', 255);
            $table->string('position', 255)->nullable();
            $table->unsignedSmallInteger('sex'); // int2
            $table->unsignedInteger('role_id'); // int4
            $table->string('email', 255)->unique();
            $table->string('phone', 50)->nullable();
            $table->unsignedSmallInteger('status'); // int2

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 255);
            $table->string('password_hint', 50)->nullable();
            $table->string('remember_token', 100)->nullable();

            $table->timestamp('admission_start')->nullable();
            $table->timestamp('school_work_end')->nullable();
            $table->timestamp('graduation_end')->nullable();
            $table->timestamp('latest_login_at')->nullable(); // timestamp(6) NOT NULL NO

            $table->unsignedSmallInteger('is_deleted')->default(0); // int2 NOT NULL YES
            $table->unsignedSmallInteger('default_share_digital')->default(4); // int2 NOT NULL YES DEFAULT 4
            $table->unsignedSmallInteger('is_hash')->default(1); // int2 NOT NULL YES DEFAULT 1

            $table->unsignedInteger('creator_id')->nullable();
            $table->unsignedInteger('updater_id')->nullable();

            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
