<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('assets/images/csdd.png') }}" alt="Logo" style="width: 30px; height: 30px;">
        <span class="nav-title">Drone Disaster Management</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          @if (!Auth::check())
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">Login</a>
              </li>
          @endif
        @auth
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('drones.index') }}">Drones</a>
        </li>
        @if (Auth::user()->role_id == 1)
          <li class="nav-item">
            <a class="nav-link" href="{{ route('controllers') }}">Controllers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('disaster-categories.index') }}">Categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('locations.index') }}">Locations</a>
          </li>
        @endif
        <li class="nav-item">
          <a class="nav-link" href="{{ route('disasters.index') }}">Disasters</a>
        </li>
        @if (Auth::user()->role_id == 2)
        <li class="nav-item">
          <a class="nav-link" href="{{ route('drones.mission') }}">New Mission</a>
        </li>
        @endif
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('profile.edit') }}">
                  Profile
              </a>
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                  Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
          </div>
      </li>    
        @endauth
        </ul>
      </div>
    </div>
  </nav>