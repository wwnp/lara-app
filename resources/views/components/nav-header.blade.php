<a href="{{ route('posts.index')}}" class="btn btn-sm btn-dark">Главная</a>
@auth
<a href="{{ route('profile.index')}}" class="btn btn-sm btn-warning">Личный кабинет</a>
{{ Auth::user()->role }}
@else
<a href="{{ route('login.create')}}" class="btn btn-sm btn-success">Войти</a>
<a href="{{ route('signup.create')}}" class="btn btn-sm btn-success">Зарегистрироваться</a>
@endif
