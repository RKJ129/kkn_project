@extends('main')

@section('content')
    <div class="main-content container-fluid">
        <div class="page-title">
            <h3>Dashboard</h3>
            <p class="text-subtitle text-muted">A good dashboard to display your statistics</p>
        </div>
        <div class="section">
            <div class="row">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-4 col-md-6 col-sm-6 mb-3">
                                    <img src="{{ $profile->img != null ? '/img/profile/' . $profile->img : '/img/profile/profile_default.jpeg' }}"
                                        class="rounded w-100" id="foto-rt">
                                    <div class="text-center">
                                        <p class="mt-2 mb-0 name-rt">{{ $profile->name }}</p>
                                        <p class="mb-2 position-rt">Ketua RT</p>
                                    </div>
                                </div>
                                <div class="col-xl-8">
                                    <p class="text-justify">
                                        {{ $profile->sambutan }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card col-12">
                    <div class="card-content">
                        <div class="card-body">
                            <div>
                                <h3>Visi</h3>
                                <p>{{ $profile->visi }}</p>
                            </div>

                            <div>
                                <h3>Misi</h3>
                                <p>{{ $profile->misi }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card col-6">
                    <div class="card-content">
                        <div class="card-body">
                            <table class='table table-striped table-responsive table-kost' id="table1">
                                <thead>
                                    <tr>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Kontak</th>
                                        {{-- <th scope="col">Foto</th> --}}
                                    </tr>
                                </thead>
                                <tbody class="table-body-kost">
                                    @foreach ($kost as $item)
                                        <tr id="{{ $item->id }}"">
                                            <td class="name">{{ $item->name }}</td>
                                            <td class="harga">{{ $item->harga }}</td>
                                            <td class="kontak">{{ $item->kontak }}</td>
                                            {{-- <td class="img">
                                                <img class="img-fluid" style="width: 50px"
                                                    src="{{ $item->img != null ? '/img/kost/' . $item->img : 'img/kost/default.jpeg' }}">
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card col-6">
                    <div class="card-content">
                        <div class="card-body">
                            <table class='table table-striped table-kost table1'>
                                <thead>
                                    <tr>
                                        <th>Foto1</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                    </tr>
                                </thead>
                                <tbody class="table-body-users">
                                    @foreach ($users as $user)
                                        <tr id="{{ $user->id }}" class="{{ $user->id === Auth::user()->id ? 'bg-info text-white' : ''}}">
                                            <td class="img">
                                                <img class="img-fluid" style="width: 50px"
                                                    src="{{ $user->img != null ? '/img/users/' . $user->img : '/img/users/user_default.jpeg' }}">
                                            </td>
                                            <td class="name">{{ $user->name }}</td>
                                            <td class="email">{{ $user->email }}</td> 
                                            
                                        </tr>
                                    @endforeach
            
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
