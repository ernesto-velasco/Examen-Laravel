@extends('layouts.app')

@section('content')
    @component('components.card')
        @slot('header')
            Users
        @endslot

        @slot('body')
            @includeIf('users.form', ['method' => 'patch', 'form_route' => route('users.update', ['id' => $data->id])])
        @endslot
    @endcomponent
@endsection