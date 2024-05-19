@extends('main')

@section('content')
    <div class="main-content container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Profile RT</h3>
                    {{-- <p class="text-subtitle text-muted">There's a lot of form layout that you can use</p> --}}
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class='breadcrumb-header'>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profile RT</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        @if (!$profile)
            <button type="button" class="btn icon icon-left btn-secondary" data-toggle="modal"
                data-target="#create-profile">
                <i data-feather="plus" width="20"></i>Create
            </button>
        @else
            {{-- <button type="button" class="btn icon icon-left btn-sm btn-primary mb-2" data-toggle="modal"
                data-target="#update-profile"><i data-feather="edit" width="20"></i>Edit</button>
            <button type="button" class="btn icon icon-left btn-sm btn-warning mb-2" data-toggle="modal"
                data-target="#update-image-profile"><i data-feather="image" width="20"></i>Image</button> --}}


            <div class="col-12 h-auto">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="col-xl-4 col-md-6 col-sm-8 mb-3">
                                <img src="{{ $profile->img != null ? '/img/profile/' . $profile->img : '/img/profile/profile_default.jpeg' }}"
                                    class="rounded w-100" id="foto-rt">
                                <div class="text-center">
                                    <p class="mt-2 mb-0 name-rt">{{ $profile->name }}</p>
                                    <p class="mb-2 position-rt">Ketua RT</p>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="button" class="btn icon icon-left btn-sm btn-primary mb-2 mx-1"
                                        data-toggle="modal" data-target="#update-image-profile"><i data-feather="edit"
                                            width="20"></i>Edit</button>
                                    <a href="{{ route('profile.deleteImage') }}" id="delete-image-profile"
                                        class="btn icon icon-left btn-sm btn-danger mb-2 mx-1 {{ $profile->img == null ? 'disabled' : '' }}"><i
                                            data-feather="image" width="20"></i>Hapus</a>
                                </div>
                                <x-profile.update-image :profile="$profile" />
                            </div>
                            <form class="form-update" id="form-update" enctype="multipart/form-data">
                                @csrf
                                <div class="col-8">
                                    <label for="" class="greeting">Jumlah Penduduk</label>
                                    <input type="number" class="form-control mt-2 mb-3" name="jumlah_penduduk"
                                        id="jumlah_penduduk" value="{{ $profile->jumlah_penduduk }}">
                                </div>

                                <div class="col-xl-8 col-md-6 col-sm-12 mb-3">
                                    <label for="" class="greeting mb-2">Sambutan RT</label>
                                    <textarea name="sambutan" id="sambutan" class="form-control" cols="30" rows="10">{{ $profile->sambutan }}</textarea>
                                </div>

                                <div class="col-xl-8 col-md-6 col-sm-12 mb-3">
                                    <label for="visi" class="greeting mb-2">Visi</label>
                                    <textarea name="visi" id="visi" class="form-control" cols="30" rows="10">{{ $profile->visi }}</textarea>
                                </div>

                                <div class="col-xl-8 col-md-6 col-sm-12 mb-3">
                                    <label for="misi" class="greeting mb-2">Misi</label>
                                    {{-- <textarea name="misi" id="snow" class="form-control" cols="30" rows="10">{{ $profile->misi }}</textarea> --}}
                                    <div id="snow">{{ $profile->misi }}</div>
                                </div>

                                <div class="col-xl-8 col-md-6 col-sm-12 mb-3">
                                    <label for="" class="greeting mb-2">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" class="form-control" cols="30" rows="10">{{ $profile->deskripsi }}</textarea>
                                </div>

                                <div class="col-xl-8 col-md-6 col-sm-12 mb-3">
                                    <label for="deskripsi_kost" class="greeting mb-2">Deskripsi Kost</label>
                                    <textarea name="deskripsi_kost" id="deskripsi_kost" class="form-control" cols="30" rows="10">{{ $profile->deskripsi_kost }}</textarea>
                                </div>

                                <div class="col-xl-8 col-md-6 col-sm-12 mb-3">
                                    <label for="no_wa" class="greeting mb-2">No. WhatsApp</label>
                                    <input type="number" name="no_wa" class="form-control" id="no_wa" value="{{ $profile->no_wa }}">
                                </div>

                                <div class="col-xl-8 col-md-6 col-sm-12 mb-3">
                                    <label for="instagram" class="greeting mb-2">Instagram</label>
                                    <input type="text" name="instagram" class="form-control" id="instagram" value="{{ $profile->instagram }}">
                                </div>
                                <button type="submit" class="btn btn-primary ml-1">Ganti</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endsection
