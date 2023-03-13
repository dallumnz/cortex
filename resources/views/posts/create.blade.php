@extends('layouts.admin')

@section('content')
<section class="content-main">
    <div class="content-header">
        <h2 class="content-title">Create post </h2>
        <div>
            <a href="{{ route('posts.index') }}" class="btn btn-outline-danger">
                &times; Cancel
            </a>
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
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <form method="POST" action="{{ route('posts.store') }}">
                @csrf
                <input type="hidden" name="post_type"
                    value="{{ ! empty ($sectionType) ? $sectionType : \App\Models\Post::TYPE_NONE }}">
                @include('posts.forms.main-fields')

                @if($sectionType == \App\Models\Post::TYPE_ARTICLE)
                @include('posts.forms.post-article')
                @endif

                <button class="btn btn-primary" type="submit">Submit item</button>
                <div class="row">
                </div>
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