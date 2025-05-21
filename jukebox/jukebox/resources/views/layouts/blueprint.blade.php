<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jukebox</title>
    <link rel="stylesheet" href="/css/app.css">
    @yield('head')
    <style>
        .layout-container {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            background: #222326;
            color: #fff;
            width: 220px;
            padding: 32px 0 0 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: 2px 0 8px rgba(0,0,0,0.08);
        }
        .sidebar h2 {
            color: #1DB954;
            font-size: 1.6em;
            margin-bottom: 2.5em;
            font-family: 'Circular Std', Arial, Helvetica, sans-serif;
            letter-spacing: 1px;
        }
        .sidebar nav {
            width: 100%;
        }
        .sidebar ul {
            display: flex;
            flex-direction: column;
            gap: 1.2em;
            width: 100%;
            padding: 0;
            margin: 0;
        }
        .sidebar li {
            width: 100%;
            margin: 0;
        }
        .sidebar a {
            display: block;
            width: 100%;
            padding: 12px 32px;
            color: #fff;
            border-radius: 0 20px 20px 0;
            font-size: 1.1em;
            font-weight: 500;
            text-decoration: none;
            transition: background 0.2s, color 0.2s;
        }
        .sidebar a:hover, .sidebar a.active {
            background: #1DB954;
            color: #191414;
        }
        .main-content {
            flex: 1;
            padding: 40px 5vw 80px 5vw;
            background: #191414;
            min-height: 100vh;
        }
        header {
            width: 100%;
            padding: 24px 0 16px 0;
            background: transparent;
            text-align: left;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header-content {
            flex: 1;
        }
        .auth-links {
            display: flex;
            gap: 20px;
            align-items: center;
        }
        .auth-links a {
            color: #fff;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 20px;
            transition: background 0.2s;
        }
        .auth-links a:hover {
            background: #1DB954;
            color: #191414;
        }
        .auth-links .user-name {
            color: #1DB954;
            margin-right: 10px;
        }
        header h1 {
            color: #fff;
            font-size: 2.2em;
            font-weight: 700;
            margin: 0 0 0.2em 0;
            letter-spacing: 1px;
        }
        header p {
            color: #b3b3b3;
            font-size: 1.1em;
            margin: 0;
        }
        .footer {
            background: #222326;
            color: #b3b3b3;
            text-align: center;
            padding: 20px 0;
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            font-size: 1em;
        }
        @media (max-width: 900px) {
            .layout-container { flex-direction: column; }
            .sidebar { flex-direction: row; width: 100%; padding: 0; justify-content: center; }
            .sidebar h2 { display: none; }
            .sidebar nav ul { flex-direction: row; gap: 0.5em; }
            .sidebar a { border-radius: 20px; padding: 10px 18px; font-size: 1em; }
            .main-content { padding: 24px 2vw 80px 2vw; }
        }
    </style>
</head>
<body>
<div class="layout-container">
    <aside class="sidebar">
        <h2>Jukebox</h2>
        <nav>
            <ul>
                <li><a href="/artists">Artists</a></li>
                <li><a href="/albums">Albums</a></li>
                <li><a href="/songs">Songs</a></li>
                <li><a href="/playlist">Playlists</a></li>
                <li><a href="/genres">Genres</a></li>
            </ul>
        </nav>
    </aside>
    <main class="main-content">
        <header>
            <div class="header-content">
                <h1>@yield('page_title', 'Welcome!')</h1>
                <p>@yield('page_subtitle', 'Your personal music collection.')</p>
            </div>
            <div class="auth-links">
                @auth
                    <span class="user-name">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                            Logout
                        </a>
                    </form>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                @endauth
            </div>
        </header>
        @yield('body')
        @yield('goback')
    </main>
</div>
<div class="footer">
    <footer>
        <p>Jukebox &copy; {{ date('Y') }} &mdash; Made with <span style="color:#1DB954;">&#9835;</span> for music lovers</p>
    </footer>
</div>
</body>
</html>