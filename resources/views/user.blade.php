@extends('layouts.app')

@section('content')

<div class="container">
    <div id="userData" data-user-id="{{ $id }}"></div>
    <div class="row p-3">
        <div class="col-md-6 p-5 rounded-5 bg-light border border-2 shadow h-75">
            <div class="row d-flex align-items-center justify-content-center mb-2">
                <div class="w-50 h-50">
                    <img id="profileImage" class="img-fluid rounded-pill" src="" alt="Profile picture of the user">
                </div>
            </div>

            <div id="name" class="row align-items-center justify-content-center fw-bold mb-2"></div>
            <div class="row align-items-center text-center justify-content-center mb-2" id="city"> </div>
            <div class="row align-items-center justify-content-center mb-2 pb-3 border-bottom " id="country"></div>
            <div class="row align-items text-center justify-between mb-2" id="title"></div>
            <div class="row align-items-center justify-content-center mb-2 pb-3 border-bottom">
                <div class="col-auto items-center">
                    <a id="cv" class="text-decoration-none text-dark" href="" download="cv.pdf"><i class="fa-solid fa-paperclip mr-2"></i>Download CV</a>
                </div>
            </div>
            <div class="row align-items-center text-center justify-content-center mb-2" id="number"></div>
            <div class="row align-items-center text-center justify-content-center mb-2" id="email"></div>

            <div id="userSettings">
                <div class="row align-items-center text-center justify-content-center mb-2">
                    <button id="settings" class="m-auto w-25" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Поставки</button>
                </div>
                <div class="row align-items-center justify-content-center mb-2">
                    <div class="col-auto items-center">
                        <a class="text-decoration-none text-dark" href="{{ route('user.delete') }}"><i class="fa-solid fa-trash"></i>Избриши профил</a>
                    </div>
                </div>
                <div class="row align-items-center justify-content-center mb-2 pb-3 border-bottom">
                    <div class="col-auto items-center">
                        <a class="text-decoration-none text-dark" href="{{ route('user.password-update') }}"><i class="fa-solid fa-pen-to-square"></i>Смени лозинка</a>
                    </div>
                </div>
            </div>
            <div id="reportUser">
                <div class="row align-items-center text-center justify-content-center mb-2 " id="report"><button class="btn btn-danger w-25">Report User</button></div>
            </div>

        </div>
        <div class="col-md-6 p-5">
            <div class="row">
                <div id="biography_title" class="row">
                    <h3 class="p-0">Кратка биографија</h3>
                </div>
                <div id="biography" class="row mt-3"></div>
            </div>
            <div id="reccomendations" class="row mt-5 p-2">
                <h3>Препораки</h3>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam commodi expedita magnam similique animi distinctio eveniet facere! Corporis perferendis corrupti, nesciunt voluptas libero dolor? Libero eius debitis nobis consequatur iure doloribus fugiat sapiente ipsum ex veritatis nisi, dolores sunt tempora, commodi eum, porro dicta. Impedit aliquam tenetur ducimus velit error assumenda beatae earum iure laudantium blanditiis consectetur commodi sunt eos adipisci excepturi, eius repudiandae. Tempore soluta distinctio quod quos repellendus necessitatibus ab perferendis nulla? Illo, minima. Voluptatem libero id dicta impedit odit similique amet eum quas autem at! Assumenda debitis placeat recusandae est, vitae at officiis fugiat in itaque aliquid.
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Направете Измени</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" class="p-4 border border-3 rounded-3" enctype="multipart/form-data">

                    <div class=" mb-3">
                        <label for="editName" class="form-label">{{ __('Name') }}</label>
                        <input id="editName" class="form-control" type="text" name="editName" value="{{ old('editName') }}" autofocus autocomplete="editName">
                        @if ($errors->has('editName'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('editName') }}
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="editSurname" class="form-label">{{ __('Surname') }}</label>
                        <input id="editSurname" class="form-control" type="text" name="editSurname" value="{{ old('editSurname') }}" autofocus autocomplete="editSurname">
                        @if ($errors->has('editSurname'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('editSurname') }}
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="editEmail" class="form-label">{{ __('Email') }}</label>
                        <input id="editEmail" class="form-control" type="email" name="editEmail" value="{{ old('editEmail') }}" autocomplete="username">
                        @if ($errors->has('editEmail'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('editEmail') }}
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="editBiography" class="form-label">{{ __('Biography') }}</label>
                        <textarea class="form-control" name="editBiography" id="editBiography">{{ old('editBiography') }}</textarea>
                        @if ($errors->has('editBiography'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('editBiography') }}
                        </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="form-group mb-3 col-md-6">
                            <label for="editCity" class="form-label">{{ __('City') }}</label>
                            <input id="editCity" class="form-control" type="text" name="editCity" value="{{ old('editCity') }}" autofocus autocomplete="editCity">
                            @if ($errors->has('editCity'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('editCity') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label for="editCountry" class="form-label">{{ __('Country') }}</label>
                            <input id="editCountry" class="form-control" type="text" name="editCountry" value="{{ old('editCountry') }}" autofocus autocomplete="editCountry">
                            @if ($errors->has('editCountry'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('editCountry') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="editNumber" class="form-label">{{ __('Number') }}</label>
                        <input id="editNumber" class="form-control" type="tel" name="editNumber" value="{{ old('editNumber') }}" autocomplete="editNumber">
                        @if ($errors->has('editNumber'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('editNumber') }}
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="editTitle" class="form-label">{{ __('Title') }}</label>
                        <input id="editTitle" class="form-control" type="text" name="editTitle" value="{{ old('editTitle') }}" autocomplete="editTitle">
                        @if ($errors->has('editTitle'))
                        <div class="text-danger mt-2">
                            {{ $errors->first('editTitle') }}
                        </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="form-group mb-3 col-md-6">
                            <label for="editCv" class="form-label">{{ __('CV') }}</label>
                            <input id="editCv" class="form-control" type="file" name="editCv" value="{{ old('editCv') }}" autofocus autocomplete="editCv">
                            @if ($errors->has('editCv'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('editCv') }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group mb-3 col-md-6">
                            <label for="editImage" class="form-label">{{ __('Image') }}</label>
                            <input id="editImage" class="form-control" type="file" name="editImage" value="{{ old('editImage') }}" autofocus autocomplete="editImage">
                            @if ($errors->has('editImage'))
                            <div class="text-danger mt-2">
                                {{ $errors->first('editImage') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="submitEdit" type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let pathArray = window.location.pathname.split('/');
        let id = pathArray[pathArray.length - 1];
        let currentUser = $('#userData').data('user-id');
        $.ajax({
            url: `/api/user/${id}`,
            type: 'GET',
            xhrFields: {
                withCredentials: true
            },
            success: function(response) {
                let object = response.data;
                let imagePath = object.img_path;
                let cvPath = object.cv_path;
                let name = $('#name');
                let image = $('#profileImage');
                let city = $('#city');
                let country = $('#country');
                let title = $('#title');
                let cv = $('#cv');
                let number = $('#number');
                let email = $('#email');
                let settingsBtn = $('#settings')
                let biography = $('#biography');
                let fullImagePath = `${window.location.origin}/${imagePath}`;
                let fullCvPath = `${window.location.origin}/${cvPath}`;

                if (currentUser != object.id || currentUser === null) {
                    $('#userSettings').remove()
                }

                if (currentUser === object.id || currentUser === null) {
                    $('#reportUser').remove();
                }


                let populateObject = function(object) {
                    image.attr('src', fullImagePath);
                    name.text(`${object.name} ${object.surname}`);

                    if (object.city != null) {
                        city.html(` ${object.city}`);
                    }
                    if (object.country != null) {
                        country.text(`${object.country}`);
                    }
                    if (object.title != null) {
                        title.html(` <div class="items-center"><i class="fa-regular fa-user"></i> ${object.title}</div>`);
                    }
                    if (object.number != null) {
                        number.html(` <div><i class="fa-solid fa-user-plus"></i> ${object.number}</div>`);
                    }
                    if (object.email != null) {
                        email.html(` <div><i class="fa-regular fa-envelope"></i> ${object.email}</div>`);
                    }
                    if (object.biography != null) {
                        biography.html(`  ${object.biography}`);
                    }
                    cv.attr('href', fullCvPath);
                }
                populateObject(object)

                settingsBtn.on('click', function(e) {
                    let editForm = $('#editForm');
                    $('#editName').val(object.name);
                    $('#editSurname').val(object.surname);
                    $('#editEmail').val(object.email);
                    $('#editBiography').val(object.biography);
                    $('#editCity').val(object.city);
                    $('#editCountry').val(object.country);
                    $('#editNumber').val(object.number);
                    $('#editTitle').val(object.title);

                    editForm.off('submit').on('submit', function(e) {
                        e.preventDefault()
                        const userId = object.id;
                        const editName = $('#editName').val();
                        const editSurname = $('#editSurname').val();
                        const editEmail = $('#editEmail').val();
                        const editBiography = $('#editBiography').val();
                        const editCity = $('#editCity').val();
                        const editNumber = $('#editNumber').val();
                        const editTitle = $('#editTitle').val();
                        const editCv = $('#editCv').val();
                        const editImage = $('#editImage').val();
                        let formData = new FormData();

                        formData.append('name', editName);
                        formData.append('surname', editSurname);
                        formData.append('email', editEmail);
                        formData.append('biography', editBiography);
                        formData.append('city', editCity);
                        formData.append('number', editNumber);
                        formData.append('title', editTitle);

                        if ($('#editCv')[0].files.length > 0) {
                            formData.append('cv', $('#editCv')[0].files[0]);
                        }


                        if ($('#editImage')[0].files.length > 0) {
                            formData.append('image', $('#editImage')[0].files[0]);
                        }

                        $.ajax({
                            url: `http://127.0.0.1:8000/api/editUser/${userId}`,
                            method: 'POST',
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function(data) {
                                $('#exampleModal').modal('hide');
                                object = data.data
                                populateObject(object)
                                Swal.fire({
                                    title: "Good job!",
                                    text: "Successfully edited your profile!",
                                    icon: "success"
                                });
                            },
                            error: function(err) {
                                $('#exampleModal').modal('hide');
                                let errors = err.responseJSON.errors;
                                let errorMessages = '';
                                for (let field in errors) {
                                    errorMessages += `${errors[field][0]} `;
                                }
                                Swal.fire({
                                    icon: "error",
                                    title: "Oops...",
                                    text: errorMessages,
                                });
                            }
                        });
                    })
                })

            },
            error: function(err) {
                console.error('AJAX error:', err);
            }
        });
    });
</script>


@endsection