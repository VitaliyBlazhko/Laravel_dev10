<tr>
    <th scope="row">{{$event->id}}</th>
    <td>{{$event->event}}</td>
    <td>{{$event->description}}</td>
    <td>{{$event->created_at}}</td>
    <td>{{$event->updated_at}}</td>
    <td><a href="{{route('event.item', ['id' => $event->id])}}">Detail</a> </td>
</tr>
