<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bid;
use App\Models\Tender;
use App\Models\Contractor;

class BidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

$bidData = [
    ['tender_id' => 1, 'contractor_id' => 1, 'bid_amount' => 5000000, 'completion_time' => 90, 'technical_proposal_pdf' => 'bids/technical_proposals/contractor1.pdf', 'technical_matched_count' => 4, 'final_bid_score' => null],
    ['tender_id' => 1, 'contractor_id' => 2, 'bid_amount' => 4800000, 'completion_time' => 95, 'technical_proposal_pdf' => 'bids/technical_proposals/contractor2.pdf', 'technical_matched_count' => 5, 'final_bid_score' => null],
    ['tender_id' => 1, 'contractor_id' => 3, 'bid_amount' => 4700000, 'completion_time' => 100, 'technical_proposal_pdf' => 'bids/technical_proposals/contractor3.pdf', 'technical_matched_count' => 3, 'final_bid_score' => null],

    ['tender_id' => 2, 'contractor_id' => 1, 'bid_amount' => 4200000, 'completion_time' => 80, 'technical_proposal_pdf' => 'bids/technical_proposals/contractor1.pdf', 'technical_matched_count' => 5, 'final_bid_score' => null],
    ['tender_id' => 2, 'contractor_id' => 4, 'bid_amount' => 4600000, 'completion_time' => 85, 'technical_proposal_pdf' => 'bids/technical_proposals/contractor4.pdf', 'technical_matched_count' => 2, 'final_bid_score' => null],
    ['tender_id' => 2, 'contractor_id' => 5, 'bid_amount' => 4550000, 'completion_time' => 88, 'technical_proposal_pdf' => 'bids/technical_proposals/contractor5.pdf', 'technical_matched_count' => 4, 'final_bid_score' => null],

    ['tender_id' => 3, 'contractor_id' => 6, 'bid_amount' => 6100000, 'completion_time' => 110, 'technical_proposal_pdf' => 'bids/technical_proposals/contractor6.pdf', 'technical_matched_count' => 4, 'final_bid_score' => null],
    ['tender_id' => 3, 'contractor_id' => 7, 'bid_amount' => 6050000, 'completion_time' => 100, 'technical_proposal_pdf' => 'bids/technical_proposals/contractor7.pdf', 'technical_matched_count' => 5, 'final_bid_score' => null],
    ['tender_id' => 3, 'contractor_id' => 8, 'bid_amount' => 6300000, 'completion_time' => 120, 'technical_proposal_pdf' => 'bids/technical_proposals/contractor8.pdf', 'technical_matched_count' => 3, 'final_bid_score' => null],

    ['tender_id' => 4, 'contractor_id' => 9, 'bid_amount' => 4700000, 'completion_time' => 75, 'technical_proposal_pdf' => 'bids/technical_proposals/contractor9.pdf', 'technical_matched_count' => 5, 'final_bid_score' => null],
    ['tender_id' => 4, 'contractor_id' => 10, 'bid_amount' => 4500000, 'completion_time' => 70, 'technical_proposal_pdf' => 'bids/technical_proposals/contractor10.pdf', 'technical_matched_count' => 4, 'final_bid_score' => null],
    ['tender_id' => 4, 'contractor_id' => 11, 'bid_amount' => 4400000, 'completion_time' => 85, 'technical_proposal_pdf' => 'bids/technical_proposals/contractor11.pdf', 'technical_matched_count' => 2, 'final_bid_score' => null],

    ['tender_id' => 5, 'contractor_id' => 12, 'bid_amount' => 7000000, 'completion_time' => 130, 'technical_proposal_pdf' => 'bids/technical_proposals/contractor12.pdf', 'technical_matched_count' => 5, 'final_bid_score' => null],
    ['tender_id' => 5, 'contractor_id' => 13, 'bid_amount' => 6900000, 'completion_time' => 120, 'technical_proposal_pdf' => 'bids/technical_proposals/contractor13.pdf', 'technical_matched_count' => 3, 'final_bid_score' => null],
    ['tender_id' => 5, 'contractor_id' => 14, 'bid_amount' => 7100000, 'completion_time' => 125, 'technical_proposal_pdf' => 'bids/technical_proposals/contractor14.pdf', 'technical_matched_count' => 4, 'final_bid_score' => null],

    ['tender_id' => 6, 'contractor_id' => 15, 'bid_amount' => 5300000, 'completion_time' => 95, 'technical_proposal_pdf' => 'bids/technical_proposals/contractor15.pdf', 'technical_matched_count' => 4, 'final_bid_score' => null],
    ['tender_id' => 6, 'contractor_id' => 16, 'bid_amount' => 5200000, 'completion_time' => 90, 'technical_proposal_pdf' => 'bids/technical_proposals/contractor16.pdf', 'technical_matched_count' => 5, 'final_bid_score' => null],
    ['tender_id' => 6, 'contractor_id' => 17, 'bid_amount' => 5400000, 'completion_time' => 100, 'technical_proposal_pdf' => 'bids/technical_proposals/contractor17.pdf', 'technical_matched_count' => 3, 'final_bid_score' => null],

    ['tender_id' => 7, 'contractor_id' => 18, 'bid_amount' => 4000000, 'completion_time' => 85, 'technical_proposal_pdf' => 'bids/technical_proposals/contractor18.pdf', 'technical_matched_count' => 2, 'final_bid_score' => null],
    ['tender_id' => 7, 'contractor_id' => 19, 'bid_amount' => 3900000, 'completion_time' => 80, 'technical_proposal_pdf' => 'bids/technical_proposals/contractor19.pdf', 'technical_matched_count' => 4, 'final_bid_score' => null],
    ['tender_id' => 7, 'contractor_id' => 20, 'bid_amount' => 4100000, 'completion_time' => 90, 'technical_proposal_pdf' => 'bids/technical_proposals/contractor20.pdf', 'technical_matched_count' => 5, 'final_bid_score' => null],

    ['tender_id' => 8, 'contractor_id' => 1, 'bid_amount' => 6000000, 'completion_time' => 100, 'technical_proposal_pdf' => 'bids/technical_proposals/contractor1.pdf', 'technical_matched_count' => 4, 'final_bid_score' => null],
    ['tender_id' => 8, 'contractor_id' => 2, 'bid_amount' => 5900000, 'completion_time' => 95, 'technical_proposal_pdf' => 'bids/technical_proposals/contractor2.pdf', 'technical_matched_count' => 3, 'final_bid_score' => null],
    ['tender_id' => 8, 'contractor_id' => 3, 'bid_amount' => 6100000, 'completion_time' => 105, 'technical_proposal_pdf' => 'bids/technical_proposals/contractor3.pdf', 'technical_matched_count' => 5, 'final_bid_score' => null],

    ['tender_id' => 9, 'contractor_id' => 4, 'bid_amount' => 4600000, 'completion_time' => 85, 'technical_proposal_pdf' => 'bids/technical_proposals/contractor4.pdf', 'technical_matched_count' => 3, 'final_bid_score' => null],
    ['tender_id' => 9, 'contractor_id' => 5, 'bid_amount' => 4700000, 'completion_time' => 90, 'technical_proposal_pdf' => 'bids/technical_proposals/contractor5.pdf', 'technical_matched_count' => 2, 'final_bid_score' => null],
    ['tender_id' => 9, 'contractor_id' => 6, 'bid_amount' => 4550000, 'completion_time' => 88, 'technical_proposal_pdf' => 'bids/technical_proposals/contractor6.pdf', 'technical_matched_count' => 4, 'final_bid_score' => null],

    ['tender_id' => 10, 'contractor_id' => 7, 'bid_amount' => 5200000, 'completion_time' => 100, 'technical_proposal_pdf' => 'bids/technical_proposals/contractor7.pdf', 'technical_matched_count' => 5, 'final_bid_score' => null],
    ['tender_id' => 10, 'contractor_id' => 8, 'bid_amount' => 5100000, 'completion_time' => 95, 'technical_proposal_pdf' => 'bids/technical_proposals/contractor8.pdf', 'technical_matched_count' => 4, 'final_bid_score' => null],
    ['tender_id' => 10, 'contractor_id' => 9, 'bid_amount' => 5300000, 'completion_time' => 105, 'technical_proposal_pdf' => 'bids/technical_proposals/contractor9.pdf', 'technical_matched_count' => 3, 'final_bid_score' => null],
];

    foreach ($bidData as $bid) {
    Bid::create($bid);
}

   
    }
    }

