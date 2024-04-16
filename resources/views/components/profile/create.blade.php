<div class="modal fade text-left" id="create-profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
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
                <form class="form-create" id="form-create" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="row"> 
                            <div class="col-12">
                                <div class="form-group" id="form-profile-name">
                                    <label for="name">Nama</label>
                                    <input type="text" id="name"
                                        class="form-control" name="name"
                                        placeholder="Nama">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="form-profile-img">
                                    <label for="img" class="form-label">Foto</label>
                                    <input class="form-control" type="file" id="img" name="img">
                                    {{-- <small class="text-danger">Optional</small> --}}
                                    <p class="text-danger">*<small>Optional</small></p>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="form-profile-sambutan">
                                    <label for="sambutan">Sambutan</label>
                                    <textarea name="sambutan" id="sambutan" class="form-control" cols="30" rows="5" placeholder="Sambutan"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="form-profile-deskripsi">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" class="form-control" cols="30" rows="5" placeholder="Deskripsi"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" id="modal-btn-close-create-profile" data-dismiss="modal">
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