@extends('layouts.app')

@section('content')
    @component('components.card')
        @slot('header')
            Services
        @endslot

        @slot('body')
            @includeIf('services.form', ['form_route' => route('services.store')])
        @endslot
    @endcomponent
@endsection
