<h1>Kelola Pengguna</h1>

<table border="1" cellpadding="6">
    <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>Role</th>
    </tr>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
        </tr>
    @endforeach
</table>

@can('manage-users')
    <a href="{{ route('users.index') }}">Kelola Pengguna</a>
@endcan