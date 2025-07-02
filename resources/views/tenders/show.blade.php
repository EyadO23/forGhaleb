@if($tender->winning_bid_id)
    <a href="{{ route('contract.pdf', ['bid' => $tender->winning_bid_id]) }}" target="_blank" class="btn btn-success">
        📝 تحميل عقد التنفيذ بصيغة PDF
    </a>
@endif
