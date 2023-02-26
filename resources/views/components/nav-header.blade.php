@auth
<a href="{{ route('auth.profile')}}" class="btn btn-warning">Profile</a>
@else
<a href="{{ route('login.create')}}" class="btn btn-success">Login</a>
@endif