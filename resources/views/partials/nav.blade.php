<nav class="navbar navbar-light bg-light d-flex justify-content-between">
    <span class="navbar-brand mb-0 h1">Quiz App</span>

    <div class="dropdown">
        @if(session('name'))
            <button class="btn btn-link dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                 {{ session('name') }}
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        @endif
    </div>
</nav>