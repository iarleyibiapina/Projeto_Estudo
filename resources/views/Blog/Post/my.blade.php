@extends('Blog.master')

@section('header-intro')
    <h1 class="mb-3 h2">Meus posts criados</h1>
    {{-- <p class="mb-3">Discover the latest articles and insights from our blog.</p> --}}

    {{-- <form class="d-flex justify-content-center" method="GET" action="{{ route('blog.home') }}">
        <input
            class="form-control w-50"
            type="search"
            name="search"
            placeholder="Search posts..."
            aria-label="Search"
            value="{{ request('search') }}">
        <button class="btn btn-primary ms-2" type="submit">Search</button>
    </form> --}}
@endsection

@section('main')
      <!--Section: Content-->
      <section class="text-center">

        @if(request()->has('search') && request('search') != '')
            <h4 class="mb-5"><strong>Search results for "{{ request('search') }}"</strong></h4>
            @else
            <h4 class="mb-5"><strong>Latest posts</strong></h4>
        @endif

        <div class="row">
            @forelse ($posts as $post)
                <div class="col-lg-4 col-md-12 mb-4" title="Postado por {{ $post->user->name }}">
                    <div class="card">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                            <img src="https://mdbootstrap.com/img/new/standard/nature/{{ random_int(0,200)}}.jpg" class="img-fluid" />
                            {{-- <img src="{{ asset($post->thumbnail) }}" class="img-fluid" /> --}}
                            <a href="#!">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mb-3">
                                {{ $post->title }}
                            </h5>
                            <p class="card-text mb-3">
                                {{ Str::limit($post->content, 100, '...') }}
                            </p>
                            <div class="d-flex justify-content-between">
                                <p>
                                    <i class="fas fa-comment"></i>
                                    {{ $post->comments_count }} comentários
                                </p>
                                {{-- adicionar X quantidades de comentarios neste post --}}
                                <a href="{{ route('blog.post.findBySlug', $post->slug) }}" class="btn btn-primary">Read</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p>No posts found.</p>
            @endforelse
        </div>

      </section>
      <!--Section: Content-->

      <!-- Pagination -->
      <nav class="my-4" aria-label="...">
        <ul class="pagination pagination-circle justify-content-center">
          <li class="page-item">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item active" aria-current="page">
            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
          </li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
      </nav>
@endsection
