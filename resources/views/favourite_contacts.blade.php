@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('includes.messages')
                @include('includes.menu')
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <th scope="row">{{ $contact->id }}</th>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            @if($contact->isLikedByUser(Auth::user()))
                                <td>
                                    <form action="{{ route('favourite_contacts.destroy', $contact->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger btn-sm btn-block">Remove from favourites</button>
                                    </form>
                                </td>
                            @else
                                <td>
                                    <form action="{{ route('favourite_contacts.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="contact_id" value="{{ $contact->id }}">
                                        <button type="submit" class="btn btn-outline-primary btn-sm btn-block">Add to favourites</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
