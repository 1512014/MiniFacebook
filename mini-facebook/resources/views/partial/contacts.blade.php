@foreach($current_user_friends as $current_user_friend)
    <li class="contact-item" data-user-id="{{$current_user_friend->user_data->id}}">
        <img src="{{$current_user_friend->user_data->avatar}}">
        <span class="name">{{$current_user_friend->user_data->name}}</span>
    </li>
@endforeach