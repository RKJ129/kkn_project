<div class="modal fade text-left" id="update-user-password{{ $user->id }}" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1">User</h5>
                <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-update-password-user">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <input type="hidden" name="id" class="updatePasswordUserId{{ $user->id }}" value="{{ $user->id }}">
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="form-user-password">
                                    <label for="passwordUpdateUser{{ $user->id }}">Password</label>
                                    <input type="password" id="passwordUpdateUser{{ $user->id }}"
                                        class="form-control passwordUpdateUser{{ $user->id }}" name="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="form-user-confirmation-password">
                                    <label for="passwordConfirmationUpdateUser{{ $user->id }}">Konfirmasi Password</label>
                                    <input type="password" id="passwordConfirmationUpdateUser{{ $user->id }}"
                                        class="form-control passwordConfirmationUpdateUser{{ $user->id }}" name="password_confirmation"
                                        placeholder="Konfirmasi Password">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn close-update-password-user" data-dismiss="modal">
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
