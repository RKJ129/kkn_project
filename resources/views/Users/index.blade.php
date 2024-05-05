@extends('main')

@section('content')
    <div class="main-content container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Users</h3>
                    {{-- <p class="text-subtitle text-muted">There's a lot of form layout that you can use</p> --}}
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class='breadcrumb-header'>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Users</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <button type="button" class="btn icon icon-left btn-sm btn-primary mb-2" data-toggle="modal"
                    data-target="#create-user"><i data-feather="plus" width="20"></i>Add</button>
                <x-users.create />
                <table class='table table-striped table-kost' id="table1">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-body-users">
                        @foreach ($users as $user)
                            <tr id="{{ $user->id }}"">
                                <td class="img">
                                    <img class="img-fluid" style="width: 50px"
                                        src="{{ Storage::url($user->img != null ? 'public/users/' . $user->img : 'public/users/user_default.jpeg' ) }}">
                                </td>
                                <td class="name">{{ $user->name }}</td>
                                <td class="email">{{ $user->email }}</td>
                                <td>
                                    <div class="d-flex" style="gap: 10px">
                                        <button type="button" class="btn icon btn-primary" data-toggle="modal"
                                            data-target="#update-user{{ $user->id }}"><i
                                                class="fa-solid fa-pen-to-square"></i></button>
                                        <button type="button" class="btn icon btn-danger btn-delete-user"
                                            data-id="{{ $user->id }}" data-token="{{ csrf_token() }}"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </div>
                                    <x-users.update :user="$user" />
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection
