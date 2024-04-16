<div class="modal fade text-left" id="update-profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1">Profile RT</h5>
                <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-update" id="form-update">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div id="form-profile-id">
                                <input type="hidden" name="id" id="id" value="{{ $profile->id }}">
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="form-profile-name">
                                    <label for="name">Nama</label>
                                    <input type="text" id="name"
                                        class="form-control" name="name" value="{{ $profile->name }}"
                                        placeholder="Nama">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="form-profile-sambutan">
                                    <label for="sambutan">Sambutan</label>
                                    <textarea name="sambutan" id="sambutan" class="form-control" cols="30" rows="5" placeholder="Sambutan">{{ $profile->sambutan }}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="form-profile-deskripsi">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" class="form-control" cols="30" rows="5" placeholder="Deskripsi">{{ $profile->deskripsi }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" id="modal-btn-close-update-profile" data-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-primary ml-1">Submit</button>
                    </div>
                </form>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn" data-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <button type="submit" class="btn btn-primary ml-1" data-dismiss="modal">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Accept</span>
                </button>
            </div> --}}
        </div>
    </div>
</div>