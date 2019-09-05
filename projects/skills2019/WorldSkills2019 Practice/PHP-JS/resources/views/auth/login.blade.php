@if(\Illuminate\Support\Facades\Session::has('error'))
    {{ \Illuminate\Support\Facades\Session::get('error') }}
@endif

<div class="header">
    Login
</div>

<div class="body">
    <form method="POST" action="/login">
        @csrf
        <div>
            <label for="username">Username</label>
            <input id="username" type="text" name="username">
        </div>

        <div>
            <label for="password">Password</label>
            <input id="password" type="password" name="password">
        </div>

        <div>
            <button type="submit" id="login">
                Login
            </button>
        </div>
    </form>
</div>
