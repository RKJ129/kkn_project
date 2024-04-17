@foreach ($data as $item)
    <tr id="{{ $item->id }}">
        <td class="thumbnail">
            <img class="img-fluid" style="width: 50px" src="{{ $item->img }}">
        </td>
        <td class="judul">{{ $item->judul }}</td>
        <td class="deskripsi">{{ $item->description }}</td>
        <td>
            <div class="d-flex" style="gap: 10px">
                <button type="button" class="btn icon btn-primary" data-toggle="modal"
                    data-target="#update-berita{{ $item->id }}"><i class="fa-solid fa-pen-to-square"></i></button>
                <button type="button" class="btn icon btn-danger btn-delete-berita" data-id="{{ $item->id }}"
                    data-token="{{ csrf_token() }}"><i class="fa-solid fa-trash"></i></button>
            </div>
            <x-berita.update :item="$item" />
        </td>
    </tr>
@endforeach
