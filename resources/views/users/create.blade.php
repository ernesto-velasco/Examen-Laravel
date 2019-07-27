@extends('layouts.app')

@section('content')
    @component('components.card')
        @slot('header')
            Users
        @endslot

        @slot('body')
            @includeIf('users.form', ['form_route' => route('users.store')])
        @endslot
    @endcomponent
@endsection