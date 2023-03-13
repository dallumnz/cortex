<!-- Newsletter widget-->
<div class="card mb-4">
    <div class="card-header">
        Stay up to date!
    </div>
    <div class="card-body">
        <p>Subscribe to our mailing list for upcoming news and announcements.<br />
            <small class="text-muted">You may get less than one email per month. You can unsubscribe at any
                time.</small>
        </p>
        <form action="{{ route('user.subscribe') }}" method="POST">
            @csrf
            <div class="input-group">
                <input class="form-control" type="email" name="email" placeholder="name@example.nz" required />
                <button class="btn btn-primary">Subscribe</button>
            </div>
        </form>
    </div>
</div>