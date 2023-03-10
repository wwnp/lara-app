@extends('layouts.global')
@extends('layouts.main-foredit')
@section('content')
<table class="table table-sm table-striped">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">AUTHOR</th>
        <th scope="col">Role</th>
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
                    <x-form method="put" action="{{ route('roles.update', ['id' => $user->id]) }}">
                        <div class="container-fluid">
                            <x-form-select name="role" placeholder="Выберите роль" label="Роли" :options="$roles" multiple many-relation></x-form-select>
                            <button class="btn btn-success mt-2">Send</button>
                        </div>
                    </x-form>
                    
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection