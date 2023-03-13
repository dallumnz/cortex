<!-- Subategories widget-->
<div class="card mb-4">
    <div class="card-header">Subcategories</div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <ul class="list-unstyled mb-0">
                    @foreach($subcategories as $subcategory)
                    @if($subcategory->id % 2 != 0)
                    <li>
                        <a href="{{ route('post.subcategory', $subcategory->slug) }}">{{ $subcategory->name }}</a>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
            <div class="col-sm-6">
                <ul class="list-unstyled mb-0">
                    @foreach($subcategories as $subcategory)
                    @if($subcategory->id % 2 == 0)
                    <li>
                        <a href="{{ route('post.subcategory', $subcategory->slug) }}">{{ $subcategory->name }}</a>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>