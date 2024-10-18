<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


return new class extends Migration
{
    /**
     * Run the migrations.
     */

    public function up(): void
    {   
        Schema::create('permissions', function (Blueprint $table) {
            $table->bigIncrements('id'); // permission id
            $table->string('name');       // For MySQL 8.0 use string('name', 125);
            $table->string('guard_name')->default('web guard'); // For MySQL 8.0 use string('guard_name', 125);
            $table->timestamps();
            $table->unique(['name', 'guard_name']);
        });

        Schema::create('roles', function (Blueprint $table)  {
            $table->bigIncrements('id')->primary(); // role id
            
            $table->string('name');       // For MySQL 8.0 use string('name', 125);
            $table->string('guard_name')->default('web guard'); // For MySQL 8.0 use string('guard_name', 125);
            $table->timestamps();
        });

        
        Schema::create('permissions_role', function (Blueprint $table)  {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->timestamps();

            $table->foreign('permission_id')
                ->references('id') // permission id
                ->on('permissions')
                ->onDelete('cascade');

            $table->foreign('role_id')
                ->references('id') // role id
                ->on('roles')
                ->onDelete('cascade');

            $table->primary(['permission_id', 'role_id'], 'role_has_permissions_permission_id_role_id_primary');
        });


        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('Nama_User');
            $table->string('Username');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('wa');
            $table->foreignId('role_id')->constrained('roles');
            $table->boolean('status_user')->default(true);
            $table->string('CREATED_BY');
            $table->string('UPDATE_BY');
            $table->rememberToken();
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
