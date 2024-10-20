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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();  // Primary key
            $table->string('name');  // Customer name
            $table->string('email')->unique();  // Unique email address
            $table->string('profile_image')->nullable();  // Path to profile image (nullable)
            $table->string('whatsapp_number')->nullable();  // WhatsApp number (nullable)
            $table->string('website_url')->nullable();  // Website URL (nullable)
            $table->text('description');  // Customer description
            $table->enum('status', ['Active', 'Inactive'])->default('Active');  // Status of the customer
            $table->timestamps();  // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');  // Drop the customers table
    }
};
