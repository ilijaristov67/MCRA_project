@extends('layouts.app')
@section('content')
<div class="container">
    <div id="users">
        <button id="usersBtn" type="button" class="btn btn-success">Manage Users</button>
        <button id="createBlog" type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalBlogs">Create Blogs</button>
        <button id="openModalBlogCategory" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalBlogCategory">Create Blog Category</button>
        <table class="table" id="usersTable">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Email</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Ban</th>
                    <th scope="col">Report History</th>
                </tr>
            </thead>
            <tbody id="usersTableBody">
            </tbody>
        </table>
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
<div class="modal fade" id="modalBlogs" tabindex="-1" aria-labelledby="modalBlogsLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalBlogsLabel">Create Blog</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createBlogForm">
                    <input type="hidden" id="currentUserId" value="{{ auth()->id() }}">
                    <div class="mb-3">
                        <label for="blogTitle" class="form-label mb-1">Blog Title</label>
                        <input type="text" name="blogTitle" class="form-control" id="blogTitle" value="{{ old('blogTitle') }}">
                    </div>
                    <div class="mb-3">
                        <label for="main_content" class="form-label mb-1">Blog Main Description</label>
                        <textarea class="form-control" name="main_content" id="main_content">{{ old('main_content') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label mb-1">Blog Image</label>
                        <input class="form-control" type="file" name="image" id="image">
                    </div>
                    <div class="mb-3 categoriesList">
                        <label for="category_id" class="form-label mb-1">Category</label>
                        <select class="form-control" name="category_id" id="category_id">

                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalBlogCategory" tabindex="-1" aria-labelledby="modalBlogCategoryLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalBlogCategoryLabel">Create Blog Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="createBlogCategoryForm">
                    <div class="mb-3">
                        <label for="category" class="form-label mb-1">Blog Category Title</label>
                        <input type="text" name="category" class="form-control" id="category" value="{{ old('category') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="addSubsectionsModal" tabindex="-1" aria-labelledby="addSubsectionsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addSubsectionsModalLabel">Create Subsection</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addSubsectionsModalForm">
                    <div id="subesctions">
                        <div class="mb-3">
                            <label for="subtitle-0" class="form-label mb-1">Blog Subtitle</label>
                            <input type="text" name="subtitle[]" class="form-control" id="subtitle-0" value="{{ old('subtitle-0') }}">
                        </div>
                        <div class="mb-3">
                            <label for="sub_content-0" class="form-label mb-1">Blog Subcontent</label>
                            <input type="text" name="sub_content[]" class="form-control" id="sub_content-0" value="{{ old('sub_content-0') }}">
                        </div>
                    </div>
                    <button id="addMoreContent" type="button" class="btn btn-info">Add more content</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        const usersBtn = $('#usersBtn');
        const usersTable = $('#usersTable');
        const usersTableBody = $('#usersTableBody');
        usersTable.hide();

        function populateCategories(categories) {
            $('#category_id').empty()
            categories.forEach(category => {
                let option = $(`  <option value="${category.id}">${category.category}</option>`)
                $('#category_id').append(option)
            });
        }
        $.ajax({
            url: 'api/getCategories',
            type: 'GET',
            success: function(response) {
                let categories = response.data;
                populateCategories(categories)
            },
            error: function(err) {
                console.log(err)
            }

        })

        function populateUsers(user) {
            let userRow = $(`<tr id="userRow-${user.id}">
        <td class="user-name">${user.name}</td>
        <td class="user-surname">${user.surname}</td>
        <td class="user-email">${user.email}</td>
        <td><button type="button" class="btn btn-warning editUserBtn" data-bs-toggle="modal" data-user-id="${user.id}" data-bs-target="#exampleModal">Edit User</button></td>
        <td><button data-user-id="${user.id}" type="button" class="btn btn-danger deleteBtn">Delete User</button></td>
        <td><button type="button" class="btn btn-secondary">Ban User</button></td>
        <td><button type="button" class="btn btn-info">Report History</button></td>
    </tr>`);
            usersTableBody.append(userRow);
        }
        usersBtn.on('click', function(e) {
            usersTable.show();
            if (usersTableBody.children().length > 0) {
                return;
            }

            $.ajax({
                url: 'api/allUsers',
                type: 'GET',
                success: function(data) {
                    let users = data.data;
                    users.forEach(user => {
                        populateUsers(user);
                    });
                },
                error: function(err) {
                    console.log(err);
                }
            });
        });
        usersTableBody.on('click', '.editUserBtn', function() {
            let currentUserId = $(this).data('user-id');
            $.ajax({
                url: `/api/user/${currentUserId}`,
                type: 'GET',
                success: function(response) {
                    let user = response.data;
                    let editForm = $('#editForm');
                    $('#editName').val(user.name);
                    $('#editSurname').val(user.surname);
                    $('#editEmail').val(user.email);
                    $('#editCity').val(user.city);
                    $('#editCountry').val(user.country);
                    $('#editNumber').val(user.number);
                    $('#editTitle').val(user.title);
                    $('#editBiography').val(user.biography);

                    if (user.img_path) {
                        $('#editImagePreview').attr('src', `${window.location.origin}/${user.img_path}`);
                    }

                    if (user.cv_path) {
                        $('#editCvLink').attr('href', `${window.location.origin}/${user.cv_path}`);
                    }

                    editForm.off('submit').on('submit', function(e) {
                        e.preventDefault();
                        const formData = new FormData(this);

                        if ($('#editCv')[0].files.length > 0) {
                            formData.append('cv', $('#editCv')[0].files[0]);
                        }

                        if ($('#editImage')[0].files.length > 0) {
                            formData.append('image', $('#editImage')[0].files[0]);
                        }

                        formData.append('name', $('#editName').val());
                        formData.append('surname', $('#editSurname').val());
                        formData.append('email', $('#editEmail').val());
                        formData.append('biography', $('#editBiography').val());
                        formData.append('city', $('#editCity').val());
                        formData.append('number', $('#editNumber').val());
                        formData.append('title', $('#editTitle').val());

                        $.ajax({
                            url: `http://127.0.0.1:8000/api/editUser/${currentUserId}`,
                            method: 'POST',
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function(data) {
                                $('#exampleModal').modal('hide');

                                let updatedUser = data.data;
                                let userRow = $(`#userRow-${currentUserId}`);
                                userRow.find('.user-name').text(updatedUser.name);
                                userRow.find('.user-surname').text(updatedUser.surname);
                                userRow.find('.user-email').text(updatedUser.email);

                                Swal.fire({
                                    title: "Good job!",
                                    text: "Successfully edited the user!",
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
                    });
                },
                error: function(err) {
                    console.log(err);
                }
            });
        });
        usersTableBody.on('click', '.deleteBtn', function() {
            let id = $(this).data('user-id');
            Swal.fire({
                title: "Are you sure?",
                text: "Do you really want to delete this user?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `api/deleteUser/${id}`,
                        type: 'DELETE',
                        success: function(response) {
                            if (response.success === true) {
                                Swal.fire({
                                    title: "User Deleted",
                                    text: response.message,
                                    icon: "success"
                                });
                                $(`#userRow-${id}`).remove();
                            } else {
                                Swal.fire({
                                    title: "Error",
                                    text: response.message,
                                    icon: "error"
                                });
                            }
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    });
                }
            });
        });
        const blogCategories = $('#category_id');

        $('#createBlogCategoryForm').off('submit').on('submit', function(e) {
            e.preventDefault()
            $('#modalBlogCategory').modal('hide');
            let category = $('#category').val();
            $.ajax({
                url: 'api/saveCategory',
                type: 'POST',
                data: {
                    category: category
                },
                success: function(response) {
                    if (response.success = true) {
                        Swal.fire({
                            icon: "success",
                            title: "Great!",
                            text: 'Category added',
                        });
                        $.ajax({
                            url: 'api/getCategories',
                            type: 'GET',
                            success: function(response) {
                                populateCategories(response.data)
                            },
                            error: function(err) {
                                console.log(err)
                            }
                        })
                    }
                    $('#category').val('');
                },
                error: function(err) {
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
            })
        })
        const createBlogForm = $('#createBlogForm');
        let counter = 1;
        $('#addMoreContent').on('click', function(e) {
            let newSection = $(`
    <div class="mb-3 dynamicSubsections">
        <label for="subtitle-${counter}" class="form-label mb-1">Blog Subtitle ${counter}</label>
        <input type="text" name="subtitle[]" class="form-control" id="subtitle-${counter}">
    </div>
    <div class="mb-3 dynamicSubsections">
        <label for="sub_content-${counter}" class="form-label mb-1">Blog Subcontent ${counter}</label>
        <input type="text" name="sub_content[]" class="form-control" id="sub_content-${counter}">
    </div>
    `);
            counter++;
            $('#subesctions').append(newSection);
        });
        createBlogForm.on('submit', function(e) {
            e.preventDefault();
            $('#modalBlogs').modal('hide');
            let formData = new FormData();
            let blogTitle = $('#blogTitle').val();
            let mainContent = $('#main_content').val();
            let userId = $('#currentUserId').val();
            let category_id = $('#category_id').val();
            let blogImage = $('#image')[0].files[0];
            formData.append('title', blogTitle)
            formData.append('main_content', mainContent)
            formData.append('user_id', userId)
            formData.append('category_id', category_id)
            formData.append('image', blogImage)
            $.ajax({
                url: 'api/saveBlog',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    $('#blogTitle').val('');
                    $('#main_content').val('');
                    $('#image').val('');
                    $('#category_id').prop('selectedIndex', 0);
                    let blogId = response.id
                    $('<input>').attr({
                        type: 'hidden',
                        name: 'blog_id',
                        value: blogId
                    }).appendTo('#addSubsectionsModalForm');
                    $('#addSubsectionsModal').modal('show');
                    if (response.success = true) {
                        Swal.fire({
                            icon: "success",
                            title: "Great!",
                            text: 'Blog added',
                        });
                    }
                    $('#addSubsectionsModalForm').on('submit', function(e) {
                        e.preventDefault();
                        $.ajax({
                            url: 'api/saveBlogBody',
                            type: 'POST',
                            data: $(this).serialize(),
                            success: function(response) {
                                $('#addSubsectionsModal').modal('hide');
                                $('input[name="subtitle[]"]').val('');
                                $('input[name="sub_content[]"]').val('');
                                counter = 1;
                                $('.dynamicSubsections').remove();
                                if (response.success = true) {
                                    Swal.fire({
                                        icon: "success",
                                        title: "Great!",
                                        text: 'Content was added',
                                    });
                                }
                            },
                            error: function(err) {

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
                        })
                    })
                },
                error: function(err) {
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
        });
    });
</script>
@endsection