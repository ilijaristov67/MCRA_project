<nav class="navbar navbar-expand-lg bg-body-tertiary px-5 shadow-lg mb-5">
    <div class="container-fluid">

        <a href="{{ url('/dashboard') }}" class="nav-link">Dashboard</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">

            @if (Route::has('login'))
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('users.allUsers')}}" class="nav-link text-decoration-none">Users</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('employees.allEmployees')}}" class="nav-link text-decoration-none">Employees</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('events.allEvents')}}" class="nav-link text-decoration-none">Events</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('blogs.allBlogs')}}" class="nav-link text-decoration-none">Blogs</a>
                </li>
                @auth
                <li class="nav-item">
                    <a href="{{ route('user.show', [ 'id' => Auth::id()]) }}" class="nav-link text-decoration-none">Profile</a>
                </li>
                @if (Auth::user()->role_id === 1)
                <li class="nav-item">
                    <a href="{{ route('admin.adminPanel') }}" class="nav-link text-decoration-none">Admin Panel</a>
                </li>
                @endif

                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link">Logout</button>
                    </form>
                </li>

                @else

                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link">Log in</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                </li>
                @endif
                @endauth

            </ul>
            @endif
        </div>
    </div>
</nav>