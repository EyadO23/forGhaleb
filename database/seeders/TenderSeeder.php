<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tender;


class TenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

       $tenderData= [
    [
        'title' => 'مشروع بناء مدرسة ابتدائية',
        'description' => 'مناقصة لبناء مدرسة وفق المعايير الحديثة.',
        'location' => 'دمشق',
        'estimated_budget' => 8000000,
        'execution_duration_days' => 120,
        'submission_deadline' => now()->addDays(7),
        'technical_requirements_count' => 10,
        'status' => 'opened',
        'created_by' => 1,
        'attached_file' => 'tenders/specs1.pdf',
    ],
    [
        'title' => 'مشروع تأهيل شبكة مياه الشرب',
        'description' => 'تأهيل شبكة المياه في منطقة الزبداني.',
        'location' => 'ريف دمشق',
        'estimated_budget' => 5000000,
        'execution_duration_days' => 90,
        'submission_deadline' => now()->addDays(10),
        'technical_requirements_count' => 8,
        'status' => 'opened',
        'created_by' => 1,
        'attached_file' => 'tenders/specs2.pdf',
    ],
    [
        'title' => 'مشروع صيانة طريق عام',
        'description' => 'صيانة الطريق الرئيسي بين حلب وحماة.',
        'location' => 'حماة',
        'estimated_budget' => 10000000,
        'execution_duration_days' => 150,
        'submission_deadline' => now()->addDays(5),
        'technical_requirements_count' => 12,
        'status' => 'opened',
        'created_by' => 1,
        'attached_file' => 'tenders/specs3.pdf',
    ],
    [
        'title' => 'مشروع إنشاء مجمع سكني جامعي',
        'description' => 'إنشاء مجمع سكني لطلاب الجامعة.',
        'location' => 'اللاذقية',
        'estimated_budget' => 20000000,
        'execution_duration_days' => 180,
        'submission_deadline' => now()->addDays(15),
        'technical_requirements_count' => 15,
        'status' => 'opened',
        'created_by' => 1,
        'attached_file' => 'tenders/specs4.pdf',
    ],
    [
        'title' => 'مشروع بناء مستشفى قروي',
        'description' => 'بناء مستشفى في ريف السويداء.',
        'location' => 'السويداء',
        'estimated_budget' => 12000000,
        'execution_duration_days' => 160,
        'submission_deadline' => now()->addDays(12),
        'technical_requirements_count' => 14,
        'status' => 'opened',
        'created_by' => 1,
        'attached_file' => 'tenders/specs5.pdf',
    ],
    [
        'title' => 'مشروع توسعة شبكة الكهرباء',
        'description' => 'توسعة شبكة الكهرباء في حي المزة.',
        'location' => 'دمشق',
        'estimated_budget' => 7000000,
        'execution_duration_days' => 100,
        'submission_deadline' => now()->addDays(8),
        'technical_requirements_count' => 9,
        'status' => 'opened',
        'created_by' => 1,
        'attached_file' => 'tenders/specs6.pdf',
    ],
    [
        'title' => 'مشروع تطوير الحديقة العامة',
        'description' => 'إعادة تأهيل وتوسيع الحديقة العامة.',
        'location' => 'طرطوس',
        'estimated_budget' => 3000000,
        'execution_duration_days' => 60,
        'submission_deadline' => now()->addDays(6),
        'technical_requirements_count' => 7,
        'status' => 'opened',
        'created_by' => 1,
        'attached_file' => 'tenders/specs7.pdf',
    ],
    [
        'title' => 'مشروع ترميم مبنى أثري',
        'description' => 'ترميم مبنى أثري في مدينة بصرى.',
        'location' => 'درعا',
        'estimated_budget' => 6000000,
        'execution_duration_days' => 90,
        'submission_deadline' => now()->addDays(9),
        'technical_requirements_count' => 10,
        'status' => 'opened',
        'created_by' => 1,
        'attached_file' => 'tenders/specs8.pdf',
    ],
    [
        'title' => 'مشروع إنشاء محطة وقود حكومية',
        'description' => 'إنشاء محطة وقود في مدخل المدينة.',
        'location' => 'دير الزور',
        'estimated_budget' => 9000000,
        'execution_duration_days' => 110,
        'submission_deadline' => now()->addDays(11),
        'technical_requirements_count' => 11,
        'status' => 'opened',
        'created_by' => 1,
        'attached_file' => 'tenders/specs9.pdf',
    ],
    [
        'title' => 'مشروع إصلاح وصيانة جسور',
        'description' => 'صيانة مجموعة من الجسور في شمال سوريا.',
        'location' => 'الرقة',
        'estimated_budget' => 13000000,
        'execution_duration_days' => 140,
        'submission_deadline' => now()->addDays(14),
        'technical_requirements_count' => 13,
        'status' => 'opened',
        'created_by' => 1,
        'attached_file' => 'tenders/specs10.pdf',
    ],
];

       foreach ($tenderData as $tender) {
    Tender::create($tender);
}

}
}