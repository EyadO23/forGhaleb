<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tenders', function (Blueprint $table) {
            $table->unsignedBigInteger('manual_winner_bid_id')->nullable()->after('winner_bid_id');
            $table->foreign('manual_winner_bid_id')
                  ->references('id')
                  ->on('bids')
                  ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('tenders', function (Blueprint $table) {
            $table->dropForeign(['manual_winner_bid_id']);
            $table->dropColumn('manual_winner_bid_id');
        });
    }
};
