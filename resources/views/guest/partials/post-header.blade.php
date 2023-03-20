<!-- Post header-->
<header class="mb-4">
    <!-- Post title-->
    <h1 class="fw-bolder mb-1">{{ $post->title }}</h1>
    <!-- Post meta content-->
    <div class="text-muted fst-italic mb-2">
        Posted on {{ $post->created_at->format(setting('long-date-format')) }} by {{ $post->user->name }}
    </div>
    <!-- Post categories-->
    <a class="badge bg-primary text-decoration-none link-light"
        href="{{ route('post.category', $post->category->slug) }}">
        {{$post->category->name }}
    </a>
    <a class="badge bg-secondary text-decoration-none link-light">{{ $post->subcategory->name }}</a>
</header>