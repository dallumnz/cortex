<!-- Categories widget-->
<div class="card mb-4">
    <div class="card-header">Categories</div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <ul class="list-unstyled mb-0">
                    @foreach($categories as $category)
                    @if($category->id % 2 != 0)
                    <li>
                        <a href="{{ route('post.category', $category->slug) }}">{{ $category->name }}</a>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
            <div class="col-sm-6">
                <ul class="list-unstyled mb-0">
                    @foreach($categories as $category)
                    @if($category->id % 2 == 0)
                    <li>
                        <a href="{{ route('post.category', $category->slug) }}">{{ $category->name }}</a>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>