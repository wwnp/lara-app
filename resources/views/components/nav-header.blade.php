@auth
<a href="{{ route('profile.index')}}" class="btn btn-warning">Личный кабинет</a>
@else
<a href="{{ route('login.create')}}" class="btn btn-success">Войти</a>
@endif
<a href="{{ route('posts.index')}}" class="btn btn-dark">Главная</a>