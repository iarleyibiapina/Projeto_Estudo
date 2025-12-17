      <div class="container-fluid">
        <!-- Navbar brand -->
        <a class="navbar-brand" target="_blank" href="https://mdbootstrap.com/docs/standard/">
          <img src="https://mdbootstrap.com/img/logo/mdb-transaprent-noshadows.png" height="16" alt="" loading="lazy"
            style="margin-top: -3px;" />
        </a>
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
          aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarExample01">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item active">
              <a class="nav-link" aria-current="page" href="{{ route('blog.home') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="{{ route('blog.post.getCreatePostView') }}">Criar um post novo</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="{{ route('blog.post.getMyCreatedPostsView') }}">Meus posts criados</a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                href="{{ route('blog.post.getAllPostsView') }}"
                >Todos os posts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('blog.auth.logout') }}" rel="nofollow"
                target="_blank">Logout</a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link"
                href="{{ route('blog.auth.loginView') }}"
                >Login</a>
            </li>
          </ul>

          <ul class="navbar-nav d-flex flex-row">
            <li>
                @if(auth()->user())
                    <p>Logado como:<span class="fw-bold ms-2">{{ auth()->user()->name}}</span></p>
                    @else
                    <p>Não logado</p>
                @endif
            </li>
          </ul>
        </div>
      </div>
