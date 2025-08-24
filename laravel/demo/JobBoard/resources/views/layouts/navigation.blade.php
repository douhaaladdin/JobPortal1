<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">JobBoard</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="mainNav" class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <!-- رابط عام للجميع -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('jobs.index') }}">All Jobs</a>
                </li>

                @auth
                    {{-- روابط الـ Admin --}}
                    @if(Auth::user()->isAdmin())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.jobs.pending') }}">Pending Jobs</a>
                        </li>
                    @endif

                    {{-- روابط الـ Employer --}}
                    @if(Auth::user()->isEmployer())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('jobs.create') }}">Post Job</a>
                        </li>
                    @endif

                    {{-- روابط الـ Candidate --}}
                    @if(Auth::user()->isCandidate())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('jobs.index') }}">Browse Jobs</a>
                        </li>
                    @endif

                    <!-- Profile + Logout -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile.edit') }}">{{ Auth::user()->name }}</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-link nav-link" type="submit">Logout</button>
                        </form>
                    </li>
                @else
                    <!-- لو مش عامل login -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
