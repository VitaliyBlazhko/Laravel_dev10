<tr>
    <th scope="row">{{$category->id}}</th>
    <td>{{$category->name}}</td>
    <td>{{$category->description}}</td>
    <td>{{$category->created_at}}</td>
    <td>{{$category->updated_at}}</td>
    <td><a href="{{route('category.item', ['id' => $category->id])}}">Detail</a> </td>
</tr>
