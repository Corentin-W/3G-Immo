<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container-fluid">
      <a href="{{route('browse')}}"><img src="https://www.3gimmobilier.com/system/images/commun/rejoignez_nous.gif" width="55px"></a>
      <a class="navbar-brand" href="{{route('browse')}}"> 3G-IMMO</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      @auth
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('browse')}}">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('agents-list')}}">Agents</a>
          </li>
        </ul>
      </div>
        <a class="btn btn-info m-3 " href="{{route('create')}}">Ajout d'une nouvelle annonce</a>
        <a class="btn btn-danger" href="{{route('logout')}}">Déconnexion</a>
      @endauth
    </div>
  </nav>
