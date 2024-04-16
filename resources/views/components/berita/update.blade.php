<div class="modal fade text-left" id="update-berita{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1">Kost</h5>
                <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-update-berita" id="form-update-berita" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <input type="hidden" name="id" id="id" value="{{ $item->id }}">
                            <div class="col-12">
                                <div class="form-group" id="form-berita-judul">
                                    <label for="name">Judul</label>
                                    <input type="text" id="judul" class="form-control" name="judul" value="{{ $item->judul }}"
                                        placeholder="Judul berita">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="form-berita-description">
                                    <label for="description">Deskripsi</label>
                                    <textarea name="description" id="description" class="form-control" cols="30" rows="5">{{ $item->description }}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="form-berita-img">
                                    <label for="img" class="form-label">Foto</label>
                                    <input class="form-control" type="file" id="img" name="img">
                                    {{-- <small class="text-danger">Optional</small> --}}
                                    <p class="text-danger">*<small>Optional</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" id="close-update-berita" data-dismiss="modal">
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
