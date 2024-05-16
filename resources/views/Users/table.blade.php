@foreach ($users as $user)
    <tr id="{{ $user->id }}"">
        <td class="img">
            <img class="img-fluid" style="width: 50px"
                src="{{ $user->img != null ? '/img/users/' . $user->img : '/img/users/user_default.jpeg' }}">
        </td>
        <td class="name">{{ $user->name }}</td>
        <td class="email">{{ $user->email }}</td>
        <td>
            <div class="d-flex" style="gap: 10px">
                <button type="button" class="btn icon btn-primary" data-toggle="modal"
                    data-target="#update-user{{ $user->id }}"><i class="fa-solid fa-pen-to-square"></i></button>
                <button type="button" class="btn icon btn-warning" data-toggle="modal"
                    data-target="#update-user-password{{ $user->id }}"><i class="fa-solid fa-lock"></i></button>
                <button type="button" class="btn icon btn-danger btn-delete-user" id="btn-delete-user"
                    data-id="{{ $user->id }}" data-token="{{ csrf_token() }}"><i
                        class="fa-solid fa-trash"></i></button>
            </div>
            <x-users.update :user="$user" />
            <x-users.updatePassword :user="$user" />
        </td>
    </tr>
@endforeach
