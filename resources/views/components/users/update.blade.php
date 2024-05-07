<div class="modal fade text-left" id="update-user{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1">User</h5>
                <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-update-user" id="form-update-user" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <input type="hidden" name="id" id="id" value="{{ $user->id }}">
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="form-user-name">
                                    <label for="nameUpdate">Nama</label>
                                    <input type="text" id="nameUpdate" class="form-control" name="name" value="{{ $user->name }}"
                                        placeholder="Nama User">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="form-user-email">
                                    <label for="emailUpdate">Email</label>
                                    <input type="email" id="emailUpdate" class="form-control" name="email" value="{{ $user->email }}"
                                        placeholder="Email">
                                </div>
                            </div>                     
                            <div class="col-12">
                                <div class="form-group" id="form-user-img">
                                    <label for="imgUpdate" class="form-label">Foto</label>
                                    <input class="form-control" type="file" id="imgUpdate" name="img" accept="image/*">
                                    {{-- <small class="text-danger">Optional</small> --}}
                                    <p class="text-danger">*<small>Optional</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" id="close-update-user" data-dismiss="modal">
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
