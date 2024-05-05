@foreach ($data as $item)
    <tr id="{{ $item->id }}"">
        <td class="img">
            <img class="img-fluid" style="width: 50px"
                src="{{ Storage::url($user->img != null ? 'public/users/' . $user->img : 'public/users/user_default.jpeg') }}">
        </td>
        <td class="name">{{ $item->name }}</td>
        <td class="email">{{ $item->email }}</td>
        <td>
            <div class="d-flex" style="gap: 10px">
                <button type="button" class="btn icon btn-primary" data-toggle="modal"
                    data-target="#update-user{{ $item->id }}"><i class="fa-solid fa-pen-to-square"></i></button>
                <button type="button" class="btn icon btn-danger btn-delete-user" data-id="{{ $item->id }}"
                    data-token="{{ csrf_token() }}"><i class="fa-solid fa-trash"></i></button>
            </div>
            <x-kost.update :item="$item" />
        </td>
    </tr>
@endforeach
