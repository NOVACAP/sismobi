<table>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $usr)
        <tr>
            <td>{{ $usr->name }}</td>
            <td>{{ $usr->email }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
