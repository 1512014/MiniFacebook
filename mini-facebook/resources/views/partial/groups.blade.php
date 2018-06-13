@foreach($groups as $group)
    <li class="contact-item" data-group-id="{{$group->id}}">
        <div class="avatar-container">
            <img src="{{$group->group_avatar}}">
        </div>

        <span class="name">{{substr($group->name, 0, 15) . '...'}}</span>
    </li>
@endforeach