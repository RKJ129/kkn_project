@extends('main')

@section('content')
    <div class="main-content container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Berita</h3>
                    {{-- <p class="text-subtitle text-muted">There's a lot of form layout that you can use</p> --}}
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class='breadcrumb-header'>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">berita</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <button type="button" class="btn icon icon-left btn-sm btn-primary mb-2" data-toggle="modal"
                        data-target="#create-berita"><i data-feather="plus" width="20"></i>Add</button>
                    <x-berita.create />
                    <table class='table table-striped table-berita' id="table1">
                        <thead>
                            <tr>
                                <th>Thumbnail</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-body-berita">
                            @foreach ($data as $item)
                                <tr id="{{ $item->id }}"">
                                    <td class="thumbnail">
                                        <img class="img-fluid" style="width: 50px"
                                            src="{{ $item->img }}">
                                    </td>
                                    <td class="judul">{{ $item->judul }}</td>
                                    <td class="deskripsi">{{ $item->description }}</td>
                                    <td>
                                        <div class="d-flex" style="gap: 10px">
                                            <button type="button" class="btn icon btn-primary" data-toggle="modal"
                                                data-target="#update-berita{{ $item->id }}"><i
                                                    class="fa-solid fa-pen-to-square"></i></button>
                                            <button type="button" class="btn icon btn-danger btn-delete-berita"
                                                data-id="{{ $item->id }}" data-token="{{ csrf_token() }}"><i class="fa-solid fa-trash"></i></button>
                                        </div>
                                        <x-berita.update :item="$item" />
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
@endsection
