<tr>
    <th scope="row">{{$event->id}}</th>
    <td>{{$event->user_id}}</td>
    <td>{{$event->title}}</td>
    <td>{{$event->notes}}</td>
    <td>@foreach($event->category as $category)
        {{ $category->name }} <br>
    @endforeach</td>
    <td>{{$event->dt_start}}</td>
    <td>{{$event->dt_end}}</td>
    <td>{{$event->created_at}}</td>
    <td>{{$event->updated_at}}</td>
    <td><a href="{{route('event.item', ['id' => $event->id])}}">Detail</a> </td>
</tr>
