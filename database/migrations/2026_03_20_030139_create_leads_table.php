<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Catalog: Sources (The "Channel")
        Schema::create('sources', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g., "Billboard", "Social Media", "Direct"
            $table->timestamps();
        });

        // 2. Catalog: Interests (The "Need")
        Schema::create('interests', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g., "Electronic Billing", "Inventory"
            $table->timestamps();
        });

        // 3. Catalog: Business Sizes
        Schema::create('business_sizes', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g., "1-10 Employees"
            $table->timestamps();
        });

        // 4. QR Maintenance Table (The "Specific Location")
        Schema::create('qr_codes', function (Blueprint $table) {
            $table->id();
            $table->string('internal_name'); // e.g., "Valla Santa Elena"
            $table->string('slug')->unique(); // e.g., "santa-elena-01"
            $table->foreignId('source_id')->constrained(); // Links to "Billboard"
            $table->integer('scan_count')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 5. Main Leads Table
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->string('company_name')->nullable();
            $table->text('message')->nullable();

            // Foreign Keys
            $table->foreignId('interest_id')->constrained();
            $table->foreignId('business_size_id')->constrained();
            $table->foreignId('source_id')->constrained();

            // Optional: Tracking the specific QR scan
            $table->foreignId('qr_code_id')->nullable()->constrained()->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('leads');
        Schema::dropIfExists('qr_codes');
        Schema::dropIfExists('business_sizes');
        Schema::dropIfExists('interests');
        Schema::dropIfExists('sources');
    }
};
