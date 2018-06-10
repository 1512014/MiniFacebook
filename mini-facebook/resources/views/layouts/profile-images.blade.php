<div class="profile-images">
    <img class="cover" src="{{$user->cover}}">
    <div class="avatar-container">
        <img class="avatar" src="{{$user->avatar}}">
    </div>
    <ul class="friend-option">
        <li><a href="{{route('user-about', ['id' => Auth::user()->id])}}">About</a> </li>
        <li><a href="{{route('user-friend-list', ['id' => Auth::user()->id])}}">Friends</a> </li>
        <li><a href="{{route('user-friend-request', ['id' => Auth::user()->id])}}">Request</a> </li>
        <li><a href="{{route('user-avatar-cover', ['id' => Auth::user()->id])}}">Avatar & Cover</a> </li>
    </ul>

    <div class="btn-group profile-image-buttons">
        <button type="button" class="btn btn-default">
            <i class="fas fa-user-plus"></i> Add Friend
        </button>
        <button type="button" class="btn btn-default">
            <i class="fas fa-comment"></i> Message
        </button>
    </div>

</div>