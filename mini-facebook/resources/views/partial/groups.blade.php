@foreach($groups as $group)
    <span class="edit-group" data-group-id="{{$group->id}}"><i class="fas fa-edit"></i></span>

    <li class="group-item" data-group-id="{{$group->id}}">
        <div class="avatar-container">
            <img src="{{$group->group_avatar}}">
        </div>

        <span class="name">{{substr($group->name, 0, 15) . '...'}}</span>
    </li>

@endforeach