$(document).ready(function () {
    // Create Profile

    $(".form-create").submit(function (e) { 
        e.preventDefault();
        const data = new FormData(this);

        $.ajax({
            type: "POST",
            url: "/profile/store",
            data : data,
            processData: false,
            contentType: false,
            success: function (response) {
                $("#modal-btn-close-create-profile").click();
                location.reload();
                Swal.fire({
                    title : "Berhasil menambahkan data!",
                    icon : "success",
                    showCloseButton: true,
                    confirmButton: false,
                });
            }, error : function(err) {
                const messageValidation = err.responseJSON;
                validateProfileRT(messageValidation);
            }
        });
    });

    // Update Profile
    $(".form-update").on("submit", function(e) {
        e.preventDefault();

        const data = new FormData(this);

        $.ajax({
            type: "POST",
            url: `/profile/update`,
            headers : {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            },
            data: data,
            processData: false,
            contentType: false,
            success: function (response) {
                console.info(response);
                const data = response.data;

                $("p.name-rt").text(data.name);
                $("p.sambutan-rt").text(data.sambutan);
                $("p.deskripsi-rt").text(data.deskripsi);

                $(".form-update")[0].reset();
                $("#modal-btn-close-update-profile").click();

                Swal.fire({
                    title : response.message,
                    icon : "success",
                    showCloseButton: true,
                });
            }, error : function(err) {
                const messageValidation = err.responseJSON;
                validateProfileRT(messageValidation);
            }
        });
    });

    // Update Image Profile
    $(".form-update-profile-image").on("submit", function(e) {
        e.preventDefault();

        const data = new FormData(this);
        $.ajax({
            type: "POST",
            url: "/profile/update/image",
            headers : {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            },
            data: data,
            processData: false,
            contentType: false,
            success: function (response) {
                const data = response.data;
                $("img#foto-rt").attr("src", `/img/profile/${data.img}`);

                $("button#modal-btn-close-update-profile-image").click();

                Swal.fire({
                    title : response.message,
                    icon : "success",
                    showCloseButton: true,
                });

                $("input#img").removeClass("is-invalid");
                $("#alert-profile-img").remove();
            }, error : function(err) {
                const messageValidation = err.responseJSON;
                validateProfileRT(messageValidation);
            }
        });
    });
});

// Kost
// Get Kost

// Create Kost
$("#form-create-kost").on("submit", function(e) {
    e.preventDefault();
    const data = new FormData(this);

    $.ajax({
        type: "POST",
        url: "kost/store",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="token"]').attr('value')
        },
        data: data,
        cache : false,
        processData: false,
        contentType: false,
        success: function (response) {
            $(".table-body-kost").html(response);
            $("button#modal-btn-close-create-kost").click();
            $(".form-create-kost")[0].reset();
            $("input, textarea").each((index, element) => removeAlert(element));

            Swal.fire({
                title : "Berhasil menambahkan data!",
                icon : "success",
                showCloseButton: true,
            });
        }, error : function(err) {
            console.error(err);
            const messageValidation = err.responseJSON.errors;
            validateKost(messageValidation);
        }
    });
});

// Update Kost
$("body").on("submit", ".form-update-kost", function(e) {
    e.preventDefault();

    const data = new FormData(this);
    
    $.ajax({
        type: "POST",
        url: "kost/update",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="token"]').attr('value')
        },
        data: data,
        cache: false,
        processData: false,
        contentType: false,
        success: function (response) {
            // console.info(response);
            const data = response.data;
            $(`tr#${data.id} td.name`).text(data.name);
            $(`tr#${data.id} td.harga`).text(data.harga);
            $(`tr#${data.id} td.alamat`).text(data.alamat);
            $(`tr#${data.id} td.description`).text(data.description);
            if(data.img != null) {
                $(`tr#${data.id} td.img img`).attr("src", "/storage/kost/" + data.img);
            }

            $(".modal-btn-close-update-kost").click();
            $(".form-update-kost")[0].reset();

            Swal.fire({
                title : response.message,
                icon : "success",
                showCloseButton: true,
            });
        }, error : function(err) {
            const messageValidation = err.responseJSON.errors;
            validateKost(messageValidation);
            
        }
    });
});

// delete kost
$("body").on("click", ".btn-delete-kost", function() {
    const id = $(this).data('id');

    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {

            $.ajaxSetup({
                headers:{
                    'X_CSRF_TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
             });

            $.ajax({
                type: "DELETE",
                url: "kost/delete/" + id,
                cache: false,
                success: function (response) {
                    $(".table-body-kost tr#" + id).remove();
                }, error: function(err) {
                    console.error(err);
                }
            });

          Swal.fire({
            title: "Deleted!",
            text: "Your file has been deleted.",
            icon: "success"
          });
        }
      });
});

// Create berita
$("body").on("submit", ".form-create-berita", function(e) {
    e.preventDefault();

    const data = new FormData(this);

    $.ajaxSetup({
        headers:{
            'X_CSRF_TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
     });
     
     $.ajax({
        type: "POST",
        url: "/berita/store",
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        success: function (response) {
            $(".table-body-berita").html(response);

            $("button#close-create-berita").click();
            $(".form-create-berita")[0].reset();
            $("input, textarea").each(( index, element) => removeAlert(element));

            Swal.fire({
                title: "Berhasil menambahkan data!",
                icon: "success"
            });
        }, error : function(err) {
            const messageValidation = err.responseJSON.errors;
            validateBerita(messageValidation);
        }
     });
});

// Update berita
$("body").on("submit", ".form-update-berita", function(e) {
    e.preventDefault();

    const data = new FormData(this);

    $.ajaxSetup({
        headers:{
            'X_CSRF_TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
     });

    $.ajax({
        type: "POST",
        url: "/berita/update" ,
        data: data,
        processData: false,
        contentType: false,
        success: function (response) {
            const data = response.data;
            $(`tr#${data.id} td.thumbnail img`).attr("src", `/storage/berita/${data.img}`);
            $(`tr#${data.id} td.judul`).text(data.judul);
            $(`tr#${data.id} td.deskripsi`).text(data.description);

            $("button#close-update-berita").click();
            $(".form-update-berita")[0].reset();

            Swal.fire({
                title: response.message,
                icon: "success"
            });

        },error: function(error) {
            console.error(error);
        }
    });
});

// delete berita
$("body").on("click", ".btn-delete-berita", function() {
    const id = $(this).data('id');

    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {

            $.ajaxSetup({
                headers:{
                    'X_CSRF_TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
             });

            $.ajax({
                type: "DELETE",
                url: `/berita/delete/${id}`,
                cache: false,
                data: {"_token" : $('meta[name="csrf-token"]').attr('content')}, 
                success: function (response) {
                    $(".table-body-berita tr#" + id).remove();
                }, error: function(err) {
                    console.error(err);
                }
            });

          Swal.fire({
            title: "Deleted!",
            text: "Your file has been deleted.",
            icon: "success"
          });
        }
      });
});

// login
$("body").on("submit", "#form-login", function(e) {
    e.preventDefault();
    const data = new FormData(this);

    $.ajax({
        type: "POST",
        url: "login/action",
        data: data,
        headers: {
            'X_CSRF_TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        cache: false,
        processData: false,
        contentType: false,
        success: function (response) {
            console.info(response);
            if(response.success) {
                Swal.fire({
                    type: 'success',
                    title: 'Login Berhasil!',
                    text: `Anda akan di arahkan dalam 3 Detik`,
                    timer: 3000,
                    showCancelButton: false,
                    showConfirmButton: false,
                }).then(function() {
                    window.location.href = "dashboard";
                });
            }
        }, error : function(err) {
            const messageValidation = err.responseJSON.errors;
            const errorLogin = err.responseJSON
            validateLogin(messageValidation);

            if(errorLogin.success == false) {
                Swal.fire({
                    position: 'top-end',
                    toast: true,
                    icon: 'error',
                    title: errorLogin.message,
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                });
            }
        }
    });
});

// logout
$("body").on("click", "a#logout", function(e) {
    e.preventDefault();

    Swal.fire({
        title: "Apa kamu yakin ingin keluar?",
        // text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Keluar!"
      }).then(result => {
        if(result.isConfirmed) {
            window.location.href = "/logout";
        }
      });
});

function showAlert(selector, message) {
    $(selector).addClass("is-invalid").next().remove();
    $(selector).parent().append(`<div class="alert alert-danger mt-1">${message}</div>`)
}

function showAlertLogin(selector, message) {
    $(selector).addClass("is-invalid").parents().children(".error").remove();
    $(selector).parent().parent().append(`<div class="error text-danger mt-1">${message}</div>`);
}

function removeAlert(selector) {
    $(selector).removeClass("is-invalid").next(".alert").remove();
}

function removeAlertLogin(selector) {
    $(selector).removeClass("is-invalid").parents().children(".error").remove();
}

function validateProfileRT(message) {
    // create name
    if(message.name) {
        $("input#name").addClass("is-invalid");
        $("#alert-profile-name").remove();
        $("#form-profile-name").append(`<div class="alert alert-danger mt-1" id="alert-profile-name">${message.name[0]}</div>`);
    } else {
        $("input#name").removeClass("is-invalid");
        $("#alert-profile-name").remove();
    }
    // create image
    if(message.img) {
        $("input#img").removeClass("is-invalid").addClass("is-invalid");
        $("#alert-profile-img").remove();
        $("#form-profile-img").append(`<div class="alert alert-danger mt-1" id="alert-profile-img">${message.img[0]}</div>`);
    } else {
        $("input#img").removeClass("is-invalid");
        $("#alert-profile-img").remove();
    }

    if(message.sambutan) {
        $("#alert-profile-sambutan").remove();
        $("#form-profile-sambutan").append(`<div class="alert alert-danger mt-1" id="alert-profile-sambutan">${message.sambutan[0]}</div>`);
    } else {

        $("#alert-profile-sambutan").remove();
    }

    if(message.deskripsi) {
        $("#alert-profile-deskripsi").remove();
        $("#form-profile-deskripsi").append(`<div class="alert alert-danger mt-1" id="alert-profile-deskripsi">${message.deskripsi[0]}</div>`);
    } else {
        $("#alert-profile-deskripsi").remove();
    }
}

function validateKost(message) {
    if(message.name) {
        showAlert("input#name", message.name[0]);
    } else {
        removeAlert("input#name");
    }

    if(message.harga) {
        showAlert("input#harga", message.harga[0]);
    } else {
        removeAlert("input#harga");
    }

    if(message.kontak) {
        showAlert("input#kontak", message.kontak[0]);
    } else {
        removeAlert("input#kontak");
    }

    if(message.alamat) {
        showAlert("textarea#alamat", message.alamat[0]);
    } else {
        removeAlert("textarea#alamat");
    }

    if(message.description) {
        showAlert("textarea#description", message.description[0]);
    } else {
        removeAlert("textarea#description");
    }

    if(message.img) {
        showAlert("input#img", message.img[0]);
    } else {
        removeAlert("input#img");
    }
}

function validateBerita(message) {
    if(message.judul) {
        showAlert("input#judul", message.judul[0]);
    } else {
        removeAlert("input#judul");
    }

    if(message.description) {
        showAlert("textarea#description", message.description[0]);
    } else {
        removeAlert("textarea#description");
    }

    if(message.img) {
        showAlert("input#img", message.img[0]);
    } else {
        removeAlert("input#img");
    }
}

function validateLogin(message) {
    if(message) {
        if(message.name) {
            showAlertLogin("input#username", message.name[0]);
        } else {
            removeAlertLogin("input#username");
        }
    
        if(message.password) {
            showAlertLogin("input#password", message.password[0]);
        } else {
            removeAlertLogin("input#password");
        }
    } else {
        $("input, div.error").each((index, element) => $(element).removeClass("is-invalid").remove("div.error"));
    }
}