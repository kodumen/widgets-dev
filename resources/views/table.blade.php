<table border="1">
    <tr>
        <th>name</th>
        <th>email</th>
        <th>created_at</th>
        <th>updated_at</th>
    </tr>
    @foreach($data as $d)
        <tr>
            <td>{{$d->name}}</td>
            <td>{{$d->email}}</td>
            <td>{{$d->created_at}}</td>
            <td>{{$d->updated_at}}</td>
        </tr>
    @endforeach
</table>