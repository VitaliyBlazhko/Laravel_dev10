<tr>
    <th scope="row">{{$user->id}}</th>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
    <td>{{$user->created_at}}</td>
    <td>{{$user->updated_at}}</td>
    <td><a href="{{route('user.item', ['id' => $user->id])}}">Detail</a> </td>
</tr>
