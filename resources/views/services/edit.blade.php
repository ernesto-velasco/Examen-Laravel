@extends('layouts.app')

@section('content')
    @component('components.card')
        @slot('header')
            Services
        @endslot

        @slot('body')
            @includeIf('services.form', ['method' => 'patch', 'form_route' => route('services.update', ['id' => $data->id])])
        @endslot
    @endcomponent
@endsection