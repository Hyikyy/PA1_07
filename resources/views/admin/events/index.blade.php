@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Events</h2>
        @foreach ($events as $event)
        <p>{{ $event->title }}</p>
    @endforeach
        <a href="{{ route('admin.events.create') }}" class="btn btn-primary mb-3">Create New Event</a>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td>{{ $event->title }}</td>
                        <td>{{ $event->date }}</td>
                        <td>
                            <a href="{{ route('admin.events.show', $event->id) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
