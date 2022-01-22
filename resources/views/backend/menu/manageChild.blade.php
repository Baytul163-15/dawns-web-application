<ul>
@foreach($childs as $child)
   <li>
       {{ $child->title }} <div class="btn-group"><a href="{{ url('admin/edit-menu',$child->id) }}" class="badge badge-info text-white">Edit</a> <form action="{{ url('admin/delete-menu',$child->id) }}" method="POST">{{ csrf_field() }}<button type="submit" class="badge badge-danger">Delete</button></form></div>
   @if(count($child->childs))
            @include('manageChild',['childs' => $child->childs])
        @endif
   </li>
@endforeach
</ul>