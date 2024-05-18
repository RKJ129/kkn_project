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
                <form class="form-update-user" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <input type="hidden" name="id" class="id" value="{{ $user->id }}">
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="form-user-name">
                                    <label for="nameUpdateUser{{ $user->id }}">Nama</label>
                                    <input type="text" id="nameUpdateUser{{ $user->id }}" class="form-control nameUpdateUser{{ $user->id }}" name="name" value="{{ $user->name }}"
                                        placeholder="Nama User">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="form-user-email">
                                    <label for="emailUpdateUser{{ $user->id }}">Email</label>
                                    <input type="email" id="emailUpdateUser{{ $user->id }}" class="form-control emailUpdateUser{{ $user->id }}" name="email" value="{{ $user->email }}"
                                        placeholder="Email">
                                </div>
                            </div>                     
                            <div class="col-12">
                                <div class="form-group" id="form-user-img">
                                    <label for="img" class="form-label">Foto</label>
                                    <input class="form-control" type="file" id="imgUpdate{{ $user->id }}" name="img" accept="image/* image/heic">
                                    {{-- <small class="text-danger">Optional</small> --}}
                                    <p class="text-danger">*<small>Optional</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn close-update-user" data-dismiss="modal">
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
