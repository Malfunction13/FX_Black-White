<div class="col-12 status-info">
    @if(session('error'))
        <div class="col-6 alert alert-danger mt-2 text-sm">
            {{ session('error') }}
        </div>
    @elseif(session('status'))
        <div class="col-6 alert alert-success mt-2 text-sm">
            {{ session('status') }}
        </div>
    @endif
</div>
