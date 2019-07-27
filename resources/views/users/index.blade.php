@extends('layouts.app')

@section('content')
    @component('components.card')
        @slot('header')
            Users
            <a href="{{ route('users.create') }}" class="btn btn-primary pull-right">New user</a>
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
                <th scope="col">actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $index => $user)
                <tr>
                  <th scope="row">{{ $index + 1 }}</th>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->status == 0 ? 'Active' : 'Inactive' }}</td>
                  <td>{{ $user->created_at }}</td>
                  <td>
                    <div class="p-1"><a href="{{ route('users.services.index', ['id' => $user->id]) }}" class="btn btn-primary">Services</a></div>
                    <div class="p-1"><a href="{{ route('users.show', ['id' => $user->id]) }}" class="btn btn-info">View</a></div>
                    <div class="p-1"><a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-warning">Edit</a></div>
                    <div class="p-1">
                        <form onsubmit="return confirm('Are you sure yo want to delete this item?');"  method="POST" action="{{ route('users.destroy', ['id' => $user->id]) }}">
                            @csrf
                            @method('DELETE')
                          <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                    </div>
                    </td>
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