@extends('layouts.main')

@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Blog</h1>
            <section class="featured-posts-section">
                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{ 'storage/' . $post->preview_img }}" alt="blog post">
                            </div>
                            <p class="blog-post-category">
                                {{ $post->category->title }}
                            </p>
                            <a href="#" class="blog-post-permalink">
                                <h6 class="blog-post-title">
                                    {{ $post->title }}
                                </h6>
                            </a>
                        </div>
                    @endforeach
                    <div data-aos="fade-right">
                        {{ $posts->links() }}
                    </div>
                </div>
            </section>
        </div>
    </main>


    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Most liked posts</h1>
            <section class="featured-posts-section">
                <div class="row">
                    @foreach ($likedPosts as $post)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{ 'storage/' . $post->preview_img }}" alt="blog post">
                            </div>
                            <p class="blog-post-category">
                                {{ $post->category->title }}
                            </p>
                            <a href="#" class="blog-post-permalink">
                                <h6 class="blog-post-title">
                                    {{ $post->title }}
                                </h6>
                            </a>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </main>
@endsection
