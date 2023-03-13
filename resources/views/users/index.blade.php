@extends('layouts.global')
@extends('layouts.main-foredit')
@section('content')
<table class="table table-sm table-striped">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">AUTHOR</th>
        <th scope="col">Roles</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>
                    @foreach ($user->roles as $role)
                        {{ $role->role }}
                    @endforeach
                </td>
                <td>
                    <x-form method="put" action="{{ route('users.manage', ['id' => $user->id]) }}">
                        <div class="container-fluid">
                            @bind($user)
                            <x-form-select name="roles[]" placeholder="Выберите роль" label="Роли" :options="$roles" multiple many-relation></x-form-select>
                            <x-form-input hidden name='user_id' :value="$user->id"></x-form-input>
                            <button class="btn btn-success mt-2">Send</button>
                            @endbind
                        </div>
                    </x-form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-center">
    {{ $users->links() }}
</div>
@endsection