<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') - Library System</title>
</head>
<body>

    <header>
        <h1>Library System</h1>
        <nav>
            <a href="{{ route('books.index') }}">Books</a> |
            <a href="{{ route('categories.index') }}">Categories</a> |
            <a href="{{ route('members.index') }}">Members</a> |
            @can('manage-users')
                <a href="{{ route('users.index') }}">Kelola Pengguna</a> |
            @endcan

            @auth
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" style="background:none; border:none; color:blue; text-decoration:underline; cursor:pointer;">Logout</button>
                </form>
            @endauth
        </nav>
        <hr>
    </header>

    <main>
        @if(session('success'))
            <div style="color: green; margin-bottom: 10px;">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div style="color: red; margin-bottom: 10px;">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer>
        <hr>
        <p>Library System &copy; {{ date('Y') }}</p>
    </footer>

</body>
</html>
