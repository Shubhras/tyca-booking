<div class="badge bg-primary">{{ \Carbon\Carbon::parse($row->created_at)->addHours(8)->isoFormat('DD MMM YYYY hh:mm A') }}</div>
