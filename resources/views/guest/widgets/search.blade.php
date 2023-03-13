<!-- Search widget-->
<div class="card mb-4">
    <div class="card-header">Search</div>
    <div class="card-body">
        <form method="GET" action="{{ route('search') }}">
            <div class="input-group">
                <input class="form-control" name="query" type="text" placeholder="Search..." />
                <button class="btn btn-primary" id="button-search" type="submit">Search</button>
            </div>
        </form>
    </div>
</div>