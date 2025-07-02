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
        Schema::create('contractor_signatures', function (Blueprint $table) {
         $table->id();
             $table->foreignId('contractor_id')->constrained()->onDelete('cascade');
        $table->foreignId('tender_id')->constrained()->onDelete('cascade');
        $table->foreignId('bid_id')->constrained()->onDelete('cascade');
        $table->string('signing_url')->nullable();
        $table->enum('status', ['sent', 'signed', 'rejected', 'expired'])->default('sent');
        $table->timestamp('signed_at')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contract_signatures');
    }
};
