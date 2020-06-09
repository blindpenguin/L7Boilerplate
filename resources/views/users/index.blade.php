<table>
    <thead>
    <th>Name</th>
    <th>E-Mail</th>
    <th>Created At</th>
    <th>Updated At</th>
    <th>Actions</th>
    </thead>
    <tbody>
    @foreach($users as $user)
    <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->created_at }}</td>
        <td>{{ $user->updated_at }}</td>
        <td>
            <a href="{{ route('users.show', $user->id) }}">Show</a>
            <a href="{{ route('users.edit', $user->id) }}">Edit</a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
