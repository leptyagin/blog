@extends('layouts.main')

@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">
                {{ $date->translatedFormat('F') }} {{ $date->day }}, {{ $date->year }} | {{ $date->format('H:i') }} |
                {{ $post->comments->count() }} Комментария
            </p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{ asset('storage/' . $post->main_img) }}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        {!! $post->content !!}
                    </div>
                </div>
            </section>

            <section>
                <form action="{{ route('post.like.store', $post->id) }}" method="post">
                    @csrf
                    <span>{{ $post->liked_users_count }}</span>
                    <button type="submit" class="border-0 bg-transparent">
                        @auth
                            @if (auth()->user()->likedPosts->contains($post->id))
                                <i class="fas fa-heart"></i>
                            @else
                                <i class="far fa-heart"></i>
                            @endif
                        @endauth
                    </button>
                </form>
            </section>

            @if ($relatedPosts->count() > 0)
                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        <section class="related-posts">
                            <h2 class="section-title mb-4" data-aos="fade-up">Related Posts</h2>
                            <div class="row">
                                @foreach ($relatedPosts as $relatedPost)
                                    <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                        <img src="{{ asset('storage/' . $relatedPost->preview_img) }}" alt="related post"
                                            class="post-thumbnail">
                                        <p class="post-category">{{ $relatedPost->category->title }}</p>
                                        <a href="{{ route('post.show', $relatedPost->id) }}"
                                            class="post-title">{{ $relatedPost->title }}</a>
                                    </div>
                                @endforeach
                            </div>
                        </section>

                        <section class="comment-list">
                            <h2 class="section-title mb-5" data-aos="fade-up">Comments ({{ $post->comments->count() }})
                            </h2>
                            @foreach ($post->comments as $comment)
                                <div class="comment-text mt-4">
                                    <span class="username">
                                        {{ $comment->user->name }}
                                        <span class="text-muted float-right">
                                            {{ $comment->DateAsCorbon->diffForHumans() }}
                                        </span>
                                    </span>

                                    <div class="mt-2">
                                        {{ $comment->message }}
                                    </div>
                                </div>
                            @endforeach
                        </section>

                        @auth
                            <section class="comment-section mt-5">
                                <h2 class="section-title mb-5" data-aos="fade-up">Leave a Reply</h2>
                                <form action="{{ route('post.comment.store', $post->id) }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-12" data-aos="fade-up">
                                            <label for="comment" class="sr-only">Comment</label>
                                            <textarea name="message" id="comment" class="form-control" placeholder="Comment" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12" data-aos="fade-up">
                                            <input type="submit" value="Send Message" class="btn btn-warning">
                                        </div>
                                    </div>
                                </form>
                            </section>
                        @endauth
                    </div>
                </div>
            @endif

        </div>
    </main>
@endsection
