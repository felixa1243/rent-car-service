<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database;
use Illuminate\Database\Schema\Blueprint;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create("cars", function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("brand");
            $table->string("model");
            $table->string("police_number");
            $table->integer("rent_perday");
            $table->uuid("owner_id");
            $table->timestamps();
            $table->foreign("owner_id")->references("id")->on("users");
        });
        Schema::create("rents", function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->uuid("renter_id");
            $table->uuid("tenant_id");
            $table->uuid("car_id");
            $table->timestamp("rent_start")->default(DB::raw("CURRENT_TIMESTAMP"));
            $table->timestamp("rent_end");
            $table->foreign("renter_id")->references("id")->on("users");
            $table->foreign("tenant_id")->references("id")->on("users");
            $table->foreign("car_id")->references("id")->on("cars");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("users");
    }
};
