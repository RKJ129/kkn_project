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
            <button type="button" class="btn icon icon-left btn-secondary" data-toggle="modal" data-target="#create-profile">
                <i data-feather="plus" width="20"></i>Create
            </button>

            <x-profile.create />
        @else
            <button type="button" class="btn icon icon-left btn-sm btn-primary mb-2" data-toggle="modal" data-target="#update-profile"><i data-feather="edit"
                    width="20"></i>Edit</button>
            <button type="button" class="btn icon icon-left btn-sm btn-warning mb-2" data-toggle="modal" data-target="#update-image-profile"><i data-feather="image"
                    width="20"></i>Image</button>
            
            <x-profile.update :profile="$profile" />
            <x-profile.update-image :profile="$profile" />

            <div class="row">
                <div class="col-xl-5 col-md-6 col-sm-12 h-auto">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <img src="{{ Storage::url($profile->img != null ? "profile/" . $profile->img : "profile/profile_default.jpeg") }}" class="rounded w-100" id="foto-rt">
                                <div class="text-center">
                                    <p class="mt-2 mb-0 name-rt">{{ $profile->name }}</p>
                                    <p class="mb-2 position-rt">Ketua RT</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="card my-1 ">
                        <div class="card-content">
                            <div class="card-body">
                                <h5 class="greeting">Sambutan : </h5>
                                <p class="text-capitalize sambutan-rt">{{ $profile->sambutan }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <h5>Deskripsi</h5>
                                <p class="text-capitalize deskripsi-rt">{{ $profile->deskripsi }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endsection
