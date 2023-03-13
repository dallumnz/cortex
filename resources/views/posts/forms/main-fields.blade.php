<div class="mb-4">
    <label for="title" class="form-label">Article title</label>
    <input type="text" placeholder="Type here" class="form-control" id="title" name="title">
</div>

<div class="mb-4">
    <label class="form-label">Article description</label>
    <textarea placeholder="Type here" class="form-control" rows="4" name="description"></textarea>
</div>

<div class="mb-4">
    <label for="product_name" class="form-label">Tags</label>
    <input type="text" class="form-control" name="tags">
</div>

<div class="mb-4">
    <label for="product_name" class="form-label">Keywords</label>
    <input type="text" class="form-control" name="keywords">
</div>

<div class="row gx-2">
    <div class="col-sm-6 mb-3">
        <label class="form-label">Category</label>
        <select class="form-select" id="category" name="category_id">
            @foreach ($categories as $category)
            <option value="{{ $category->id }}"> {{ $category->name }} </option>
            @endforeach
        </select>
    </div>
    <div class="col-sm-6 mb-3">
        <label class="form-label">Subcategory</label>
        <select class="form-select" id="subcategory" name="subcategory_id" disabled>
            <option value="">Please select</option>
        </select>
    </div>
</div> <!-- row -->

<div class="row gx-2">
    <div class="col-sm-6 mb-3">
        <label class="form-label">Publish</label>
        <div class="col">
            <input class="form-check-input" type="checkbox" name="status">
            <span class="form-check-label"> Publish on website </span>
        </div>
    </div>
    <div class="col-sm-6 mb-3">
        <label class="form-label">Visibility</label>
        <select class="form-select" name="visibility">
            <option value="1"> Public </option>
            <option value="0"> Private </option>
        </select>
    </div>
</div> <!-- row -->

<div class="mb-4">
    <label class="form-label">Attributes</label>
    <div class="row gx-2">
        <div class="col-3">
            <input class="form-check-input" type="checkbox" name="featured">
            <span class="form-check-label"> Featured </span>
        </div>
        <div class="col-3">
            <input class="form-check-input" type="checkbox" name="breaking">
            <span class="form-check-label"> Breaking </span>
        </div>
        <div class="col-3">
            <input class="form-check-input" type="checkbox" name="recommended">
            <span class="form-check-label"> Recommended </span>
        </div>
        <div class="col-3">
            <input class="form-check-input" type="checkbox" name="headline">
            <span class="form-check-label"> Headline </span>
        </div>
    </div> <!-- row -->
</div>