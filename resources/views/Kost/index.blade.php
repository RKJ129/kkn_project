@extends('main')

@section('content')
    <div class="main-content container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Kost</h3>
                    {{-- <p class="text-subtitle text-muted">There's a lot of form layout that you can use</p> --}}
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class='breadcrumb-header'>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Kost</li>
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
                        data-target="#create-kost"><i data-feather="plus" width="20"></i>Add</button>
                    <x-kost.create />
                    <table class='table table-striped table-responsive table-kost' id="table1">
                        <thead>
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Kontak</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-body-kost">
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
                                                data-target="#update-kost{{ $item->id }}"><i
                                                    class="fa-solid fa-pen-to-square"></i></button>
                                            <button type="button" class="btn icon btn-danger btn-delete-kost"
                                                data-id="{{ $item->id }}" data-token="{{ csrf_token() }}"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </div>
                                        <x-kost.update :item="$item" />
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
