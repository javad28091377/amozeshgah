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
        // Schema::create('logins', function (Blueprint $table) {   
        //     $table->string('username',255)->primary();
        //     $table->string('password',500);
        //     $table->enum('role',['superadmin','admin']);
        //     $table->enum('status',['active','deactive']);
        //     $table->timestamps();
        // });

        Schema::table('logins', function (Blueprint $table) {   
            $table->enum('status',['active','deactive'])->after('role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('logins');   // delet table login

        // Schema::table('logins', function (Blueprint $table) {   
        //     $table->dropColumn('status');   // delet column status
        // });
    }
};
