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
                <div class="row align-items-center text-center justify-content-center mb-2 flex-column" id="report">
                    <button type="button" class="btn btn-primary w-50 m-2" data-bs-toggle="modal" data-bs-target="#reccomendationModal">Reccomendation</button>
                    <button id="addConnection" class="btn btn-info w-25 m-2 text-white ">Add Connection</button>

                </div>
            </div>
        </div>
        <div class="col-md-6 p-5">
            <div class="row">
                <div id="biography_title" class="row">
                    <h3 class="p-0">Кратка биографија</h3>
                </div>
                <div id="biography" class="row mt-3"></div>
            </div>
            <div id="unApprovedReccomendations" class="row mt-5 p-2">
                <h3>Неодобрени Препораки</h3>
            </div>
            <div id="reccomendations" class="row mt-5 p-2">
                <h3 id="reccomendationTitle">Препораки</h3>

            </div>
        </div>
    </div>

    <div class="connections row d-flex justify-content-between">
        <div id="pendingConnections" class="col-md-5 text-center ">
            <h5>Pending Requests</h5>
        </div>
        <div id="acceptedConnections" class="col-md-5 text-center d-flex">
            <h5>Connections</h5>
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
<div class="modal fade" id="reccomendationModal" tabindex="-1" aria-labelledby="reccomendationModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="reccomendationModalLabel">Give reccomendation</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="reccomendationForm">
                    <input id="user" type="hidden" value="{{ Auth::id() }}">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a reccomendation here" name="reccomendation" id="reccomendation" style="height: 100px"></textarea>
                        <label for="reccomendation">Reccomendation...</label>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    <button type="button" class="btn btn-secondary mt-2" data-bs-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editReccomendationModal" tabindex="-1" aria-labelledby="editReccomendationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editReccomendationModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editReccomendationForm">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a reccomendation here" name="editReccomendation" id="editReccomendation" style="height: 100px"></textarea>
                        <label for="editReccomendation">Reccomendation...</label>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                    <button type="button" class="btn btn-secondary mt-2" data-bs-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="reportForm">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="reportModalLabel">Report Content</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="reportable_id" id="reportable_id">
                    <input type="hidden" name="reportable_type" id="reportable_type">
                    <div class="mb-3">
                        <label for="reportReason" class="form-label">Reason for Reporting</label>
                        <textarea class="form-control" name="reason" id="reportReason" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Submit Report</button>
                </div>
            </form>
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

        function getReccomendation() {
            $.ajax({
                url: `http://127.0.0.1:8000/api/getReccomendations/${id}`,
                type: 'get',
                success: function(response) {
                    let reccomendations = response.data;
                    populateReccomendations(reccomendations)

                },
                error: function(err) {
                    console.log(err);
                }
            });
        }
        $('#reccomendationForm').off('submit').on('submit', function(e) {
            e.preventDefault()
            $('#reccomendationModal').modal('hide');
            let reccomendedUserId = id;
            let userReccomending = $('#user').val();
            let reccomendation = $('#reccomendation').val();
            $.ajax({
                url: 'http://127.0.0.1:8000/api/saveReccomendation',
                type: 'post',
                data: {
                    reccomendation: reccomendation,
                    user_id: reccomendedUserId,
                    reccomended_by: userReccomending
                },
                success: function(response) {
                    console.log(response)
                    Swal.fire({
                        title: "Good job!",
                        text: response.message,
                        icon: "success"

                    })
                    $('#reccomendation').val('')
                    $('#reccomendations').empty()
                    getReccomendation()
                },
                error: function(err) {
                    console.log(err)
                }
            })
        })
        $('#unApprovedReccomendations').hide();
        if (Number(id) === currentUser || currentUser === 1) {
            $('#unApprovedReccomendations').show();
        }

        function populateReccomendations(reccomendations) {
            reccomendations.forEach(reccomendation => {
                let title = reccomendation.reccomender.title === null ? 'No title to display' : reccomendation.reccomender.title;

                if (reccomendation.is_approved === 1) {
                    const reccomendationDiv = $(`


            <div class="border rounded-3 m-2 p-3 shadow-lg" style="overflow-wrap: break-word; width: 100%;">
                <h5 class="reccomendation-heading">Recommendation by ${reccomendation.reccomender.name}</h5>
                <p>${reccomendation.reccomendation}</p>
                <div class="d-flex justify-content-end flex-column align-items-end">
                    <p class="fst-italic text-muted">By: ${reccomendation.reccomender.name} ${reccomendation.reccomender.surname}</p>
                    <p class="fst-italic text-muted">Title: ${title}</p>
                    <div class="reccomendationBtns"></div>
                </div>
            </div>
            `);

                    $('#reccomendations').append(reccomendationDiv);
                    if (currentUser != id) {
                        let reportReccomendationBtn = `<button class="w-25 m-2 m-auto btn btn-sm btn-danger reportReccomendationButton" data-id="${reccomendation.id}" data-type="App\\Models\\Reccomendation">Report</button>`;
                        reccomendationDiv.find('.reccomendationBtns').append(reportReccomendationBtn);
                    }

                    if (currentUser === reccomendation.reccomended_by || currentUser === 1) {
                        let editButton = $(`<button data-reccomendation-id=${reccomendation.id} class="editBtn btn btn-warning">Edit Reccomendation</button>`);
                        reccomendationDiv.find('.reccomendationBtns').append(editButton);
                    }

                    if (currentUser === reccomendation.reccomended_by || currentUser === 1 || Number(id) === currentUser) {
                        let deleteButton = $(`<button data-reccomendation-id=${reccomendation.id} class="btn btn-danger delete m-1">Delete</button>`);
                        reccomendationDiv.find('.reccomendationBtns').append(deleteButton);
                    }
                } else if (reccomendation.is_approved != 1) {
                    const unApprovedReccomendation = $(`

            <!-- Add heading for unapproved recommendations as well -->
            <div data-reccomendationDiv-id=${reccomendation.id} class="border rounded-3 m-2 p-3 shadow-lg" style="overflow-wrap: break-word; width: 100%;">
                <h5 class="unapproved-heading">Unapproved Recommendation by ${reccomendation.reccomender.name}</h5>
                <p>${reccomendation.reccomendation}</p>
                <div class="d-flex justify-content-end flex-column align-items-end">
                    <p class="fst-italic text-muted">By: ${reccomendation.reccomender.name} ${reccomendation.reccomender.surname}</p>
                    <p class="fst-italic text-muted">Title: ${title}</p>
                    <div class="reccomendationBtns"></div>
                    <button data-reccomendation-id=${reccomendation.id} class="btn btn-success approve m-1">Approve</button>
                    <button data-reccomendation-id=${reccomendation.id} class="btn btn-danger delete m-1">Delete</button>
                </div>
            </div>
            `);

                    $('#unApprovedReccomendations').append(unApprovedReccomendation);

                    if (currentUser != id) {
                        let reportUnapprovedRecBtn = `<button class="w-100 m-2 m-auto btn btn-sm btn-danger reportReccomendationButton" data-id="${reccomendation.id}" data-type="App\\Models\\Reccomendation">Report</button>`;
                        unApprovedReccomendation.find('.reccomendationBtns').append(reportUnapprovedRecBtn);
                    }
                }
            });
        }

        let reportUserBtn = `<button class="w-25 m-2 m-auto btn btn-sm btn-danger reportUserButton" data-id="${id}" data-type="App\\Models\\User">Report</button>`

        $('#report').append(reportUserBtn)

        $(document).on('click', '.reportUserButton', function() {
            let reportableId = $(this).data('id');
            let reportableType = $(this).data('type');
            $('#reportable_id').val(reportableId);
            $('#reportable_type').val(reportableType);
            $('#reportModal').modal('show');
        });

        $(document).on('click', '.reportReccomendationButton', function() {
            let reportableId = $(this).data('id');
            let reportableType = $(this).data('type');
            $('#reportable_id').val(reportableId);
            $('#reportable_type').val(reportableType);
            $('#reportModal').modal('show');
        });

        $.get('/sanctum/csrf-cookie').then(() => {
            $('#reportForm').on('submit', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                $.ajax({
                    url: '/api/report',
                    method: 'POST',
                    data: formData,
                    xhrFields: {
                        withCredentials: true
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: "success",
                            title: "Report Submitted",
                            text: response.message,
                        });
                        $('#reportModal').modal('hide');
                        $('#reportForm')[0].reset();
                    },
                    error: function(xhr) {
                        let errorMessage = xhr.responseJSON.message || 'An error occurred.';
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            text: errorMessage,
                        });
                    }
                });
            });
        });


        $(document).on('click', '.editBtn', function(e) {
            let reccomendationId = $(this).data('reccomendation-id');
            $('#editReccomendationModal').modal('show');
            $.ajax({
                url: `http://127.0.0.1:8000/api/getReccomendation/${reccomendationId}`,
                type: 'get',
                success: function(response) {
                    let currentReccomendation = response.data.reccomendation;
                    $('#editReccomendation').val(currentReccomendation);
                    $('#editReccomendationForm').off('submit').on('submit', function(e) {
                        e.preventDefault();
                        let updateReccomendation = $('#editReccomendation').val();
                        $.ajax({
                            url: `http://127.0.0.1:8000/api/updateReccomendation/${reccomendationId}`,
                            type: 'PUT',
                            data: {
                                reccomendation: updateReccomendation
                            },
                            success: function(response) {
                                console.log(response.message);
                                $('#editReccomendationModal').modal('hide');
                                Swal.fire({
                                    icon: 'success',
                                    text: response.message
                                })
                                $('#reccomendations').empty();
                                $('#unApprovedReccomendations').empty();
                                getReccomendation()
                            },
                            error: function(err) {
                                console.log(err);
                            }
                        });
                    });
                },
                error: function(err) {
                    console.log(err);
                }
            });
        });

        $(document).on('click', '.approve', function(e) {
            let reccomendationId = $(this).data('reccomendation-id');
            $.ajax({
                url: `http://127.0.0.1:8000/api/approveReccomendation/${reccomendationId}`,
                type: 'post',
                success: function(response) {
                    $(`[data-reccomendationDiv-id="${reccomendationId}"]`).remove();
                    $('#reccomendations').empty()
                    getReccomendation()
                },
                error: function(err) {
                    console.log(err)
                }
            })
        })
        $(document).on('click', '.delete', function() {
            let reccomendationId = $(this).data('reccomendation-id');
            Swal.fire({
                icon: 'question',
                title: 'Are you sure you want to delete this reccomendetion?',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel',
                showCloseButton: true,
                focusConfirm: false,
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `http://127.0.0.1:8000/api/deleteReccomendation/${reccomendationId}`,
                        type: 'post',
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Reccomenation Deleted',
                                text: response.message,
                            })
                            $(`[data-reccomendationDiv-id="${reccomendationId}"]`).remove();
                            $('#reccomendations').empty()
                            getReccomendation()
                        },
                        error: function(err) {
                            console.log(err)
                        }
                    })
                }
            })

        })
        $('#reccomendations').empty()
        getReccomendation()
        $('#addConnection').on('click', function() {
            let connectionReceiverId = Number(id);
            let connectionSenderId = currentUser;
            $.ajax({
                url: 'http://127.0.0.1:8000/api/sendConnection',
                type: 'post',
                data: {
                    sender_id: connectionSenderId,
                    received_id: connectionReceiverId,
                },
                success: function(response) {
                    if (response.success === true) {
                        $('#pendingConnections').empty()
                        getConnections(id)
                        Swal.fire({
                            icon: 'success',
                            text: response.message
                        })
                    } else if (response.success === false) {
                        Swal.fire({
                            icon: 'error',
                            text: response.message
                        })
                    }
                },
                error: function(err) {
                    console.log(err)

                }
            })
        })

        function getConnections(id) {
            $.ajax({
                url: `http://127.0.0.1:8000/api/getConnections/${id}`,
                type: 'get',
                success: function(response) {
                    let connections = response.data;
                    $('#pendingConnections').empty();
                    $('#acceptedConnections').empty();
                    console.log(response.data)
                    connections.forEach(connection => {
                        let sender = connection.sender;
                        if (connection.status === 'pending') {
                            let pendingConnection = $(`
                        <div class="card p-2 m-2" style="width: 300px;">
                            <h5>Connection request</h5>
                            <img src="${window.location.origin}/${sender.img_path}" class="card-img-top rounded-circle mx-auto d-block" alt="Connection Sender" style="width: 150px; height: 150px; object-fit: cover;">
                            <div class="card-body">
                                <p class="card-text">Sender name: ${sender.name} ${sender.surname}</p>
                                <p class="card-text">Sender email: ${sender.email}</p>
                                <p class="card-text"><a href="http://127.0.0.1:8000/user/${sender.id}">Visit their profile</a></p>
                                <div>
                                    <button class="btn btn-success m-2 acceptConnectionBtn" data-connection-id="${connection.id}">Accept connection</button> 
                                    <button class="btn btn-danger m-2 deleteConnectionBtn" data-connection-id="${connection.id}">Delete connection</button> 
                                </div>
                            </div>
                        </div>
                    `);
                            $('#pendingConnections').append(pendingConnection);

                        } else if (connection.status === 'accepted') {
                            let acceptedConnection = $(`
                        <div class="card p-2 m-2" style="width: 18rem;">
                            <h5>Connection</h5>
                            <img src="${window.location.origin}/${sender.img_path}" class="card-img-top rounded-circle mx-auto d-block" alt="Connection Sender" style="width: 150px; height: 150px; object-fit: cover;">
                            <div class="card-body">
                                <p class="card-text">Sender name: ${sender.name} ${sender.surname}</p>
                                <p class="card-text">Sender email: ${sender.email}</p>
                                <p class="card-text"><a href="http://127.0.0.1:8000/user/${sender.id}">Visit their profile</a></p>
                                <div class="deleteBtnDiv"></div>
                            </div>
                        </div>
                    `);
                            let deleteBtn = $(`<button class="btn btn-danger m-2 deleteConnectionBtn" data-connection-id="${connection.id}">Delete connection</button>`);

                            $('#acceptedConnections').append(acceptedConnection);

                            if (currentUser === Number(id) || currentUser === 1) {
                                acceptedConnection.find('.deleteBtnDiv').append(deleteBtn);
                            }
                        }
                    });


                    $(document).on('click', '.acceptConnectionBtn', function() {
                        let connectionId = $(this).data('connection-id');
                        $.ajax({
                            url: `http://127.0.0.1:8000/api/acceptConnection/${connectionId}`,
                            type: 'post',
                            success: function(response) {
                                console.log(response);
                                $('#pendingConnections').empty()
                                getConnections(id)
                            },
                            error: function(err) {
                                console.log(err);
                            }
                        });
                    });

                    $(document).on('click', '.deleteConnectionBtn', function() {
                        let connectionId = $(this).data('connection-id');
                        $.ajax({
                            url: `http://127.0.0.1:8000/api/deleteConnection/${connectionId}`,
                            type: 'post',
                            success: function(response) {
                                Swal.fire({
                                    icon: 'success',
                                    text: response.message
                                })
                                $('#pendingConnections').empty()
                                $('#acceptedConnections').empty()
                                getConnections(id)
                            },
                            error: function(err) {
                                console.log(err);
                            }
                        });
                    });
                },
                error: function(err) {
                    console.log(err);
                }
            });
        }

        if (currentUser === Number(id) || currentUser === 1) {
            $('#pendingConnections').show();
        } else {
            $('#pendingConnections').hide();
        }
        $('#pendingConnections').empty()
        getConnections(id)
    });
</script>


@endsection