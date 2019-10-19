@extends('admin.layouts')

@section('content')
    <h1>My Account</h1>
    <p>{{ $user->first_name }}</p>
@endsection
