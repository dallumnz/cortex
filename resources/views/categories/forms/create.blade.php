<form method="POST" action="{{ route('categories.store') }}">
    @csrf
    <div class="mb-4">
        <label for="category_name" class="form-label">Name</label>
        <input type="text" class="form-control" id="category_name" name="name" required />
    </div>
    {{-- <div class="mb-4">
        <label for="category_slug" class="form-label">Slug</label>
        <input type="text" class="form-control" id="category_slug" name="slug" disabled />
    </div> --}}
    <div class="mb-4">
        <label class="form-label">Description</label>
        <textarea placeholder="Type here" class="form-control" rows="4" name="description" required></textarea>
    </div>
    <div class="d-grid">
        <button class="btn btn-primary">Create category</button>
    </div>
</form>