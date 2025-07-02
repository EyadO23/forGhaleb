@extends('layouts.app')

@section('content')
<div class="p-6 bg-white rounded-lg shadow mb-8">
    <h2 class="text-2xl font-bold mb-4"> تقارير المناقصات</h2>

    <ul class="list-disc pl-6 mb-6">
        <li>عدد المناقصات الكلي: <strong>{{ $totalTenders }}</strong></li>
        <li>عدد العروض الكلي: <strong>{{ $totalBids }}</strong></li>
        <li>متوسط عدد العروض لكل مناقصة: <strong>{{ $averageBidsPerTender }}</strong></li>
    </ul>

    <h3 class="text-xl font-semibold mb-2"> أفضل 5 مقاولين (بناءً على عدد العروض)</h3>
    <ol class="list-decimal pl-6 mb-6">
        @foreach($topContractors as $contractor)
            <li>{{ $contractor->user->name ?? 'بدون اسم' }} - {{ $contractor->bids_count }} عروض</li>
        @endforeach
    </ol>
</div>

<div class="p-6 bg-white rounded-lg shadow">
    <h3 class="text-xl font-semibold mb-4">= متوسط أسعار العروض لآخر 5 مناقصات</h3>
    <canvas id="priceChart" width="400" height="200"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('priceChart').getContext('2d');
    const priceChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($priceAnalysis->pluck('title')) !!},
            datasets: [{
                label: 'متوسط سعر العرض',
                data: {!! json_encode($priceAnalysis->pluck('avg_price')) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return value.toLocaleString() + ' SYR';
                        }
                    }
                }
            }
        }
    });
</script>
@endsection
