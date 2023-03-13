@extends('layouts.admin')

@section('content')
<section class="content-main">
    <div class="content-header">
        <h2 class="content-title">Edit post </h2>
        <div>
            <a href="{{ route('posts.index') }}" class="btn btn-outline-danger"> &times; Cancel</a>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Errors: </strong>
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form method="POST" enctype="multipart/form-data" action={{ route('posts.update', $post->id) }}>
                @csrf
                <input type="hidden" id="sectionType" name="post_type" value="{{ $post->post_type}}">
                <div class="mb-4">
                    <label for="title" class="form-label">Post title</label>
                    <input type="text" class="form-control" name="title" value="{{ $post->title }}">
                </div>

                <div class="mb-4">
                    <label class="form-label">Post description</label>
                    <textarea class="form-control" rows="4" name="description">{{ $post->description }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="product_name" class="form-label">Tags</label>
                    <input type="text" class="form-control" name="tags" value="{{ $post->tags }}">
                </div>

                <div class="mb-4">
                    <label for="product_name" class="form-label">Keywords</label>
                    <input type="text" class="form-control" name="keywords" value="{{ $post->keywords }}">
                </div>

                <div class="row gx-2">
                    <div class="col-sm-6 mb-3">
                        <label class="form-label">Category</label>
                        <select class="form-select" id="category" name="category_id">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ ($category->id == $subcategory) ? 'selected' : ''}}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label class="form-label">Sub-category</label>
                        <select class="form-select" id="subcategory" name="subcategory_id">
                            @foreach($subcategories as $value)
                            <option value="{{ $value->id }}" {{ ($value->id == $subcategory) ? 'selected' : '' }}>{{
                                $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div> <!-- row -->

                <div class="row gx-2">
                    <div class="col-sm-6 mb-3">
                        <label class="form-label">Publish</label>
                        <div class="col">
                            <input class="form-check-input" type="checkbox" name="status" {{ ($post->status == 1) ?
                            'checked' : '' }}>
                            <span class="form-check-label"> Publish on website </span>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label class="form-label">Visibility</label>
                        <select class="form-select" name="visibility">
                            <option value="1" {{ ($post->visibility == 1) ? 'selected' : '' }}> Public </option>
                            <option value="0" {{ ($post->visibility == 0) ? 'selected' : '' }}> Private </option>
                        </select>
                    </div>
                </div> <!-- row -->

                <div class="mb-4">
                    <label class="form-label">Attributes</label>
                    <div class="row gx-2">
                        <div class="col-3">
                            <input class="form-check-input" type="checkbox" name="featured" {{ ($post->featured == 1) ?
                            'checked' : '' }}>
                            <span class="form-check-label"> Featured </span>
                        </div>
                        <div class="col-3">
                            <input class="form-check-input" type="checkbox" name="breaking" {{ ($post->breaking == 1) ?
                            'checked' : '' }}>
                            <span class="form-check-label"> Breaking </span>
                        </div>
                        <div class="col-3">
                            <input class="form-check-input" type="checkbox" name="recommended" {{ ($post->recommended ==
                            1) ? 'checked' : '' }}>
                            <span class="form-check-label"> Recommended </span>
                        </div>
                        <div class="col-3">
                            <input class="form-check-input" type="checkbox" name="headline" {{ ($post->headline == 1) ?
                            'checked' : '' }}>
                            <span class=" form-check-label"> Headline </span>
                        </div>
                    </div> <!-- row -->
                </div>

                @if(isset($article))
                <div class="mb-4">
                    <label class="form-label">Image upload</label>
                    <input class="form-control" type="file" id="image" name="post_image">
                    <label class="form-label">Article content</label>
                    <textarea id="markdown-editor" class="form-control" rows="4"
                        name="content">{{ $article->content }}</textarea>
                </div>
                @endif

                <button class="btn btn-primary" type="submit">Submit item</button>

            </form>
        </div>
    </div> <!-- card end -->

</section>
@endsection

@section('page-js')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.js"></script>
<script>
    const easyMDE = new EasyMDE({
            //showIcons: ['strikethrough', 'code', 'table', 'redo', 'heading', 'undo', 'heading-bigger', 'heading-smaller', 'heading-1', 'heading-2', 'heading-3', 'clean-block', 'horizontal-rule'],
            element: document.getElementById('markdown-editor')
        });
</script>
<script type="module">
    $(function () {
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#category').change(function(){
        var id = $(this).val();
        var url = "{{ url('select/subcategory') }}";
        $.post(url,{ option: id },
        function(data) {
            $('#subcategory').empty();
            $('#subcategory').append("<option value=''>Please choose</option>");

            if(data.length != 0) {
                document.getElementById("subcategory").disabled=false;
            } else {
                document.getElementById("subcategory").disabled=true;
            }

            $.each(data, function(index, element) {
                $('#subcategory').append("<option value='"+ element.id +"'>" + element.name + "</option>");
            });
        });
    });
});
</script>
@endsection