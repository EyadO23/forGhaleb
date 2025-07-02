@extends('layouts.app')

@section('title', 'تحليل الأداء')

@section('content')
<div class="container mt-4">
    <h2> تحليل أداء العروض والمقاولين</h2>

    <h4 class="mt-4"> حالة المناقصات</h4>
    <ul>
        @foreach($tendersStatusCount as $status)
        <li><strong>{{ $status->status }}:</strong> {{ $status->count }}</li>
        @endforeach
    </ul>

    <h4 class="mt-4"> حالة العروض</h4>
    <ul>
        @foreach($bidsStatusCount as $status)
        <li><strong>{{ $status->status }}:</strong> {{ $status->count }}</li>
        @endforeach
    </ul>

    <h4 class="mt-4"> متوسط مدة تنفيذ المناقصات</h4>
    <p><strong>{{ number_format($averageDuration, 1) }}</strong> يوم</p>

    <h4 class="mt-4"> أداء المقاولين</h4>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>اسم المستخدم</th>
                <th>عدد العروض</th>
                <th>العروض المقبولة</th>
            </tr>
        </thead>
        <tbody>
            @foreach($contractors as $contractor)
            <tr>
                <td>{{ $contractor->user->name ?? 'غير معروف' }}</td>
                <td>{{ $contractor->total_bids }}</td>
                <td>{{ $contractor->accepted_bids }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
