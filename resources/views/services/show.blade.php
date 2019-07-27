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
            <h5>Status</h5>
            <span>{{ $data->status == 0 ? 'Active' : 'Inactive' }}</span>
          </p>

          <p>
            <h5>Created at</h5>
            <span>{{ $data->created_at }}</span>
          </p>
        @endslot
    @endcomponent
@endsection