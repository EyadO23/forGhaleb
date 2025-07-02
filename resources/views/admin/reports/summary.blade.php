@extends('layouts.app')

@section('title', 'ملخص التقارير')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">ملخص إحصائيات النظام</h2>

    <div class="row text-center">
        <div class="col-md-3 mb-3">
            <div class="card shadow-sm p-3 bg-light rounded">
                <strong>عدد المناقصات</strong>
                <h4 class="mt-2 text-primary">{{ $totalTenders }}</h4>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card shadow-sm p-3 bg-light rounded">
                <strong>عدد العروض</strong>
                <h4 class="mt-2 text-primary">{{ $totalBids }}</h4>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card shadow-sm p-3 bg-light rounded">
                <strong>متوسط العروض / مناقصة</strong>
                <h4 class="mt-2 text-primary">{{ $averageBidsPerTender }}</h4>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="card shadow-sm p-3 bg-light rounded">
                <strong>متوسط التقييم</strong>
                <h4 class="mt-2 text-primary">{{ number_format($avgFinalScore, 2) }}</h4>
            </div>
        </div>
    </div>

    <div class="row text-center mt-4">
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm p-3 bg-white rounded">
                <strong>متوسط السعر</strong>
                <h4 class="mt-2 text-success">{{ number_format($avgBidPrice, 2) }}</h4>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm p-3 bg-white rounded">
                <strong>أعلى سعر</strong>
                <h4 class="mt-2 text-danger">{{ number_format($maxBidPrice, 2) }}</h4>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card shadow-sm p-3 bg-white rounded">
                <strong>أقل سعر</strong>
                <h4 class="mt-2 text-warning">{{ number_format($minBidPrice, 2) }}</h4>
            </div>
        </div>
    </div>

    <h4 class="mt-5"> تحليل متوسط الأسعار (أحدث 5 مناقصات)</h4>
    <table class="table table-striped mt-3">
        <thead class="thead-dark">
            <tr>
                <th>عنوان المناقصة</th>
                <th>متوسط السعر</th>
            </tr>
        </thead>
        <tbody>
            @foreach($priceAnalysis as $item)
            <tr>
                <td>{{ $item->title }}</td>
                <td>{{ number_format($item->bids_avg_bid_amount, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h4 class="mt-5"> أفضل المقاولين (أكثر عدد عروض)</h4>
    <table class="table table-bordered mt-3">
        <thead class="thead-light">
            <tr>
                <th>الاسم</th>
                <th>عدد العروض</th>
            </tr>
        </thead>
        <tbody>
            @foreach($topContractors as $contractor)
            <tr>
                <td>{{ $contractor->user->name }}</td>
                <td>{{ $contractor->bids_count }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h4 class="mt-5"> المقاولون الفائزون</h4>
    <table class="table table-hover mt-3">
        <thead class="thead-light">
            <tr>
                <th>عنوان المناقصة</th>
                <th>اسم المستخدم الفائز</th>
                <th>التقييم النهائي</th>
            </tr>
        </thead>
        <tbody>
            @foreach($winners as $tender)
            <tr>
                <td>{{ $tender->title }}</td>
                <td>{{ $tender->winnerBid->contractor->user->name ?? '-' }}</td>
                <td>{{ number_format($tender->winnerBid->final_bid_score ?? 0, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
