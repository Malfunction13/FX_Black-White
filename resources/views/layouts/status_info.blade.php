<div class="col-12 status-info">
    @if(session('error'))
        <div class="col-6 alert alert-danger mb-5 text-sm">
            {{ session('error') }}
        </div>
    @elseif(session('status'))
        <div class="col-6 alert alert-success mb-5 text-sm">
            {{ session('status') }}
        </div>
    @endif
</div>
