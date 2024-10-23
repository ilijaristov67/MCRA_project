@extends('layouts.app')
@section('content')
<div class="container">
    <div id="users">
        <button id="usersBtn" type="button" class="btn btn-success m-2">Manage Users</button>
        <button id="createBlog" type="button" class="btn btn-secondary m-2" data-bs-toggle="modal" data-bs-target="#modalBlogs">Create Blogs</button>
        <button id="blogsBtn" type="button" class="btn btn-secondary m-2">Manage Blogs</button>
        <button id="openModalBlogCategory" type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#modalBlogCategory">Create Blog Category</button>
        <button id="showReports" type="button" class="btn btn-danger m-2">Show Reports</button>
        <button type="button" class="btn btn-info text-white m-2" data-bs-toggle="modal" data-bs-target="#speakersModal">
            Add Speakers
        </button>
        <button id="manageSpeakers" type="button" class="btn btn-info m-2 ">Manage Speakers</button>
        <button type="button" class="btn btn-success text-white m-2" data-bs-toggle="modal" data-bs-target="#employeeModal">
            Add Employee
        </button>
        <button id="manageEmployees" type="button" class="btn btn-success m-2 ">Manage Employees</button>
        <button type="button" class="btn btn-dark text-white m-2" data-bs-toggle="modal" data-bs-target="#createEventModal">
            Create Event
        </button>
        <button id="eventsBtn" type="button" class="btn btn-dark m-2">Manage Events</button>
        <button id="manageAgendasBtn" type="button" class="btn btn-secondary m-2">Manage Agendas</button>

        <button id="createConferenceBtn" type="button" class="btn btn-secondary m-2" data-bs-toggle="modal" data-bs-target="#createConferenceModal">Create Conference</button>
        <button id="manageConferencesBtn" type="button" class="btn btn-secondary m-2">Manage Conferences</button>

        <table class="table cursor-pointer" id="conferencesTable">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Theme</th>
                    <th scope="col">Description</th>
                    <th scope="col">Objective</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Location</th>
                    <th scope="col">Status</th>
                    <th scope="col">Speakers</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Add Agenda</th>
                </tr>
            </thead>
            <tbody id="conferencesTableBody">
            </tbody>
        </table>

        <table class="table cursor-pointer" id="agendasTable">
            <thead>
                <tr>
                    <th scope="col">Event Title</th>
                    <th scope="col">Agenda Title</th>
                    <th scope="col">Time</th>
                    <th scope="col">Speaker</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody id="agendasTableBody">
            </tbody>
        </table>

        <table class="table cursor-pointer" id="employeesTable">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Title</th>
                    <th scope="col">Bio</th>
                    <th scope="col">Status</th>
                    <th scope="col">Delete Employee</th>
                    <th scope="col">Edit Employee</th>
                </tr>
            </thead>
            <tbody id="employeesTableBody">
            </tbody>
        </table>
        <table class="table cursor-pointer" id="eventsTable">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Theme</th>
                    <th scope="col">Description</th>
                    <th scope="col">Objectives</th>
                    <th scope="col">Date</th>
                    <th scope="col">Day</th>
                    <th scope="col">Location</th>
                    <th scope="col">Ticket Price</th>
                    <th scope="col">Speakers</th>
                    <th scope="col">Delete Event</th>
                    <th scope="col">Edit Event</th>
                    <th scope="col">Add Agenda</th>
                </tr>
            </thead>
            <tbody id="eventsTableBody">
            </tbody>
        </table>
        <table class="table cursor-pointer" id="usersTable">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Email</th>
                    <th scope="col">User Profile</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Report History</th>
                </tr>
            </thead>
            <tbody id="usersTableBody">
            </tbody>
        </table>
        <table class="table cursor-pointer" id="speakersTable">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Title</th>
                    <th scope="col">Social Media</th>
                    <th scope="col">Is Special</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody id="speakersTableBody">
            </tbody>
        </table>
        <table class="table" id="blogsTable">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Written by:</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Edit Blog Body</th>
                    <th scope="col">See Blog</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Report History</th>
                </tr>
            </thead>
            <tbody id="blogTableBody">
            </tbody>
        </table>
    </div>
    <div class="reports_div">
        <table class="table" id="reports_table">
            <thead>
                <tr>
                    <th scope="col">Report by</th>
                    <th scope="col">Reason</th>
                    <th scope="col">Reported entity</th>
                    <th scope="col">Reported on date</th>
                    <th scope="col">Reported User</th>
                    <th scope="col">Delete Report</th>
                    <th scope="col">Ban/Delete</th>
                    <th scope="col">Reported Content</th>
                </tr>
            </thead>
            <tbody id="reportsTableBody">
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
<div class="modal fade" id="modalManageBlogs" tabindex="-1" aria-labelledby="modalManageBlogsLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalManageBlogsLabel">Manage Blogs</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editBlog">
                    <input type="hidden" id="currentUserIdEdit" value="{{ auth()->id() }}">
                    <div class="mb-3">
                        <label for="editBlogTitle" class="form-label mb-1">Blog Title</label>
                        <input type="text" name="editBlogTitle" class="form-control" id="editBlogTitle" value="{{ old('editBlogTitle') }}">
                    </div>
                    <div class="mb-3">
                        <label for="editMainContent" class="form-label mb-1">Blog Main Description</label>
                        <textarea class="form-control" name="editMainContent" id="editMainContent">{{ old('editMainContent') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editImageBlog" class="form-label mb-1">Blog Image</label>
                        <input class="form-control" type="file" name="editImageBlog" id="editImageBlog">
                    </div>
                    <div class="mb-3 categoriesList">
                        <label for="editCategoryId" class="form-label mb-1">Category</label>
                        <select class="form-control" name="editCategoryId" id="editCategoryId">
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalManageBlogsBody" tabindex="-1" aria-labelledby="modalManageBlogsBodyLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalManageBlogsBodyLabel">Manage Blogs</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editBlogBody"></form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="speakersModal" tabindex="-1" aria-labelledby="speakersModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="speakersModal">Add speaker</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addSpeaker" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="info" class="form-label">Speaker Info:</label>
                        <textarea class="form-control" name="info" id="info">{{ old('info')}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Speaker Title:</label>
                        <input class="form-control" name="title" id="title" value="{{ old('title')}}"></input>
                    </div>
                    <div class="mb-3">
                        <label for="social_media" class="form-label">Social Media:</label>
                        <input class="form-control" name="social_media" id="social_media" value="{{ old('social_media') }}"></input>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}"></input>
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last name:</label>
                        <input type="text" class="form-control" name="last_name" id="last_name" value="{{ old('last_name') }}"></input>
                    </div>
                    <div class="mb-3">
                        <label for="img" class="form-label">Image:</label>
                        <input type="file" class="form-control" name="img" id="img" value="{{ old('img') }}"></input>
                    </div>
                    <div class="mb-3">
                        <label for="is_special" class="form-label">Is special:</label>
                        <select class="form-select" name="is_special" id="is_special">
                            <option disabled {{ old('is_special') === null ? 'selected' : '' }}>Choose an option</option>
                            <option value="1" {{ old('is_special') == '1' ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ old('is_special') == '0' ? 'selected' : '' }}>No</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editSpeakersModal" tabindex="-1" aria-labelledby="editSpeakersModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editSpeakersModalLabel">Edit Speaker</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editSpeakerForm" enctype="multipart/form-data">
                    <input type="hidden" name="speaker_id" id="edit_speaker_id">

                    <div class="mb-3">
                        <label for="edit_info" class="form-label">Speaker Info:</label>
                        <textarea class="form-control" name="info" id="edit_info">{{ old('info') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="edit_title" class="form-label">Speaker Title:</label>
                        <input class="form-control" name="title" id="edit_title" value="{{ old('title') }}">
                    </div>

                    <div class="mb-3">
                        <label for="edit_social_media" class="form-label">Social Media:</label>
                        <input class="form-control" name="social_media" id="edit_social_media" value="{{ old('social_media') }}">
                    </div>

                    <div class="mb-3">
                        <label for="edit_name" class="form-label">Name:</label>
                        <input type="text" class="form-control" name="name" id="edit_name" value="{{ old('name') }}">
                    </div>

                    <div class="mb-3">
                        <label for="edit_last_name" class="form-label">Last Name:</label>
                        <input type="text" class="form-control" name="last_name" id="edit_last_name" value="{{ old('last_name') }}">
                    </div>

                    <div class="mb-3">
                        <label for="edit_img" class="form-label">Image:</label>
                        <input type="file" class="form-control" name="img" id="edit_img" value="{{ old('img') }}">
                    </div>

                    <div class="mb-3">
                        <label for="edit_is_special" class="form-label">Is Special:</label>
                        <select class="form-select" name="is_special" id="edit_is_special">
                            <option disabled {{ old('is_special') === null ? 'selected' : '' }}>Choose an option</option>
                            <option value="1" {{ old('is_special') == '1' ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ old('is_special') == '0' ? 'selected' : '' }}>No</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="createEventModal" tabindex="-1" aria-labelledby="createEventModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createEventModalLabel">Create New Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="eventForm">
                    <div class="mb-3">
                        <label for="eventTitle" class="form-label">Event Title</label>
                        <input type="text" class="form-control" id="eventTitle" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="eventTheme" class="form-label">Event Theme</label>
                        <input type="text" class="form-control" id="eventTheme" name="theme">
                    </div>
                    <div class="mb-3">
                        <label for="eventDescription" class="form-label">Event Description</label>
                        <textarea class="form-control" id="eventDescription" name="description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="eventObjectives" class="form-label">Event Objectives</label>
                        <textarea class="form-control" id="eventObjectives" name="objectives" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="eventDate" class="form-label">Event Date</label>
                        <input type="date" class="form-control" id="eventDate" name="date">
                    </div>
                    <div class="mb-3">
                        <label for="eventLocation" class="form-label">Event Location</label>
                        <input type="text" class="form-control" id="eventLocation" name="location">
                    </div>
                    <div class="mb-3">
                        <label for="ticketPrice" class="form-label">Ticket Price</label>
                        <input type="text" class="form-control" id="ticketPrice" name="ticket_price">
                    </div>
                    <div class="mb-3">
                        <select id="eventSpeakers" multiple name="eventSpeakers[]" class="form-select" aria-label="Default select example"> </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editEventModal" tabindex="-1" aria-labelledby="editEventModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editEventModalLabel">Edit Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editEventForm">
                    <input type="hidden" id="editEventId" name="event_id">

                    <div class="mb-3">
                        <label for="editEventTitle" class="form-label">Event Title</label>
                        <input type="text" class="form-control" id="editEventTitle" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="editEventTheme" class="form-label">Event Theme</label>
                        <input type="text" class="form-control" id="editEventTheme" name="theme">
                    </div>
                    <div class="mb-3">
                        <label for="editEventDescription" class="form-label">Event Description</label>
                        <textarea class="form-control" id="editEventDescription" name="description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editEventObjectives" class="form-label">Event Objectives</label>
                        <textarea class="form-control" id="editEventObjectives" name="objectives" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editEventDate" class="form-label">Event Date</label>
                        <input type="date" class="form-control" id="editEventDate" name="date">
                    </div>
                    <div class="mb-3">
                        <label for="editEventLocation" class="form-label">Event Location</label>
                        <input type="text" class="form-control" id="editEventLocation" name="location">
                    </div>
                    <div class="mb-3">
                        <label for="editTicketPrice" class="form-label">Ticket Price</label>
                        <input type="text" class="form-control" id="editTicketPrice" name="ticket_price">
                    </div>
                    <div class="mb-3">
                        <select id="editEventSpeakers" multiple name="eventSpeakers[]" class="form-select"></select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="employeeModal" tabindex="-1" aria-labelledby="employeeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="employeeModalLabel">Add New Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addEmployeeForm">
                    <div class="mb-3">
                        <label for="employeeName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="employeeName" name="employee_name" value="{{ old('employee_name')}}">
                    </div>
                    <div class="mb-3">
                        <label for="employeeLastname" class="form-label">Lastname</label>
                        <input type="text" class="form-control" id="employeeLastname" name="employee_lastname" value="{{ old('employee_lastname')}}">
                    </div>
                    <div class="mb-3">
                        <label for="employeeTitle" class="form-label">Title</label>
                        <input type="text" class="form-control" id="employeeTitle" name="employee_title" value="{{ old('employee_title')}}">
                    </div>
                    <div class="mb-3">
                        <label for="employeeBio" class="form-label">Short Biography</label>
                        <input type="text" class="form-control" id="employeeBio" name="employee_bio" value="{{ old('employee_bio')}}">
                    </div>
                    <div class="mb-3">
                        <label for="employeeStatus" class="form-label">Status</label>
                        <select name="employee_status" class="form-control" id="employee_status">
                            <option selected disabled>Select Status</option>
                            <option value="current">Employee</option>
                            <option value="past">Ex-employee</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Employee</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="editEmployeeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editEmployeeModalLabel">Edit Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editEmployeeForm">
                    <div class="mb-3">
                        <label for="editEmployeeName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="editEmployeeName" name="employee_name" value="{{ old('employee_name') }}">
                    </div>
                    <div class="mb-3">
                        <label for="editEmployeeLastname" class="form-label">Lastname</label>
                        <input type="text" class="form-control" id="editEmployeeLastname" name="employee_lastname" value="{{ old('employee_lastname') }}">
                    </div>
                    <div class="mb-3">
                        <label for="editEmployeeTitle" class="form-label">Title</label>
                        <input type="text" class="form-control" id="editEmployeeTitle" name="employee_title" value="{{ old('employee_title') }}">
                    </div>
                    <div class="mb-3">
                        <label for="editEmployeeBio" class="form-label">Short Biography</label>
                        <input type="text" class="form-control" id="editEmployeeBio" name="employee_bio" value="{{ old('employee_bio') }}">
                    </div>
                    <div class="mb-3">
                        <label for="editEmployeeStatus" class="form-label">Status</label>
                        <select name="employee_status" class="form-control" id="editEmployeeStatus">
                            <option selected disabled>Select Status</option>
                            <option value="current">Employee</option>
                            <option value="past">Ex-employee</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editAgendaModal" tabindex="-1" aria-labelledby="editAgendaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editAgendaForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAgendaModalLabel">Edit Agenda Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editAgendaId" name="agenda_id">
                    <div class="mb-3">
                        <label for="editAgendaTitle" class="form-label">Agenda Title</label>
                        <input type="text" class="form-control" id="editAgendaTitle" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="editAgendaContent" class="form-label">Content</label>
                        <textarea class="form-control" id="editAgendaContent" name="content"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editAgendaTime" class="form-label">Time</label>
                        <input type="time" class="form-control" id="editAgendaTime" name="time">
                    </div>
                    <div class="mb-3">
                        <label for="editAgendaSpeaker" class="form-label">Speaker</label>
                        <select class="form-select" id="editAgendaSpeaker" name="speaker_id">
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="eventAgendaModal" tabindex="-1" aria-labelledby="eventAgendaModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Create Event Agneda</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addEventAgenda">
                    <div id="eventAgendaSubsections">
                        <div class="mb-3">
                            <label for="event_agenda_subtitle-0" class="form-label mb-1">Section Title</label>
                            <input type="text" name="event_agenda_subtitle[]" class="form-control" id="event_agenda_subtitle-0" value="{{ old('event_agenda_subtitle-0') }}">
                        </div>
                        <div class="mb-3">
                            <label for="event_agenda_subcontent-0" class="form-label mb-1">Agenda Subcontent</label>
                            <input type="text" name="event_agenda_subcontent-0[]" class="form-control" id="event_agenda_subcontent-0" value="{{ old('event_agenda_subcontent-0') }}">
                        </div>
                        <div class="mb-3">
                            <label for="event_agenda_time-0" class="form-label mb-1">Agenda Time</label>
                            <select name="event_agenda_time-0" class="form-control" id="event_agenda_time-0"></select>
                        </div>
                        <div class="mb-3">
                            <label for="event_agenda_subcontent-0" class="form-label mb-1">Agenda Speakers</label>
                            <select name="event_agenda_speakers-0" class="form-control" id="event_agenda_speakers-0"></select>
                        </div>
                    </div>
                    <button id="agendaAddMoreContent" type="button" class="btn btn-info">Add more content</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="createConferenceModal" tabindex="-1" aria-labelledby="createConferenceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="createConferenceForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="createConferenceModalLabel">Create New Conference</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="conferenceTitle" class="form-label">Conference Title</label>
                        <input type="text" class="form-control" id="conferenceTitle" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="conferenceTheme" class="form-label">Conference Theme</label>
                        <input type="text" class="form-control" id="conferenceTheme" name="theme">
                    </div>
                    <div class="mb-3">
                        <label for="conferenceDescription" class="form-label">Conference Description</label>
                        <textarea class="form-control" id="conferenceDescription" name="description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="conferenceObjective" class="form-label">Conference Objective</label>
                        <textarea class="form-control" id="conferenceObjective" name="objective" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="conferenceStartDate" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="conferenceStartDate" name="start_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="conferenceEndDate" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="conferenceEndDate" name="end_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="conferenceLocation" class="form-label">Location</label>
                        <input type="text" class="form-control" id="conferenceLocation" name="location">
                    </div>
                    <div class="mb-3">
                        <label for="conferenceStatus" class="form-label">Status</label>
                        <select class="form-select" id="conferenceStatus" name="status">
                            <option value="">Select Status</option>
                            <option value="Upcoming">Upcoming</option>
                            <option value="Ongoing">Ongoing</option>
                            <option value="Completed">Completed</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="conferenceSpeakers" class="form-label">Speakers</label>
                        <select id="conferenceSpeakers" multiple name="speakers[]" class="form-select"></select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Create Conference</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editConferenceModal" tabindex="-1" aria-labelledby="editConferenceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editConferenceForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="editConferenceModalLabel">Edit Conference</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <input type="hidden" id="editConferenceId" name="conference_id">
                    <div class="mb-3">
                        <label for="editConferenceTitle" class="form-label">Conference Title</label>
                        <input type="text" class="form-control" id="editConferenceTitle" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="editConferenceTheme" class="form-label">Conference Theme</label>
                        <input type="text" class="form-control" id="editConferenceTheme" name="theme">
                    </div>
                    <div class="mb-3">
                        <label for="editConferenceDescription" class="form-label">Conference Description</label>
                        <textarea class="form-control" id="editConferenceDescription" name="description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editConferenceObjective" class="form-label">Conference Objective</label>
                        <textarea class="form-control" id="editConferenceObjective" name="objective" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editConferenceStartDate" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="editConferenceStartDate" name="start_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="editConferenceEndDate" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="editConferenceEndDate" name="end_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="editConferenceLocation" class="form-label">Location</label>
                        <input type="text" class="form-control" id="editConferenceLocation" name="location">
                    </div>
                    <div class="mb-3">
                        <label for="editConferenceStatus" class="form-label">Status</label>
                        <select class="form-select" id="editConferenceStatus" name="status">
                            <option value="">Select Status</option>
                            <option value="Upcoming">Upcoming</option>
                            <option value="Ongoing">Ongoing</option>
                            <option value="Completed">Completed</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editConferenceSpeakers" class="form-label">Speakers</label>
                        <select id="editConferenceSpeakers" multiple name="speakers[]" class="form-select"></select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update Conference</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="addConferenceAgendaModal" tabindex="-1" aria-labelledby="addConferenceAgendaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="addConferenceAgendaForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="addConferenceAgendaModalLabel">Add Agenda Items</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <input type="hidden" id="currentConferenceId" name="conference_id">
                    <div id="conferenceAgendaSections">

                    </div>
                    <button id="addAgendaSectionBtn" type="button" class="btn btn-info">Add Agenda Item</button>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save Agendas</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#reports_table').hide();
        $('#employeesTable').hide()

        function errorHandle(err) {
            let errors = err.responseJSON.errors;
            let errorMessages = '';
            for (let field in errors) {
                errorMessages += `${errors[field][0]} `;
            }
            Swal.fire({
                icon: "error",
                title: "Oops, could not find blog info...",
                text: errorMessages,
            });
        }
        $('#eventsTable').hide()
        $('#speakersTable').hide()
        $('#manageSpeakers').on('click', function() {
            $('#speakersTable').toggle()
        })
        $('#eventsBtn').on('click', () => {
            $('#eventsTable').toggle()
        })
        $('#manageEmployees').on('click', () => {
            $('#employeesTable').toggle()
            refreshEmployees();
        })


        $('#agendasTable').hide();

        $('#manageAgendasBtn').on('click', function() {
            $('#agendasTable').toggle();
            refreshAgendas();
        });


        const usersBtn = $('#usersBtn');
        const usersTable = $('#usersTable');
        const usersTableBody = $('#usersTableBody');
        usersTable.hide();
        usersBtn.on('dblclick', function() {
            usersTable.hide()
        })

        const blogTableBody = $('#blogTableBody');

        function populateCategories(categories) {
            $('#category_id').empty()
            categories.forEach(category => {
                let option = $(`  <option value="${category.id}">${category.category}</option>`)
                $('#category_id').append(option)
            });
        }

        function populateEditCategories(categories) {
            $('#editCategoryId').empty()
            categories.forEach(category => {
                let option = $(`  <option value="${category.id}">${category.category}</option>`)
                $('#editCategoryId').append(option)
            });
        }
        $.ajax({
            url: 'api/getCategories',
            type: 'GET',
            success: function(response) {
                let categories = response.data;
                populateCategories(categories)
                populateEditCategories(categories)
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
        <td><a href="${window.location.origin}/user/${user.id}" target="_blank"><button id="userProfile" type="button" class="btn btn-link">User Profile</button></a></td>
        <td><button type="button" class="btn btn-warning editUserBtn" data-bs-toggle="modal" data-user-id="${user.id}" data-bs-target="#exampleModal">Edit User</button></td>
        <td><button data-user-id="${user.id}" type="button" class="btn btn-danger deleteBtn">Delete User</button></td>
        <td><button type="button" class="btn btn-info">Report History</button></td>
    </tr>`);
            let banBtn = user.is_banned ?
                `<td><button class="btn btn-danger banUser" data-user="${user.id}" data-banned="true">Unban User</button></td>` :
                `<td><button class="btn btn-danger banUser" data-user="${user.id}" data-banned="false">Ban User</button></td>`;

            userRow.append(banBtn);

            $('#usersTableBody').append(userRow);
        }


        function populateBlogs(blogs) {
            blogs.forEach(blog => {
                let blogRow = `
        <tr id="blogRow-${blog.id}">  
            <td class="blogTitle">${blog.title}</td>
            <td><a href="${window.location.origin}/user/${blog.user_id}" target="_blank">
                <button id="blogCreator" type="button" class="btn btn-link">${blog.user_id}</button></a>
            </td>
            <td><button type="button" class="btn btn-warning editBlogBtn" 
                data-bs-toggle="modal" data-blog-id="${blog.id}" 
                data-bs-target="#modalManageBlogs">Edit Blog</button></td>
            <td><button type="button" class="btn btn-warning editBlogBody" 
                data-bs-toggle="modal" data-blog-id="${blog.id}" 
                data-bs-target="#modalManageBlogsBody">Edit Blog Body</button></td>
            <td><a href="${window.location.origin}/singleBlog/${blog.id}" target="_blank">
                <button id="singleBlog" type="button" class="btn btn-link">See Blog</button></a>
            </td>
            <td><button data-blog-id="${blog.id}" type="button" class="btn btn-danger deleteBtn">Delete Blog</button></td>
            <td><button type="button" class="btn btn-info">Report History</button></td>
        </tr>`;


                blogTableBody.append(blogRow);
            });
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
                            url: `${window.location.origin}/api/editUser/${currentUserId}`,
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
        let blogsTable = $('#blogsTable');
        blogsTable.hide();
        let blogsBtn = $('#blogsBtn');
        $('#blogsBtn').on('click', () => {
            $('#blogsTable').toggle();
        })
        blogsBtn.on('click', function(e) {
            blogsTable.show();
            if ($('#blogTableBody').children().length > 0) {
                return;
            }
            $.ajax({
                url: 'api/getBlogs',
                type: 'GET',
                success: function(response) {
                    let blog = response.data;
                    populateBlogs(blog)
                },
                error: function(err) {
                    console.log(err)
                }
            })
        })

        blogsTable.on('click', '.editBlogBtn', function(e) {
            let blogId = $(this).data('blog-id');
            let userId = $('#currentUserIdEdit').val();
            let blogTitle = $('#editBlogTitle');
            let blogContent = $('#editMainContent');
            let blogCategory = $('#editCategoryId');
            let blogImage = $('#editImageBlog');
            let blogImageInput = $('#editImageBlog');
            $.ajax({
                url: `api/getBlog/${blogId}`,
                type: 'GET',
                success: function(response) {
                    let blog = response.data;

                    blogTitle.val(blog.title);
                    blogContent.val(blog.main_content);
                    blogCategory.val(blog.category_id);

                    if (blog.image) {
                        blogImage.attr('src', `${window.location.origin}/${blog.image}`);
                    } else {
                        blogImage.attr('src', '');
                    }

                    $('#editBlog').off('submit').on('submit', function(e) {
                        e.preventDefault();
                        let formData = new FormData();
                        formData.append('title', blogTitle.val());
                        formData.append('main_content', blogContent.val());
                        formData.append('category_id', blogCategory.val());
                        if (blogImageInput[0].files[0]) {
                            formData.append('image', blogImageInput[0].files[0]);
                        }
                        $.ajax({
                            url: `api/updateBlog/${blogId}`,
                            type: 'POST',
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Blog updated successfully!',
                                    text: response.message
                                });
                                let updatedBlog = response.data;
                                $('#mainTitle').text(updatedBlog.title);
                                $('#mainDescription').text(updatedBlog.main_content);
                                $('#editCategoryId').val(updatedBlog.category_id);
                                if (updatedBlog.image) {
                                    $('#mainImage').attr('src', `${window.location.origin}/${updatedBlog.image}`);
                                }
                                let blogRow = $(`#blogRow-${updatedBlog.id}`);
                                blogRow.find('.blogTitle').text(updatedBlog.title);
                                blogRow.find('.blogCreator').text(updatedBlog.user_id);
                                blogRow.find('.blogImage').attr('src', `${window.location.origin}/${updatedBlog.image}`);
                                $('#modalManageBlogs').modal('hide');
                            },
                            error: function(err) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Something went wrong during the update.'
                                });
                            }
                        });
                    });
                },
                error: function(err) {
                    errorHandle(err);
                }
            });
        });
        blogsTable.on('click', '.editBlogBody', function(e) {
            let blogId = $(this).data('blog-id');
            let editBlogBodyForm = $('#editBlogBody');
            editBlogBodyForm.empty();
            $.ajax({
                url: `api/blogBody/${blogId}`,
                type: 'GET',
                success: function(response) {
                    let sections = response.data;
                    let counter = 0;

                    sections.forEach((subsection, index) => {
                        let subsectionHtml = `
                    <div class="mb-3 dynamicSubsections">
                        <label for="subtitle-${counter}" class="form-label mb-1">Blog Subtitle ${counter + 1}</label>
                        <input type="text" name="subtitle[]" class="form-control" id="subtitle-${counter}" value="${subsection.subtitle}">
                    </div>
                    <div class="mb-3 dynamicSubsections">
                        <label for="sub_content-${counter}" class="form-label mb-1">Blog Subcontent ${counter + 1}</label>
                        <input type="text" name="sub_content[]" class="form-control" id="sub_content-${counter}" value="${subsection.sub_content}">
                    </div>
                `;
                        editBlogBodyForm.append(subsectionHtml);
                        counter++;
                    });
                    let addMoreButton = `
                <button id="addMoreContentEdit" type="button" class="btn btn-info">Add more content</button>
                <button type="submit" class="btn btn-primary">Save changes</button>`;
                    editBlogBodyForm.append(addMoreButton);
                    $('#addMoreContentEdit').on('click', function(e) {
                        let newSection = `
                    <div class="mb-3 dynamicSubsections">
                    <label for="subtitle-${counter}" class="form-label mb-1">Blog Subtitle ${counter + 1}</label>
                    <input type="text" name="subtitle[]" class="form-control" id="subtitle-${counter}">
                    </div>
                    <div class="mb-3 dynamicSubsections">
                    <label for="sub_content-${counter}" class="form-label mb-1">Blog Subcontent ${counter + 1}</label>
                    <input type="text" name="sub_content[]" class="form-control" id="sub_content-${counter}">
                    </div>`;

                        $(newSection).insertBefore('#addMoreContentEdit');
                        counter++;
                    });
                    $('#editBlogBody').off('submit').on('submit', function(e) {
                        e.preventDefault();
                        let formData = $(this).serialize();

                        $.ajax({
                            url: `api/updateBlogBody/${blogId}`,
                            type: 'POST',
                            data: formData,
                            success: function(response) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Blog body updated successfully!',
                                    text: response.message
                                });
                                $('#modalManageBlogsBody').modal('hide');
                            },
                            error: function(err) {
                                let errors = err.responseJSON.errors;
                                let errorMessages = '';
                                for (let field in errors) {
                                    errorMessages += `${errors[field][0]} `;
                                }
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
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
        $('#blogTableBody').on('click', '.deleteBtn', function(e) {
            e.preventDefault();
            let blogId = $(this).data('blog-id');

            Swal.fire({
                title: "Are you sure?",
                text: "Do you really want to delete this blog?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "Cancel"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `api/deleteBlog/${blogId}`,
                        type: 'POST',
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Blog deleted successfully!',
                                text: response.message
                            });
                            $.ajax({
                                url: 'api/getBlogs',
                                type: 'GET',
                                success: function(response) {
                                    let blogs = response.data;
                                    $('#blogTableBody').empty();
                                    if (blogs.length > 0) {
                                        populateBlogs(blogs);
                                    }
                                },
                                error: function(err) {
                                    console.log(err);
                                }
                            });
                        },
                        error: function(err) {
                            Swal.fire({
                                icon: "error",
                                title: "Oops, could not delete blog",
                                text: "An error occurred while trying to delete the blog.",
                            });
                            console.log(err);
                        }
                    });
                }
            });
        });
        $('#blogsTable').on('dblclick', function() {
            usersTable.hide()
        })
    });

    function populateReports(reports) {
        let reportsTableBody = $('#reportsTableBody');

        reports.forEach(report => {
            let dateReported = report.created_at.split('T')[0];
            let type;
            switch (report.reportable_type) {
                case 'App\\Models\\Comment':
                    type = 'Comment';
                    break;
                case 'App\\Models\\Reccomendation':
                    type = 'Reccomendation';
                    break;
                case 'App\\Models\\User':
                    type = 'User';
                    break;
                case 'App\\Models\\Blog':
                    type = 'Blog';
            }

            let row = `
            <tr data-reportId="${report.id}" data-reportable-id="${report.reportable_id}">
                <td><a href="${window.location.origin}/user/${report.user_id}">Reported by</a></td>
                <td>${report.reason}</td>
                <td>${type}</td>
                <td>${dateReported}</td>
                <td><a href="${window.location.origin}/user/${report.reported_user_id}">Reported user</a></td>
                <td><button class="btn btn-danger deleteReportBtn" data-delete-report="${report.id}">Delete Report</button></td
            </tr>`;

            let $row = $(row);
            reportsTableBody.append($row);

            if (type === 'User') {
                let userBtn = `<td><button class="btn btn-danger banUser" data-user="${report.reported_user_id}">Ban User</button></td>`;

                $row.append(userBtn)
            }

            if (type === 'Comment') {
                let commentBtn = `   <td data-delete-comment-row="${report.reportable_id}" data-delete-row=${report.id}><button class="btn btn-danger deleteCommentBtn" data-delete-comment-id="${report.reportable_id}">Delete Comment</button></td`
                $row.append(commentBtn)
                console.log(report)
                if (report.reportable_id != null) {
                    $.ajax({
                        url: `${window.location.origin}/api/getComment/${report.reportable_id}`,
                        type: 'get',
                        success: function(response) {
                            let comment = response.data.comment;
                            let para = $(`<p>${comment}</p>`);
                            $row.append($('<td></td>').append(para));
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    });
                }
            } else if (type === 'Reccomendation') {
                let reccomendationBtn = `   <td><button class="btn btn-danger deleteRepcBtn" data-delete-rec="${report.reportable_id}">Delete Reccomendation</button></td`
                $row.append(reccomendationBtn)
                $.ajax({
                    url: `${window.location.origin}/api/getReccomendation/${report.reportable_id}`,
                    type: 'get',
                    success: function(response) {
                        let recommendation = response.data.reccomendation;
                        let para = $(`<p>${recommendation}</p>`);
                        $row.append($('<td></td>').append(para));
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            }
        });
    }
    $('#showReports').on('click', function() {
        $('#reports_table').toggle();
    });
    $.ajax({
        url: `${window.location.origin}/api/getReports`,
        type: 'get',
        success: function(response) {
            let reports = response.data;
            populateReports(reports);
        },
        error: function(err) {
            console.log(err);
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'An error occurred while fetching reports!',
            });
        }
    });

    $(document).on('click', '.deleteReportBtn', function() {
        let currentReportId = $(this).data('delete-report');
        $.ajax({
            url: `${window.location.origin}/api/deleteReport/${currentReportId}`,
            type: "post",
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    text: response.message,
                });
                $(`tr[data-reportId="${currentReportId}"]`).remove();
                loadReports();
            },
            error: function(err) {
                console.log(err)
            }
        })
    })

    $(document).on('click', '.banUser', function() {
        let userId = $(this).data('user');
        let button = $(this);

        $.ajax({
            url: `${window.location.origin}/api/toggleBan/${userId}`,
            type: 'POST',
            success: function(response) {
                if (response.success) {
                    if (button.text().trim() === "Ban User") {
                        button.text("Unban User");
                    } else {
                        button.text("Ban User");
                    }

                    Swal.fire({
                        icon: 'success',
                        title: response.message,
                    });
                }
            },
            error: function(err) {
                console.log(err);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error banning/unbanning user!',
                });
            }
        });
    });
    $(document).on('click', '.deleteCommentBtn', function() {
        let deleteCommentId = $(this).data('delete-comment-id');
        $.ajax({
            url: `${window.location.origin}/api/deleteComment/${deleteCommentId}`,
            type: 'post',
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: response.message,
                });
                $(`tr[data-reportable-id="${deleteCommentId}"]`).remove();
            },
            error: function(error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error deleting comment!',
                });
            }
        });
    });
    $(document).on('click', '.deleteRepcBtn', function(e) {
        let recId = $(this).data('delete-rec');
        $.ajax({
            url: `${window.location.origin}/api/deleteReccomendation/${recId}`,
            type: 'post',
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: response.message,
                });
                $(`tr[data-reportable-id="${recId}"]`).remove();

            },
            error: function(error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error deleting comment!',
                });
            }
        })
    })
    $('#addSpeaker').off('submit').on('submit', function(e) {
        e.preventDefault();
        $('#speakersModal').modal('hide');
        let formData = new FormData(this);
        $.ajax({
            url: `${window.location.origin}/api/saveSpeaker`,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    text: response.message
                })
                refreshSpeakers()
            },
            error: function(err) {
                console.log(err)
            }
        });
    })

    function populateSpeakers(speakers) {
        speakers.forEach(speaker => {
            let row = $(`
                <tr>
                <td>${speaker.name}</td>
                <td>${speaker.last_name}</td>
                <td>${speaker.title}</td>
                <td>${speaker.social_media}</td>
                <td>${speaker.is_special}</td>
                <td><button data-speaker-id="${speaker.id}" class="btn btn-warning editSpeaker">Edit</button></td>
                <td><button data-speaker-id="${speaker.id}" class="btn btn-danger deleteSpeaker">Delete</button></td>
                </tr>
                `)
            $('#speakersTableBody').append(row)
        });
    }

    function refreshSpeakers() {
        $.ajax({
            url: `${window.location.origin}/api/getSpeakers`,
            type: 'GET',
            success: function(response) {
                let speakers = response.data;
                $('#speakersTableBody').empty();
                populateSpeakers(speakers);
            },
            error: function(err) {
                console.log(err);
            }
        });
    }
    $.ajax({
        url: `${window.location.origin}/api/getSpeakers`,
        type: 'get',
        success: function(response) {
            let speakers = response.data;
            $('#speakersTableBody').empty()
            populateSpeakers(speakers)
        },
        error: function(err) {
            console.log(err)
        }
    })
    $(document).on('click', '.deleteSpeaker', function() {
        let speakerId = $(this).data('speaker-id');
        $.ajax({
            url: `${window.location.origin}/api/deleteSpeaker/${speakerId}`,
            type: 'post',
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    text: response.message
                })
                refreshSpeakers()
            },
            error: function(err) {
                console.log(response)
            }
        })
    })
    $(document).on('click', '.editSpeaker', function() {
        let speakerId = $(this).data('speaker-id');
        $.ajax({
            url: `${window.location.origin}/api/getSpeaker/${speakerId}`,
            type: 'get',
            success: function(response) {
                let speaker = response.data;
                $('#edit_speaker_id').val(speaker.id);
                $('#edit_info').val(speaker.info);
                $('#edit_title').val(speaker.title);
                $('#edit_social_media').val(speaker.social_media);
                $('#edit_name').val(speaker.name);
                $('#edit_last_name').val(speaker.last_name);
                $('#edit_is_special').val(speaker.is_special ? '1' : '0');
                $('#edit_img_preview').attr('src', `${window.location.origin}/${speaker.img}`);
                $('#editSpeakersModal').modal('show');
                $('#editSpeakerForm').off('submit').on('submit', function(e) {
                    e.preventDefault();
                    let formData = new FormData(this);
                    $.ajax({
                        url: `${window.location.origin}/api/updateSpeaker/${speakerId}`,
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                text: response.message
                            });
                            refreshSpeakers();
                            $('#editSpeakersModal').modal('hide');
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

    $.ajax({
        url: `${window.location.origin}/api/getSpeakers`,
        type: 'GET',
        success: function(response) {
            let speakers = response.data;
            speakers.forEach(speaker => {
                let speakerOption = $(`<option value="${speaker.id}">${speaker.name} ${speaker.last_name}</option>`);
                $('#eventSpeakers').append(speakerOption);
            });
            refreshSpeakers()
        },
        error: function(err) {
            console.log(err);
        }
    });

    $('#eventForm').off('submit').on('submit', function(e) {
        e.preventDefault()
        $('#createEventModal').modal('hide')
        let formData = $(this).serialize();
        $.ajax({
            url: `${window.location.origin}/api/saveEvent`,
            type: 'post',
            data: formData,
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    text: response.message,
                })
                $('#eventsTableBody').empty()
                refreshEvents()
            },
            error: function(err) {
                console.log(err)
            }
        })
    })

    function populateEvents(events) {
        let tableBody = $('#eventsTableBody');
        tableBody.empty();
        events.forEach(event => {
            let row = `<tr>
            <td>${event.title}</td>
            <td>${event.theme}</td>
            <td>${event.description}</td>
            <td>${event.objectives}</td>
            <td>${event.date}</td>
            <td>${event.day}</td>
            <td>${event.location}</td>
            <td>${event.ticket_price}</td>
            <td>${event.speakers.map(speaker => speaker.name + ' ' + speaker.last_name).join(', ')}</td>
            <td><button class="btn btn-danger deleteEventBtn" data-event-id="${event.id}">Delete Event</button></td>
            <td><button class="btn btn-warning editEventBtn" data-event-id="${event.id}">Edit Event</button></td>
            <td><button class="btn btn-success addAgendaBtn" data-event-id="${event.id}">Add Agenda</button></td>
        </tr>`;
            tableBody.append(row);
        });
    }

    function refreshEvents() {
        $.ajax({
            url: `${window.location.origin}/api/getEvents`,
            type: 'get',
            success: function(response) {
                let events = response.data;
                populateEvents(events);
            },
            error: function(err) {
                console.log(err);
            }
        });
    }
    $('#eventsBtn').on('click', function() {
        refreshEvents()
    });
    $(document).on('click', '.deleteEventBtn', function() {
        let eventId = $(this).data('event-id');
        $.ajax({
            url: `${window.location.origin}/api/deleteEvent/${eventId}`,
            type: 'post',
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    text: response.message
                })
                refreshEvents()
            },
            error: function(err) {
                console.log(err)
            }
        })
    })
    $(document).on('click', '.editEventBtn', function() {
        let eventId = $(this).data('event-id');

        $.ajax({
            url: `${window.location.origin}/api/getEvent/${eventId}`,
            type: 'GET',
            success: function(response) {
                let event = response.data;
                $('#editEventId').val(event.id);
                $('#editEventTitle').val(event.title);
                $('#editEventTheme').val(event.theme);
                $('#editEventDescription').val(event.description);
                $('#editEventObjectives').val(event.objectives);
                $('#editEventDate').val(event.date);
                $('#editEventLocation').val(event.location);
                $('#editTicketPrice').val(event.ticket_price);
                let speakers = event.speakers;
                let speakersSelect = $('#editEventSpeakers');
                speakersSelect.empty();
                $.ajax({
                    url: '/api/getSpeakers',
                    type: 'GET',
                    success: function(speakersResponse) {
                        speakersResponse.data.forEach(function(speaker) {
                            let isSelected = speakers.some(function(evSpeaker) {
                                return evSpeaker.id === speaker.id;
                            });
                            let option = $('<option>')
                                .val(speaker.id)
                                .text(`${speaker.name} ${speaker.last_name}`)
                                .prop('selected', isSelected);
                            speakersSelect.append(option);
                        });
                        $('#editEventModal').modal('show');
                    },
                    error: function(err) {
                        console.log('Error fetching speakers:', err);
                    }
                });
            },
            error: function(err) {
                console.log('Error fetching event:', err);
            }
        });
    });

    $('#editEventForm').on('submit', function(e) {
        e.preventDefault();
        let formData = $(this).serialize();
        let eventId = $('#editEventId').val();

        $.ajax({
            url: `/api/updateEvent/${eventId}`,
            type: 'POST',
            data: formData,
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Event updated successfully!',
                    text: response.message
                });
                $('#editEventModal').modal('hide');
                refreshEvents();
            },
            error: function(err) {
                console.log('Error updating event:', err);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error updating the event!'
                });
            }
        });
    });

    function populateEmployees(employees) {
        let employeesTableBody = $('#employeesTableBody');
        employees.forEach(employee => {
            let employeeRow = `
        <tr id="employeeRow-${employee.id}">
            <td>${employee.employee_name}</td>
            <td>${employee.employee_lastname}</td>
            <td>${employee.employee_title}</td>
            <td>${employee.employee_bio}</td>
            <td>${employee.employee_status}</td>
            <td>
                <button type="button" class="btn btn-danger deleteEmployeeBtn" data-employee-id="${employee.id}">
                    Delete
                </button>
            </td>
            <td>
                <button type="button" class="btn btn-warning editEmployeeBtn" data-employee-id="${employee.id}" data-bs-target="#employeeModal">
                    Edit
                </button>
            </td>
        </tr>`;
            employeesTableBody.append(employeeRow);
        });
    }

    function refreshEmployees() {
        $.ajax({
            url: `${window.location.origin}/api/getEmployees`,
            type: 'GET',
            success: function(response) {
                let employees = response.data;
                $('#employeesTableBody').empty();
                populateEmployees(employees);
            },
            error: function(err) {
                console.error("Error fetching employees: ", err);
            }
        });
    }
    $('#addEmployeeForm').off('submit').on('submit', function(e) {
        e.preventDefault();
        console.log('this is employees')
        $('#employeeModal').modal('hide')
        let formData = $(this).serialize();
        $.ajax({
            url: `${window.location.origin}/api/addEmployee`,
            type: 'post',
            data: formData,
            success: function(response) {
                if (response.success === true) {
                    Swal.fire({
                        icon: 'success',
                        text: response.message
                    });
                    $('#employeesTableBody').empty();
                    refreshEmployees();
                } else {
                    Swal.fire({
                        icon: 'error',
                        text: response.message
                    });
                }
            },
            error: function(err) {
                console.log(err)
            }
        })
    })
    $(document).on('click', '.editEmployeeBtn', function() {
        let employeeId = $(this).data('employee-id');
        $('#editEmployeeModal').modal('show');
        $.ajax({
            url: `${window.location.origin}/api/getEmployee/${employeeId}`,
            type: 'GET',
            success: function(response) {
                let employee = response.data;
                $('#editEmployeeName').val(employee.employee_name);
                $('#editEmployeeLastname').val(employee.employee_lastname);
                $('#editEmployeeTitle').val(employee.employee_title);
                $('#editEmployeeBio').val(employee.employee_bio);
                $('#editEmployee_status').val(employee.employee_status);
                $('#editEmployeeModal').data('employee-id', employee.id);
                $('#editEmployeeForm').off('submit').on('submit', function(e) {
                    e.preventDefault();
                    let formData = $(this).serialize();
                    $.ajax({
                        url: `${window.location.origin}/api/updateEmployee/${employeeId}`,
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                text: response.message
                            });
                            $('#editEmployeeModal').modal('hide');
                            $('#employeesTableBody').empty();
                            refreshEmployees();
                        },
                        error: function(err) {
                            console.log(err);
                            Swal.fire({
                                icon: 'error',
                                text: 'Something went wrong!'
                            });
                        }
                    });
                });
            },
            error: function(err) {
                console.log("Error fetching employee data: ", err);
            }
        });
    });
    $(document).on('click', '.deleteEmployeeBtn', function() {
        let employeeId = $(this).data('employee-id');
        $.ajax({
            url: `${window.location.origin}/api/deleteEmployee/${employeeId}`,
            type: 'post',
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    text: response.message
                });
                $('#editEmployeeModal').modal('hide');
                $('#employeesTableBody').empty();
                refreshEmployees();
            },
            error: function(err) {
                console.log(err)
            }
        })
    })
    $(document).on('click', '.addAgendaBtn', function() {
        let eventId = $(this).data('event-id');
        $('#eventAgendaModal').modal('show');
        $('#eventAgendaSubsections').empty();
        let counter = 0;
        $.ajax({
            url: `${window.location.origin}/api/getEvent/${eventId}`,
            type: 'GET',
            success: function(response) {
                let event = response.data;
                let eventSpeakers = event.speakers;
                addAgendaSection(counter, eventSpeakers);
                $('#agendaAddMoreContent').off('click').on('click', function() {
                    counter++;
                    addAgendaSection(counter, eventSpeakers);
                });
                let usedTimes = [];

                $(document).off('change', '.agenda-time-select').on('change', '.agenda-time-select', function() {
                    usedTimes = [];
                    $('.agenda-time-select').each(function() {
                        let timeValue = $(this).val();
                        if (timeValue) {
                            usedTimes.push(timeValue);
                        }
                    });
                    $('.agenda-time-select').each(function() {
                        let selectElement = $(this);
                        selectElement.find('option').each(function() {
                            let option = $(this);
                            if (usedTimes.includes(option.val()) && option.val() !== selectElement.val()) {
                                option.prop('disabled', true);
                            } else {
                                option.prop('disabled', false);
                            }
                        });
                    });
                });
                $('#addEventAgenda').off('submit').on('submit', function(e) {
                    e.preventDefault();
                    let formData = $(this).serializeArray();
                    formData.push({
                        name: 'event_id',
                        value: eventId
                    });

                    $.ajax({
                        url: `${window.location.origin}/api/saveEventAgenda`,
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                text: response.message,
                            });
                            $('#eventAgendaModal').modal('hide');
                        },
                        error: function(err) {
                            console.log(err);
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Error saving event agenda!',
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

    function addAgendaSection(counter, eventSpeakers) {
        let sectionHtml = `
    <div class="agenda-section" data-section-index="${counter}">
        <div class="mb-3">
            <label for="event_agenda_subtitle-${counter}" class="form-label mb-1">Section Title</label>
            <input type="text" name="event_agenda_subtitle[]" class="form-control" id="event_agenda_subtitle-${counter}">
        </div>
        <div class="mb-3">
            <label for="event_agenda_subcontent-${counter}" class="form-label mb-1">Agenda Subcontent</label>
            <input type="text" name="event_agenda_subcontent[]" class="form-control" id="event_agenda_subcontent-${counter}">
        </div>
        <div class="mb-3">
            <label for="event_agenda_time-${counter}" class="form-label mb-1">Agenda Time</label>
            <select name="event_agenda_time[]" class="form-control agenda-time-select" id="event_agenda_time-${counter}">
                <option selected disabled>Select Time</option>
                ${generateTimeOptions()}
            </select>
        </div>
        <div class="mb-3">
            <label for="event_agenda_speakers-${counter}" class="form-label mb-1">Agenda Speaker</label>
            <select name="event_agenda_speakers[]" class="form-control" id="event_agenda_speakers-${counter}">
                <option selected disabled>Select Speaker</option>
                ${generateSpeakerOptions(eventSpeakers)}
            </select>
        </div>
        <button type="button" class="btn btn-danger removeAgendaSection" data-section-index="${counter}">Remove Section</button>
        <hr>
    </div>
    `;

        $('#eventAgendaSubsections').append(sectionHtml);

        $(document).off('click', '.removeAgendaSection').on('click', '.removeAgendaSection', function() {
            let index = $(this).data('section-index');
            $(`.agenda-section[data-section-index="${index}"]`).remove();

            $('.agenda-time-select').trigger('change');
        });
    }

    function generateTimeOptions() {
        let timeOptions = '';
        for (let hour = 8; hour <= 18; hour++) {
            let time = hour < 10 ? `0${hour}:00` : `${hour}:00`;
            timeOptions += `<option value="${time}">${time}</option>`;
        }
        return timeOptions;
    }

    function generateSpeakerOptions(speakers) {
        let speakerOptions = '';
        speakers.forEach(function(speaker) {
            speakerOptions += `<option value="${speaker.id}">${speaker.name} ${speaker.last_name}</option>`;
        });
        return speakerOptions;
    }

    function refreshAgendas() {
        $.ajax({
            url: `${window.location.origin}/api/getAgendas`,
            type: 'GET',
            success: function(response) {
                let agendas = response.data;
                $('#agendasTableBody').empty();
                populateAgendas(agendas);
            },
            error: function(err) {
                console.error("Error fetching agendas: ", err);
            }
        });
    }

    function populateAgendas(agendas) {
        let agendasTableBody = $('#agendasTableBody');
        agendas.forEach(agenda => {
            let agendaRow = `
            <tr id="agendaRow-${agenda.id}">
                <td>${agenda.event_title}</td>
                <td>${agenda.title}</td>
                <td>${agenda.time}</td>
                <td>${agenda.speaker_name}</td>
                <td>
                    <button type="button" class="btn btn-warning editAgendaBtn" data-agenda-id="${agenda.id}">
                        Edit
                    </button>
                </td>
                <td>
                    <button type="button" class="btn btn-danger deleteAgendaBtn" data-agenda-id="${agenda.id}">
                        Delete
                    </button>
                </td>
            </tr>`;
            agendasTableBody.append(agendaRow);
        });
    }
    $(document).on('click', '.editAgendaBtn', function() {
        let agendaId = $(this).data('agenda-id');
        $('#editAgendaModal').modal('show');


        $.ajax({
            url: `${window.location.origin}/api/getAgenda/${agendaId}`,
            type: 'GET',
            success: function(response) {
                let agenda = response.data;
                $('#editAgendaId').val(agenda.id);
                $('#editAgendaTitle').val(agenda.title);
                $('#editAgendaContent').val(agenda.content);
                $('#editAgendaTime').val(agenda.time);
                populateAgendaSpeakers(agenda.event_id, agenda.speaker_id);
                $('#editAgendaForm').off('submit').on('submit', function(e) {
                    e.preventDefault();
                    let formData = $(this).serialize();
                    $.ajax({
                        url: `${window.location.origin}/api/updateAgenda/${agendaId}`,
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                text: response.message
                            });
                            $('#editAgendaModal').modal('hide');
                            refreshAgendas();
                        },
                        error: function(err) {
                            console.log(err);
                            Swal.fire({
                                icon: 'error',
                                text: 'Error updating agenda item!'
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

    function populateAgendaSpeakers(eventId, selectedSpeakerId = null) {
        $.ajax({
            url: `${window.location.origin}/api/getEventSpeakers/${eventId}`,
            type: 'GET',
            success: function(response) {
                let speakers = response.data;
                let speakerSelect = $('#editAgendaSpeaker');
                speakerSelect.empty();
                speakers.forEach(function(speaker) {
                    let isSelected = (speaker.id == selectedSpeakerId);
                    let option = $('<option>')
                        .val(speaker.id)
                        .text(`${speaker.name} ${speaker.last_name}`)
                        .prop('selected', isSelected);
                    speakerSelect.append(option);
                });
            },
            error: function(err) {
                console.log('Error fetching speakers:', err);
            }
        });
    }
    $(document).on('click', '.deleteAgendaBtn', function() {
        let agendaId = $(this).data('agenda-id');

        Swal.fire({
            title: "Are you sure?",
            text: "Do you really want to delete this agenda item?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "Cancel"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `${window.location.origin}/api/deleteAgenda/${agendaId}`,
                    type: 'post',
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            text: response.message
                        });
                        $(`#agendaRow-${agendaId}`).remove();
                    },
                    error: function(err) {
                        Swal.fire({
                            icon: 'error',
                            text: 'Error deleting agenda item!'
                        });
                    }
                });
            }
        });
    });

    $('#conferencesTable').hide();

    function populateSpeakersSelect(elementId) {
        $.ajax({
            url: `${window.location.origin}/api/getSpeakers`,
            type: 'GET',
            success: function(response) {
                let speakers = response.data;
                let selectElement = $(elementId);
                selectElement.empty();
                speakers.forEach(function(speaker) {
                    let option = $(`<option value="${speaker.id}">${speaker.name} ${speaker.last_name}</option>`);
                    selectElement.append(option);
                });
            },
            error: function(err) {
                console.log(err);
            }
        });
    }

    $('#createConferenceBtn').on('click', function() {
        populateSpeakersSelect('#conferenceSpeakers');
    });
    $('#createConferenceForm').on('submit', function(e) {
        e.preventDefault();
        $('#createConferenceModal').modal('hide');
        let formData = $(this).serialize();
        $.ajax({
            url: `${window.location.origin}/api/saveConference`,
            type: 'POST',
            data: formData,
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    text: response.message,
                });
                refreshConferences();
            },
            error: function(err) {
                console.log(err);
                Swal.fire({
                    icon: 'error',
                    text: 'Error creating conference!',
                });
            }
        });
    });
    $('#manageConferencesBtn').on('click', function() {
        $('#conferencesTable').toggle();
        refreshConferences();
    });

    function refreshConferences() {
        $.ajax({
            url: `${window.location.origin}/api/getConferences`,
            type: 'GET',
            success: function(response) {
                let conferences = response.data;
                populateConferences(conferences);
            },
            error: function(err) {
                console.log(err);
            }
        });
    }

    function populateConferences(conferences) {
        let tableBody = $('#conferencesTableBody');
        tableBody.empty();
        conferences.forEach(conference => {
            let row = `<tr>
                <td>${conference.title}</td>
                <td>${conference.theme || ''}</td>
                <td>${conference.description || ''}</td>
                <td>${conference.objective || ''}</td>
                <td>${conference.start_date}</td>
                <td>${conference.end_date}</td>
                <td>${conference.location || ''}</td>
                <td>${conference.status || ''}</td>
                <td>${conference.speakers.map(speaker => speaker.name + ' ' + speaker.last_name).join(', ')}</td>
                <td><button class="btn btn-warning editConferenceBtn" data-conference-id="${conference.id}">Edit</button></td>
                <td><button class="btn btn-danger deleteConferenceBtn" data-conference-id="${conference.id}">Delete</button></td>
                <td><button class="btn btn-success addConferenceAgendaBtn" data-conference-id="${conference.id}">Add Agenda</button></td>
            </tr>`;
            tableBody.append(row);
        });
    }

    $(document).on('click', '.deleteConferenceBtn', function() {
        let conferenceId = $(this).data('conference-id');
        Swal.fire({
            title: "Are you sure?",
            text: "Do you really want to delete this conference?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "Cancel"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `${window.location.origin}/api/deleteConference/${conferenceId}`,
                    type: 'POST',
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            text: response.message
                        });
                        refreshConferences();
                    },
                    error: function(err) {
                        Swal.fire({
                            icon: 'error',
                            text: 'Error deleting conference!'
                        });
                    }
                });
            }
        });
    });


    $(document).on('click', '.editConferenceBtn', function() {
        let conferenceId = $(this).data('conference-id');
        $.ajax({
            url: `${window.location.origin}/api/getConference/${conferenceId}`,
            type: 'GET',
            success: function(response) {
                let conference = response.data;
                $('#editConferenceId').val(conference.id);
                $('#editConferenceTitle').val(conference.title);
                $('#editConferenceTheme').val(conference.theme);
                $('#editConferenceDescription').val(conference.description);
                $('#editConferenceObjective').val(conference.objective);
                $('#editConferenceStartDate').val(conference.start_date);
                $('#editConferenceEndDate').val(conference.end_date);
                $('#editConferenceLocation').val(conference.location);
                $('#editConferenceStatus').val(conference.status);

                populateSpeakersSelect('#editConferenceSpeakers');

                setTimeout(function() {
                    $('#editConferenceSpeakers').val(conference.speakers.map(s => s.id));
                }, 500);

                $('#editConferenceModal').modal('show');
            },
            error: function(err) {
                console.log(err);
                Swal.fire({
                    icon: 'error',
                    text: 'Error fetching conference data!'
                });
            }
        });
    });
    $('#editConferenceForm').on('submit', function(e) {
        e.preventDefault();
        let conferenceId = $('#editConferenceId').val();
        let formData = $(this).serialize();
        $.ajax({
            url: `${window.location.origin}/api/updateConference/${conferenceId}`,
            type: 'POST',
            data: formData,
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    text: response.message,
                });
                $('#editConferenceModal').modal('hide');
                refreshConferences();
            },
            error: function(err) {
                console.log(err);
                Swal.fire({
                    icon: 'error',
                    text: 'Error updating conference!',
                });
            }
        });
    });
    $(document).on('click', '.addConferenceAgendaBtn', function() {
        let conferenceId = $(this).data('conference-id');
        $('#currentConferenceId').val(conferenceId);
        $('#conferenceAgendaSections').empty();
        $.ajax({
            url: `${window.location.origin}/api/getConference/${conferenceId}`,
            type: 'GET',
            success: function(response) {
                let conference = response.data;
                let conferenceDays = conference.days;
                let conferenceSpeakers = conference.speakers;
                let counter = 0;
                addConferenceAgendaSection(counter, conferenceDays, conferenceSpeakers);
                $('#addConferenceAgendaModal').modal('show');
                $('#addAgendaSectionBtn').off('click').on('click', function() {
                    counter++;
                    addConferenceAgendaSection(counter, conferenceDays, conferenceSpeakers);
                });
            },
            error: function(err) {
                console.log(err);
            }
        });
    });

    function addConferenceAgendaSection(counter, conferenceDays, conferenceSpeakers) {
        let sectionHtml = `
        <div class="agenda-section" data-section-index="${counter}">
            <div class="mb-3">
                <label for="agenda_day-${counter}" class="form-label">Conference Day</label>
                <select name="conference_day_id[]" class="form-select" id="agenda_day-${counter}" required>
                    <option value="" disabled selected>Select Day</option>
                    ${conferenceDays.map(day => `<option value="${day.id}">${day.date}</option>`).join('')}
                </select>
            </div>
            <div class="mb-3">
                <label for="agenda_title-${counter}" class="form-label">Agenda Title</label>
                <input type="text" name="title[]" class="form-control" id="agenda_title-${counter}" required>
            </div>
            <div class="mb-3">
                <label for="agenda_content-${counter}" class="form-label">Content</label>
                <textarea name="content[]" class="form-control" id="agenda_content-${counter}" rows="2"></textarea>
            </div>
            <div class="mb-3">
                <label for="agenda_time-${counter}" class="form-label">Time</label>
                <input type="time" name="time[]" class="form-control" id="agenda_time-${counter}" required>
            </div>
            <div class="mb-3">
                <label for="agenda_speaker-${counter}" class="form-label">Speaker</label>
                <select name="speaker_id[]" class="form-select" id="agenda_speaker-${counter}">
                    <option value="" selected>No Speaker</option>
                    ${conferenceSpeakers.map(speaker => `<option value="${speaker.id}">${speaker.name} ${speaker.last_name}</option>`).join('')}
                </select>
            </div>
            <button type="button" class="btn btn-danger removeAgendaSection" data-section-index="${counter}">Remove Section</button>
            <hr>
        </div>
        `;
        $('#conferenceAgendaSections').append(sectionHtml);
        $(document).off('click', '.removeAgendaSection').on('click', '.removeAgendaSection', function() {
            let index = $(this).data('section-index');
            $(`.agenda-section[data-section-index="${index}"]`).remove();
        });
    }

    $('#addConferenceAgendaForm').on('submit', function(e) {
        e.preventDefault();
        let formDataArray = $(this).serializeArray();
        let conferenceId = $('#currentConferenceId').val();
        $.ajax({
            url: `${window.location.origin}/api/saveConferenceAgenda`,
            type: 'POST',
            data: formDataArray,
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    text: response.message,
                });
                $('#addConferenceAgendaModal').modal('hide');
            },
            error: function(err) {
                console.log(err);
                Swal.fire({
                    icon: 'error',
                    text: 'Error saving agenda items!',
                });
            }
        });
    });
    refreshConferences();
</script>
@endsection