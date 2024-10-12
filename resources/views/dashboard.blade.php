@extends('layouts.app')

@section('content')
@if (session('error'))
<script>
    Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "{{ session('error') }}",
    });
</script>
@endif

@endsection