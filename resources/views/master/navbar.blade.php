
    <nav class="navbar navbar-expand navbar-dark bg-dark">
        <div class="container-fluid">

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>
              </li>


              @if (auth()->check())
              <li class="nav-item">
                <a class="nav-link" href="{{route('profile.show')}}">
                {{ auth()->user()->name}}
            </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('post.create')}}">Ajouter</a>
              </li>
              @else
              <li class="nav-item">
                <a class="nav-link" href="{{url('/register')}}">Inscreption</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/login')}}">Connexion</a>
              </li>

              @endif

            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>

