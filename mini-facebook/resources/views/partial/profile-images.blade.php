<div class="profile-images">
    <img class="cover" src="{{$user->cover}}">
    <div class="avatar-container">
        <img class="avatar" src="{{$user->avatar}}">
    </div>
    <ul class="friend-option">
        <li><a href="{{route('user-about', ['id' => $user->id])}}">About</a> </li>
        <li><a href="{{route('user-friend-list', ['id' => $user->id])}}">Friends</a> </li>
        @if($user->id == Auth::user()->id)
            <li><a href="{{route('user-friend-request', ['id' => $user->id])}}">Request</a> </li>
            <li><a href="{{route('user-avatar-cover', ['id' => $user->id])}}">Avatar & Cover</a> </li>
        @endif
    </ul>

    @if($user->is_friend)
        <div class="btn-group profile-image-buttons">
            <button type="button" class="btn btn-default">
                <i class="fas fa-comment"></i> Message
            </button>
        </div>
    @elseif($user->id != Auth::user()->id)
    <div class="btn-group profile-image-buttons">
        <button type="button" class="btn btn-default">
            <i class="fas fa-user-plus"></i> Add Friend
        </button>
        <button type="button" class="btn btn-default">
            <i class="fas fa-comment"></i> Message
        </button>
    </div>
    @endif

</div>