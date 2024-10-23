@extends('layouts.app')
@section('content')
<input type="hidden" id="userId" value="{{ Auth::id()}}"></div>
<div class="container">

    <div class="row d-flex justify-content-between users">

    </div>
</div>

<script>
    $(document).ready(function() {
        let currentUserId = $('#userId').val();
        console.log(currentUserId)
        $.ajax({
            url: 'http://127.0.0.1:8000/api/allUsers',
            type: 'get',
            success: function(response) {
                let users = response.data;
                users.forEach(user => {
                    let title;
                    user.title ? title = user.title : title = '';

                    if (user.role_id != 1 && user.id != currentUserId) {
                        let userCard = `
                     <div class="col-md-3 col-sm-6 p-0 mb-4 p-2 userCard">
                    <div class="card h-100">
                    <img src="${user.img_path}" class="card-img-top img-fluid" alt="user Image" style="height: 200px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                    <h5 class="card-title">${user.name} ${user.surname}</h5>
                    <p class="card-text">${title}</p>
                    <p class="card-text">If you want to see the user's full profile, click below</p>
                    <div class="mt-auto">
        <a href="/user/${user.id}" class="userBtn btn btn-primary" target="_blank">Go to profile</a>
      </div>
    </div>
  </div>
</div>
`
                        $('.users').append(userCard)
                    }

                });
            },
            error: function(err) {
                console.log(err)
            }
        })
    })
</script>
@endsection