<nav>
    <a href="/">
        Event Administration Platform
    </a>

    @if(session('loggedIn'))
    <ul>
        <li>
            <a id="manage-events" href="/manage">Manage events</a>
        </li>
        <li role="separator"></li>
        <li>
            <span id="loggedin-user">
                {{ session('username') }}
            </span>
        </li>
        <li>
            <a id="logout" href="/logout">
                Logout
            </a>
        </li>
    </ul>

    @else

    <ul>
        <li>
            <a href="/manage">Login</a>
        </li>
    </ul>
    @endif
    <!-- /end items for guests -->
</nav>
