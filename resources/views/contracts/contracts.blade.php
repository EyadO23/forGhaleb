<!-- resources/views/contracts/contract.blade.php -->

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <title>عقد اتفاق</title>
    <style>
       @font-face {
    font-family: 'Amiri';
    src: url('{{ public_path('fonts/amiri.ttf') }}') format('truetype');
}
body {
    font-family: 'Amiri', serif;
    direction: rtl;
    text-align: right;
            font-size: 16px;
            color: #333;
            line-height: 1.6;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        .signature-section {
            margin-top: 60px;
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }
        .signature-block {
            width: 45%;
            text-align: center;
        }
        .signature-line {
            margin-top: 80px;
            border-top: 1px solid #000;
            width: 100%;
        }
    </style>
</head>
<body>

    <h1>عقد اتفاق</h1>

    <p>تم إبرام هذا العقد بتاريخ <strong>{{ date('Y-m-d') }}</strong> بين كل من:</p>

    <p><strong>الجامعة</strong> (ويشار إليها فيما يلي بـ "<em>الطرف الأول</em>")،</p>

    <p>و</p>

    <p><strong>{{ $contractor->company_name ?? 'اسم شركة المقاول' }}</strong>، ويمثلها <strong>{{ $contractor->user->name ?? 'اسم الممثل' }}</strong> (ويشار إليها فيما يلي بـ "<em>الطرف الثاني</em>").</p>

    <h3>تفاصيل المشروع</h3>
    <p><strong>عنوان المناقصة:</strong> {{ $tender->title ?? 'عنوان المناقصة' }}</p>
    <p><strong>وصف المناقصة:</strong> {{ $tender->description ?? 'وصف المناقصة' }}</p>
    <p><strong>قيمة العرض:</strong> {{ number_format($bid->bid_amount ?? 0) }} سوري</p>
    <p><strong>مدة الإنجاز:</strong> {{ $bid->completion_time ?? 'غير محدد' }} يوم</p>

    <h3>الشروط والأحكام</h3>
    <p>
        يلتزم الطرف الثاني بإكمال المشروع وفق التفاصيل المذكورة أعلاه خلال مدة الإنجاز المتفق عليها وبما يتوافق مع شروط الطرف الأول.
        ويتعهد الطرف الأول بدفع قيمة العرض للطرف الثاني عند الانتهاء من المشروع بنجاح.
    </p>

    <div class="signature-section">
        <div class="signature-block">
            <p class="signature-line"></p>
            <p><strong>الطرف الأول (الجامعة)</strong></p>
            <p>التاريخ: _____________________</p>
        </div>
        <div class="signature-block">
            <p class="signature-line"></p>
            <p><strong>الطرف الثاني {{ $contractor->user->name}}</strong></p>
            <p>التاريخ: _____________________</p>
        </div>
    </div>

</body>
</html>

