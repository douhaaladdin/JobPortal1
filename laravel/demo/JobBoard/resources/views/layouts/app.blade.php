<div>

<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <div class="container-fluid">

    <a class="navbar-brand" href="{{ route('jobs.index') }}">JobBoard</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

      <span class="navbar-toggler-icon"></span>

    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item">

          <a class="nav-link active" aria-current="page" href="{{ route('jobs.index') }}">Jobs</a>

        </li>

        <li class="nav-item">

          {{-- If the user is an employer, show the link to their jobs. --}}
          @if(Auth::check() && Auth::user()->role === 'employer')
              <a class="nav-link" href="{{ route('employers.my-jobs') }}">My Jobs</a>
          @endif
          
          {{-- If the user is an admin, show the link to the admin dashboard. --}}
          @if(Auth::check() && Auth::user()->role === 'admin')
              <a class="nav-link" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
          @endif

        </li>

        <li class="nav-item dropdown">

          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">

            Account
          </a>

          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @guest
                <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
            @else
                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</a>
                    </form>
                </li>
            @endguest
          </ul>
        </li>

      </ul>
      
      {{-- This is the search form from the jobs index. You can move this to the index view if you prefer. --}}
      <form class="d-flex" role="search" action="{{ route('jobs.index') }}" method="GET">
          <input class="form-control me-2" type="search" name="keyword" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      
    </div>

  </div>

</nav>