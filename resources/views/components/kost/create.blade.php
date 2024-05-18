<div class="modal fade text-left" id="create-kost" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
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
                <form class="form-create-kost" id="form-create-kost" enctype="multipart/form-data">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group" id="form-kost-name">
                                    <label for="name">Nama Kost</label>
                                    <input type="text" id="name"
                                        class="form-control" name="name"
                                        placeholder="Nama kost">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="form-kost-harga">
                                    <label for="harga">Harga</label>
                                    <input type="text" id="harga"
                                        class="form-control harga" name="harga"
                                        placeholder="Harga">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="form-kost-kontak">
                                    <label for="kontak">Kontak</label>
                                    <input type="number" id="kontak"
                                        class="form-control kontak" name="kontak"
                                        placeholder="Kontak">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="form-kost-jenis">
                                    <label for="jenis">Jenis</label>
                                    <select class="form-select" name="jenis" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="L">Laki-Laki</option>
                                        <option value="P">Perempuan</option>
                                        <option value="B">Keduanya</option>
                                      </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="form-kost-alamat">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="form-kost-description">
                                    <label for="description">Deskripsi</label>
                                    <textarea name="description" id="description" class="form-control" cols="30" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group" id="form-profile-img">
                                    <label for="img" class="form-label">Foto</label>
                                    <input class="form-control" type="file" id="img" name="img" accept="image/*">
                                    {{-- <small class="text-danger">Optional</small> --}}
                                    <p class="text-danger">*<small>Optional</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" id="modal-btn-close-create-kost" data-dismiss="modal">
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