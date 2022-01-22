 @foreach($childs as $child)
  <div class="col-md-6">
    <li><a href="{{ url('/') }}/category/{{ $child->category_id }}">{{ $child->title }}</a></li>
  </div>
 {{-- <li><a class="dropdown-item {{ count($child->childs) ? 'dropdown-toggle' :'' }}" href="#" style="border:1px solid #ccc;">{{ $child->title }}</a>
       @if(count($child->childs))
          <ul class="dropdown-menu">
              <li>
                 <a class="dropdown-item" href="#" style="position: absolute;">
                       @include('menu.menusub',['childs' => $child->childs])
                    </a>
                </li>
            </ul>
        @endif
   </li> --}}
 @endforeach