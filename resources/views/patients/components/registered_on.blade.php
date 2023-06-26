<div class="text-dark me-2">
    {{ \Carbon\Carbon::parse($row->created_at)->isoFormat('DD MMM YYYY hh:mm A') }}
</div>
