@extends('layouts.app')

@section('content')
@component('components.card')
@slot('header')
Services
@endslot

@slot('body')
<p>
  <h5>Name</h5>
  <span>{{ $data->name }}</span>
</p>
<p>
  <h5>Email</h5>
  <span>{{ $data->email}}</span>
</p>
<p>
  <p>
    <h5>Age</h5>
    <span>{{ $data->age}}</span>
  </p>
  <p>
    <h5>gender</h5>
    <span>{{ $data->gender == 0 ? 'Male' : 'Female' }}</span>
  </p>
  <p>

    <h5>Status</h5>
    <span>{{ $data->status == 0 ? 'Active' : 'Inactive' }}</span>
  </p>
  <p>
    <h5>Created at</h5>
    <span>{{ $data->created_at }}</span>
  </p>
  <div class="p-1"><a href="{{ route('users.services.index', ['id' => $data->id]) }}"
      class="btn btn-primary">Services</a></div>
  @endslot
  @endcomponent
  @endsection