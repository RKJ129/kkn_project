<div class="modal modal-update-kost fade text-left" id="update-kost{{ $item->id }}" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1">Kost</h5>
                <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-update-kost" id="form-update-kost" enctype="multipart/form-data"">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <input type="hidden" name="id" id="id" value="{{ $item->id }}">
                            <div class="col-12">
                                <div class="form-group" id="form-kost-name">
                                    <label for="name">Nama Kost</label>
                                    <input type="text" id="name" class="form-control" name="name"
                                        value="{{ $item->name }}" placeholder="Nama kost">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="form-kost-harga">
                                    <label for="harga">Harga</label>
                                    <input type="text" id="harga" class="form-control harga" name="harga"
                                        value="{{ $item->harga }}" placeholder="Harga">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="form-kost-kontak">
                                    <label for="kontak">Kontak</label>
                                    <input type="text" id="kontak" class="form-control kontak" name="kontak"
                                        value="{{ $item->kontak }}" placeholder="Kontak">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="form-kost-jenis">
                                    <label for="jenis">Jenis</label>
                                    <select class="form-select" name="jenis" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="L" {{ $item->jenis == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                                        <option value="P" {{ $item->jenis == 'P' ? 'selected' : '' }}>Perempuan</option>
                                        <option value="B" {{ $item->jenis == 'B' ? 'selected' : '' }}>Keduanya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="form-kost-alamat">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="5">{{ $item->alamat }}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="form-kost-description">
                                    <label for="description">Deskripsi</label>
                                    <textarea name="description" id="description" class="form-control" cols="30" rows="5">{{ $item->description }}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="form-profile-img">
                                    <label for="img" class="form-label">Foto</label>
                                    <input class="form-control" type="file" id="img" name="img"
                                        accept="image/* image/heic">
                                    {{-- <small class="text-danger">Optional</small> --}}
                                    <p class="text-danger">*<small>Optional</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn modal-btn-close-update-kost" id="modal-btn-close-update-kost"
                            data-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-primary ml-1">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
