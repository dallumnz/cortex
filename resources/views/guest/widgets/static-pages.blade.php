@if(count($static_pages) > 0)
<!-- Other content widget-->
<div class="card mb-4">
    <div class="card-header">Other pages</div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <ul class="list-unstyled mb-0">
                    @foreach($static_pages as $page)
                    @if($page->id % 2 != 0)
                    <li>
                        <a href="{{ route('page.show', $page->slug) }}">{{ $page->title }}</a>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
            <div class="col-sm-6">
                <ul class="list-unstyled mb-0">
                    @foreach($static_pages as $page)
                    @if($page->id % 2 == 0)
                    <li>
                        <a href="{{ route('page.show', $page->slug) }}">{{ $page->title }}</a>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endif