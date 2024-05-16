@foreach ($data as $item)
    <tr id="{{ $item->id }}"">
        <td class="name">{{ $item->name }}</td>
        <td class="harga">{{ $item->harga }}</td>
        <td class="kontak">{{ $item->kontak }}</td>
        <td class="alamat">{{ $item->alamat }}</td>
        <td class="description">{{ $item->description }}</td>
        <td class="img">
            <img class="img-fluid" style="width: 50px"
                src="{{ $item->img != null ? '/img/kost/' . $item->img : 'img/kost/default.jpeg' }}">
        </td>
        <td>
            <div class="d-flex" style="gap: 10px">
                <button type="button" class="btn icon btn-primary" data-toggle="modal"
                    data-target="#update-kost{{ $item->id }}"><i class="fa-solid fa-pen-to-square"></i></button>
                <button type="button" class="btn icon btn-danger btn-delete-kost" data-id="{{ $item->id }}"
                    data-token="{{ csrf_token() }}"><i class="fa-solid fa-trash"></i></button>
            </div>
            <x-kost.update :item="$item" />
        </td>
    </tr>
@endforeach
