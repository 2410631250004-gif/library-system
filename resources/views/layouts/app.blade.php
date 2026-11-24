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
            <a href="{{ route('dashboard') }}">Dashboard</a> |
            <a href="{{ route('categories.index') }}">Kategori</a> |
            <a href="{{ route('books.index') }}">Buku</a> |
            <a href="{{ route('members.index') }}">Anggota</a> |
            <a href="{{ route('borrowings.index') }}">Peminjaman</a>

            @can('manage-users')
                | <a href="{{ route('users.index') }}">Pengguna</a>
            @endcan

            @auth
                | {{ auth()->user()->name }} ({{ auth()->user()->role }})
                <form action="{{ route('logout') }}" method="POST" style="display:inline">
                    @csrf
                    <button type="submit">Logout</button>
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
