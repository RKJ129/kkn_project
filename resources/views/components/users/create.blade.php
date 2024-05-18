<div class="modal fade text-left" id="create-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
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
                <form class="form-create-user" id="form-create-user" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group" id="form-user-name">
                                    <label for="nameCreateUser">Nama</label>
                                    <input type="text" id="nameCreateUser" class="form-control nameCreateUser" name="name"
                                        placeholder="Nama User">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="form-user-email">
                                    <label for="emailCreateUser">Email</label>
                                    <input type="email" id="emailCreateUser" class="form-control emailCreateUser" name="email"
                                        placeholder="Email">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="form-user-password">
                                    <label for="passwordCreateUser">Password</label>
                                    <input type="password" id="passwordCreateUser" class="form-control passwordCreateUser" name="password"
                                        placeholder="Password">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="form-user-confirmation-password">
                                    <label for="passwordConfirmationCreateUser">Konfirmasi Password</label>
                                    <input type="password" id="passwordConfirmationCreateUser" class="form-control passwordConfirmationCreateUser" name="password_confirmation"
                                        placeholder="Konfirmasi Password">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="form-user-img">
                                    <label for="img" class="form-label">Foto</label>
                                    <input class="form-control" type="file" id="img" name="img" accept="image/*, image/heic">
                                    {{-- <small class="text-danger">Optional</small> --}}
                                    <p class="text-danger">*<small>Optional</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" id="btn-close-create-user" data-dismiss="modal">
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
