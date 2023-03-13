<form method="POST" action={{ route('subcategories.store', $parent_id) }}>
    @csrf
    <div class="mb-4">
        <label for="category_name" class="form-label">Name</label>
        <input type="text" placeholder="Type here" class="form-control" id="category_name" name="name" />
    </div>
    {{-- <div class="mb-4">
        <label for="category_slug" class="form-label">Slug</label>
        <input type="text" class="form-control" id="category_slug" name="slug" disabled />
    </div> --}}
    {{--<div class="mb-4">
        <label class="form-label">Parent Category</label>
        <select class="form-select" name="parent_category_id">
            @foreach($categories as $category)
            <option value="{{ $category->id }}" @if($category->id == $parent_id) selected @endif>
                {{ $category->name }}
            </option>
            @endforeach
        </select>
    </div>--}}
    <input type="hidden" name="parent_category_id" value="{{ $parent_id }}">
    <div class="d-grid">
        <button class="btn btn-primary">Create subcategory</button>
    </div>
</form>