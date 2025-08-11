<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('home') }}">Mio Sito</a>
    <ul class="navbar-nav">
      <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('chi-siamo') }}">Chi Siamo</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('contatti') }}">Contatti</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('articles.index') }}">Articoli</a></li>
      
      <li class="nav-item">
        
        @auth
        
        
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-regular fa-circle-user"></i>{{ auth()->user()->name }}
          </a>
          <ul class="dropdown-menu">
            <li class="nav-item"><a class="nav-link" href="{{ route('articles.create') }}">Crea Articolo</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">I miei annunci</a></li>

            
            <li><hr class="dropdown-divider"></li>
            <li class="nav-item">
              <form class="nav-link" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-link text-decoration-none text-danger">Esci</button>
              </form>
            </li>
          </ul>
        </li>
        
        @endauth
        
        @guest
        
        <li class="nav-item text-primary"><a class="nav-link" href="{{ route('register') }}"><i class="fa-solid fa-lock"></i>Accedi</a></li>
        
        @endguest
      </li>
    </ul>
  </div>
</nav>