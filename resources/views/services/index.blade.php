@extends('layouts.app')

@section('content')
    @component('components.card')
        @slot('header')
            Services
            @if (Auth::user()->rol == 2)
              <a href="{{ route('services.create') }}" class="btn btn-primary pull-right">New service</a>
            @endif
            
        @endslot

        @slot('body')
        @if (isset($data) && !empty($data) && count($data) > 0)
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">status</th>
                <th scope="col">created at</th>
                @if (Auth::user()->rol == 2)
                <th scope="col">actions</th>
                @endif
                
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $index => $service)
                <tr>
                  <th scope="row">{{ $index + 1 }}</th>
                  <td>{{ $service->name }}</td>
                  <td>{{ $service->status == 0 ? 'Active' : 'Inactive' }}</td>
                  <td>{{ $service->created_at }}</td>
                  @if (Auth::user()->rol == 2)
                <td>
                    <div class="p-1"><a href="{{ route('services.show', ['id' => $service->id]) }}" class="btn btn-info">View</a></div>
                    <div class="p-1"><a href="{{ route('services.edit', ['id' => $service->id]) }}" class="btn btn-warning">Edit</a></div>
                    <div class="p-1">
                        <form onsubmit="return confirm('Are you sure yo want to delete this item?');"  method="POST" action="{{ route('services.destroy', ['id' => $service->id]) }}">
                            @csrf
                            @method('DELETE')
                          <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                    </div>
                    </td>
                @endif
                  
                </tr>
              @endforeach
              
            </tbody>
          </table>
          @else
          <span>No data to show yet.</span>
        @endif
        @endslot
    @endcomponent
@endsection