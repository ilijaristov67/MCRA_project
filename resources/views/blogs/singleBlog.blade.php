@extends('layouts.app')
@section('content')
<div id="user-data"
    data-user-id="{{ Auth::check() ? Auth::id() : 'null' }}"
    data-role-id="{{ Auth::check() ? Auth::user()->role_id : 'null' }}">
</div>
<div class="container">
    <div id="blog" class=" rounded-3 p-3 border">
        <h1 id="mainTitle" class="mb-2"></h1>
        <div class="row mb-2">
            <div class="col-md-6"><img id="mainImage" src="" alt="Blog Image" class="img-fluid" style="height: 300px; object-fit: cover;"></div>
            <div class="col-md-6 p-3">
                <p class="fst-italic text-muted" id="createdBy"></p>
                <p class="fst-italic text-muted" id="createdOn"></p>
                <div id="likeSection" class="mb-3">
                    @if(!Auth::check())
                    <button disabled id="likeButton" class="btn btn-primary"></i></button>
                    @else
                    <button id="likeButton" class="btn btn-primary"></i></button>
                    @endif
                    <span id="likeCount">0</span> Likes
                </div>
            </div>
        </div>
        <p id="mainDescription">
        </p>
        <form class="mt-2" id="commentForm">
            <input id="userId" type="hidden" value="{{ Auth::id() }}">
            <input id="blogId" type="hidden">
            <label class="form-label fw-bold" for="">Leave a comment</label>
            <textarea class="form-control" name="comment" id="comment" placeholder="Leave a comment"></textarea>
            <div class="d-flex justify-content-end mt-2">
                <button type="submit" class="btn btn-primary">Post Comment</button>
            </div>
        </form>
        <div class="comments">
            <h3>Comments:</h3>
        </div>
    </div>
</div>
<div class="container mt-3">
    <h2 class="mb-2">Reccomneded blogs based on category:</h2>
    <div id="recommended" class="recommended d-flex">

    </div>
</div>
<div class="modal fade" id="editCommentModal" tabindex="-1" aria-labelledby="editCommentLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCommentLabel">Edit Comment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editCommentForm">
                    <input type="hidden" name="commentId">
                    <div class="mb-3">
                        <label for="editComment" class="form-label">Edit your comment</label>
                        <textarea class="form-control" name="editComment" id="editComment" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Save changes</button>
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
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let pathArray = window.location.pathname.split('/');
        let blogId = pathArray[pathArray.length - 1];
        let mainTitle = $('#mainTitle');
        let mainSection = $('#mainDescription');
        let mainImage = $('#mainImage');
        let createdBy = $('#createdBy');
        let createdOn = $('#createdOn');
        let blogDiv = $('#blog');
        let likeButton = $('#likeButton');
        let likeCount = $('#likeCount');
        let recommended = $('#recommended');
        let commentForm = $('#commentForm');
        let commentBlogId = $('#blogId');
        commentBlogId.val(blogId);
        let userData = $('#user-data');
        let userId = userData.data('user-id');
        let userRoleId = userData.data('role-id');


        function showComments(comments, container) {
            comments.forEach(comment => {
                let dateCreated = comment.created_at.split('T')[0];
                let timeCreated = comment.created_at.split('T')[1].split('.')[0];
                let commentHtml = `
        <div class="comment-section mb-3">
            <div class="comment-row row border p-2" data-row-id="${comment.id}">
                <div class="comment-text col-12">
                    <div class="d-flex justify-content-between">
                        <p><strong>${comment.user.name} ${comment.user.surname}:</strong> ${comment.comment}</p>
                        <p class="fw-bold">Created on: ${dateCreated}, at: ${timeCreated}</p>
                    </div>
                    <!-- Like button for comments -->
                    <button class="btn btn-sm btn-primary like-comment" data-comment-id="${comment.id}">
                        <i class="fa-solid fa-thumbs-up"></i>
                    </button>
                    <span class="like-count" id="likeCount-${comment.id}">${comment.likes_count || 0}</span> Likes
                </div>
                <div>
`;
                if (userId !== null && comment.user_id != userId) {
                    commentHtml += `<div> <button class="btn btn-sm btn-danger report-button" data-id="${comment.id}" data-type="App\\Models\\Comment">Report</button></div>`
                }


                if (comment.user_id === userId || userRoleId === 1) {
                    commentHtml += `
                <button type="submit" class="btn btn-sm btn-warning mt-2 editBtn" data-comment-id="${comment.id}">Edit</button>
                <button type="submit" class="btn btn-sm btn-danger mt-2 deleteBtn" data-comment-id="${comment.id}">Delete</button>`;
                }


                commentHtml += `</div></div>
        <div class="reply-section p-2">
            <form class="replyForm">
                <input type="hidden" id="commentId" value="${comment.id}">
                <input type="hidden" id="userID" value="${userId}">
                <textarea class="form-control" name="reply" id="reply" placeholder="Write a reply..."></textarea>
                <button type="submit" class="btn btn-sm btn-primary mt-2 commentSubmit">Reply</button>
            </form>
        </div>`;

                container.append(commentHtml);
                if (comment.replies && comment.replies.length > 0) {
                    comment.replies.forEach(reply => {
                        let commentDiv = container.find(`div[data-row-id="${reply.parent_id}"]`);
                        if (commentDiv.length > 0) {
                            let dateCreated = reply.created_at.split('T')[0];
                            let timeCreated = reply.created_at.split('T')[1].split('.')[0];
                            let replyHtml = `
                        <div class="bg-light reply-row border p-2 mt-2 w-50" data-reply-id="${reply.id}">
                            <div class="d-flex justify-content-between">
                                <p><strong>${reply.user.name} ${reply.user.surname}:</strong> ${reply.comment}</p>
                                <p class="fw-bold">Created on: ${dateCreated}, at: ${timeCreated}</p>
                            </div>
                            <!-- Like button for replies, same as for comments -->
                            <button class="btn btn-sm btn-primary like-comment" data-comment-id="${reply.id}">
                                <i class="fa-solid fa-thumbs-up"></i>
                            </button>
                            <span class="like-count" id="likeCount-${reply.id}">${reply.likes_count || 0}</span> Likes
                        </div>
`;
                            if (userId !== null && reply.user_id != userId) {
                                replyHtml += `<div>  <button class="btn btn-sm btn-danger report-button" data-id="${reply.id}" data-type="App\\Models\\Comment">Report</button></div>`
                            }
                            if (reply.user_id === userId || userRoleId === 1) {
                                replyHtml += `<div>
                            <button type="submit" class="btn btn-sm btn-warning mt-2 editBtn" data-comment-id="${reply.id}">Edit</button>
                            <button type="submit" class="btn btn-sm btn-danger mt-2 deleteBtn" data-comment-id="${reply.id}">Delete</button>
                        </div>`;
                            }
                            commentDiv.append(replyHtml);



                        }
                    });
                }


            });
            $(document).on('click', '.editBtn', function() {
                let commentId = $(this).data('comment-id');
                $('#editCommentModal').modal('show')
                $.ajax({
                    url: `http://127.0.0.1:8000/api/getComment/${commentId}`,
                    type: 'get',
                    success: function(response) {
                        console.log(response.data)

                        $('#editComment').val(response.data.comment)
                        $('#editCommentForm').off('submit').on('submit', function(e) {
                            e.preventDefault();
                            let formData = $(this).serialize();
                            $.ajax({
                                url: `http://127.0.0.1:8000/api/editComment/${commentId}`,
                                type: 'post',
                                data: formData,
                                success: function(response) {
                                    Swal.fire({
                                        icon: "success",
                                        title: "Comment edited",
                                        text: response.message,
                                    });
                                    $('#editComment').val('')
                                    $('#editCommentModal').modal('hide')
                                    getComments(blogId)
                                },
                                error: function(err) {
                                    console.log(err)
                                }
                            })
                        })
                    },
                    error: function(err) {
                        console.log(err)
                    }
                })
            });



            $(document).on('click', '.deleteBtn', function() {
                let commentId = $(this).data('comment-id');
                Swal.fire({
                    icon: 'question',
                    title: 'Are you sure you want to delete this comment?',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'No, cancel',
                    showCloseButton: true,
                    focusConfirm: false,
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: `http://127.0.0.1:8000/api/deleteComment/${commentId}`,
                            type: 'POST',
                            success: function(response) {
                                Swal.fire({
                                    icon: "success",
                                    title: "Comment deleted",
                                    text: response.message,
                                });
                                getComments(blogId)
                            },
                            error: function(err) {
                                console.log(err)
                            }
                        })
                    }
                })
            })
        }
        $(document).on('submit', '.replyForm', function(e) {
            e.preventDefault();
            let userId = $(this).find('#userID').val();
            let commentId = $(this).find('#commentId').val();
            let replyText = $(this).find('textarea[name="reply"]').val();
            $.ajax({
                url: 'http://127.0.0.1:8000/api/saveComment',
                type: 'POST',
                data: {
                    comment: replyText,
                    user_id: userId,
                    parent_id: commentId
                },
                success: function(response) {
                    getComments(commentId)
                },
                error: function(err) {
                    console.log(err)
                }
            })
        })

        function getComments($id) {
            $.ajax({
                url: `http://127.0.0.1:8000/api/getComments/${blogId}`,
                type: 'get',
                success: function(response) {
                    $('.comments').empty()
                    console.log(response.data)
                    showComments(response.data, $('.comments'))
                },
                error: function(err) {
                    console.log(err)
                }
            })
        }

        function loadCommentLikes(commentId) {
            $.ajax({
                url: `http://127.0.0.1:8000/api/getCommentLikes/${commentId}`,
                type: 'GET',
                success: function(response) {
                    let likeButton = $(`#likeButton-${commentId}`);
                    let likeCount = $(`#likeCount-${commentId}`);

                    likeCount.text(response.like_count);

                    if (response.user_liked) {
                        likeButton.html('<i class="fa-regular fa-thumbs-down"></i>');
                    } else {
                        likeButton.html('<i class="fa-solid fa-thumbs-up"></i>');
                    }
                },
                error: function(err) {
                    console.log("Error loading likes for comment", commentId, err);
                }
            });
        }

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

        function loadLikes() {
            $.ajax({
                url: `http://127.0.0.1:8000/api/getBlogLikes/${blogId}`,
                type: 'GET',
                success: function(response) {
                    likeCount.text(response.like_count);
                    if (response.user_liked) {
                        likeButton.html('<i class="fa-regular fa-thumbs-down"></i>');
                    } else {
                        likeButton.html('<i class="fa-solid fa-thumbs-up"></i>');
                    }
                }
            });
        }
        $.ajax({
            url: `http://127.0.0.1:8000/api/blogBody/${blogId}`,
            type: 'GET',
            success: function(response) {
                let subsections = response.data;
                subsections.forEach(subsection => {
                    let subTitle = $(`<h4> ${subsection.subtitle}</4>`)
                    let subContent = $(`<p> ${subsection.sub_content}</p>`)
                    $(subTitle).insertBefore('#commentForm');
                    $(subContent).insertBefore('#commentForm');
                })
            },
            error: function(err) {
                errorHandle(err)
            }
        })
        $.ajax({
            url: `http://127.0.0.1:8000/api/getBlog/${blogId}`,
            type: 'GET',
            success: function(response) {
                let blog = response.data
                let userId = response.data.user_id;
                mainTitle.text(blog.title)
                mainSection.text(blog.main_content)
                if (blog.image != null) {
                    mainImage.attr('src', `/${blog.image}`)
                } else {
                    mainImage.remove();
                }
                let dateCreated = blog.created_at.split('T')[0];
                let timeCreated = blog.created_at.split('T')[1].split('.')[0];
                createdOn.text(`Blog was created on: ${dateCreated} at ${timeCreated} o'clock`)
                $.ajax({
                    url: `http://127.0.0.1:8000/api/recomendedBlogs/${blog.category_id}`,
                    type: 'GET',
                    success: function(response) {
                        response.data.forEach(recommendedBlog => {
                            if (recommendedBlog.id != blog.id) {
                                let relatedBlog = $(`<div class="col-md-4 col-sm-12 mb-4 d-flex justify-content-center m-3">
                                     <div class="card w-100">
                                     <img src="/${recommendedBlog.image}" class="card-img-top img-fluid" alt="Blog Image" style="height: 300px; object-fit: cover;">
                                     <div class="card-body">
                                     <h5 class="card-title">${recommendedBlog.title}</h5>                              
                                     <p class="card-text mainContent"></p>
                                     <a href="/singleBlog/${recommendedBlog.id}" class="btn btn-light">See more</a>
                                     </div>
                                     </div>
                                     </div>`);
                                recommended.append(relatedBlog);
                            }
                        });
                    },
                    error: function(err) {
                        errorHandle(err);
                    }
                });

                $.ajax({
                    url: `http://127.0.0.1:8000/api/user/${userId}`,
                    type: 'get',
                    success: function(response) {
                        let currentUser = response.data
                        createdBy.text(`Blog was created by: ${currentUser.name} ${currentUser.surname}`)
                    },
                    error: function(err) {
                        errorHandle(err)
                    }
                })
            },
            error: function(err) {
                errorHandle(err)
            }
        })
        likeButton.click(function() {
            console.log(blogId)
            $.ajax({
                url: `http://127.0.0.1:8000/api/toggleLike`,
                type: 'POST',
                data: {
                    likeable_id: blogId,
                    likeable_type: 'App\\Models\\Blog',
                },
                success: function(response) {
                    loadLikes();
                    if (response.message) {
                        console.log(response.message);
                    } else {
                        console.log("Success response does not contain a message");
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
                        title: "Oops, must be logged in to like blogs...",
                        text: errorMessages,
                    });
                }

            });

        });
        loadLikes();
        commentForm.on('submit', function(e) {
            e.preventDefault()
            let userId = $('#userId').val();
            let blogIdValue = commentBlogId.val();
            let comment = $('#comment').val();
            $.ajax({
                url: 'http://127.0.0.1:8000/api/saveComment',
                type: 'POST',
                data: {
                    comment: comment,
                    user_id: userId,
                    blog_id: blogIdValue
                },
                success: function(response) {
                    getComments(blogId)
                    $('#comment').val('');
                    console.log(response)


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
            })

        })
        $(document).on('click', '.like-comment', function() {
            let commentId = $(this).data('comment-id');

            $.ajax({
                url: '/api/toggleLike',
                type: 'POST',
                data: {
                    likeable_type: 'App\\Models\\Comment',
                    likeable_id: commentId
                },
                success: function(response) {
                    loadCommentLikes(commentId)
                    $('#likeCount-' + commentId).text(response.like_count);


                },
                error: function(err) {
                    console.log(err)
                }
            });
        });
        getComments(blogId)

        $(document).on('click', '.report-button', function() {
            let reportableId = $(this).data('id');
            let reportableType = $(this).data('type');
            $('#reportable_id').val(reportableId);
            $('#reportable_type').val(reportableType);
            $('#reportModal').modal('show');
        });
    })

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
</script>
@endsection