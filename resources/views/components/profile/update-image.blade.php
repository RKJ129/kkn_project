<div class="modal fade text-left" id="update-image-profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
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
                <form class="form-update-profile-image" id="form-update-profile-image" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div id="form-profile-id">
                                <input type="hidden" name="id" id="id" value="{{ $profile->id }}">
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="form-profile-img">
                                    <label for="img">Foto</label>
                                    <input type="file" name="img" id="img" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" id="modal-btn-close-update-profile-image" data-dismiss="modal">
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