@extends('layouts.app')
@section('content')
<div class="container">
    <div id="blogs" class="row d-flex ">



    </div>
</div>
<script>
    $(document).ready(function() {
        function shortenText(text, length) {
            if (text.length > length) {
                let shortened = text.substring(0, length) + '... ';
                let fullText = text;
                let seeMoreButton = $('<button class="see-more-btn btn btn-info">See whole text</button>');

                let contentContainer = $('<span>').append(shortened, seeMoreButton).data({
                    'short-text': shortened,
                    'full-text': fullText
                });

                return contentContainer;
            } else {
                return $('<span>').text(text);
            }
        }
        $.ajax({
            url: 'api/getBlogs',
            type: 'GET',
            success: function(response) {
                let blogsDiv = $('#blogs');
                let blogs = response.data;
                blogs.forEach(blog => {
                    let singleBlog = $(`
                 <div class="col-md-6 col-sm-12 mb-4 d-flex justify-content-center">
                    <div class="card w-100">
                    <img src="/${blog.image}" class="card-img-top img-fluid" alt="Blog Image" style="height: 300px; object-fit: cover;">
                    <div class="card-body">
                    <h5 class="card-title">${blog.title}</h5>
                    <p class="card-text mainContent"></p>
                   <a href="/singleBlog/${blog.id}" class="btn btn-light">See more</a>
                    </div>
                    </div>
                </div>
                `);
                    let shortenedTextElement = shortenText(blog.main_content, 200);
                    singleBlog.find('.mainContent').append(shortenedTextElement);
                    blogsDiv.append(singleBlog);
                });
                blogsDiv.on('click', '.see-more-btn', function() {
                    let parent = $(this).parent();
                    let fullText = parent.data('full-text');
                    let shortText = parent.data('short-text');
                    if ($(this).text() === 'See whole text') {
                        parent.html(fullText).append($('<button stul class="see-more-btn btn btn-info">Hide text</button>'));
                    } else {
                        parent.html(shortText).append($('<button class="see-more-btn btn btn-info">See whole text</button>'));
                    }
                });
            },
            error: function(err) {
                console.log(err);
            }
        });
    });
</script>
@endsection