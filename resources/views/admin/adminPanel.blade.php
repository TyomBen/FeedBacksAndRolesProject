@extends('layouts.app')

@section('content')
    <h2 class="mt-5">Applications</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Subject</th>
                <th>Message</th>
                <th>File</th>
                <th>Created_at</th>
                <th> Response Status </th>
                <th> Note </th>
            </tr>
        </thead>
        <tbody>
            @auth
                @foreach ($feedbacks as $feedback)
                    <tr>
                        <td> {{ $feedback->id }} </td>
                        <td> {{ $feedback->name }} </td>
                        <td> {{ $feedback->subject }} </td>
                        <td> {{ $feedback->message }} </td>
                        <td><a href="{{ asset('/storage/' . $feedback->file) }}" download> {{ $feedback->file }}</a> </td>
                        <td> {{ $feedback->created_at }} </td>
                        <form class="form-check-input" action="{{ route('update', ['feedback' => $feedback->id]) }}"
                            method="POST">
                            @csrf
                            @method('patch')
                            <td> {{ $feedback->admin_mark }} </td>
                            @if ($feedback->admin_mark === 'No ansed')
                                <td> <input type='checkbox' name="checkBox"> <input type="submit" class="btn btn-primary" /> </td>
                            @endif
                        </form>
                    </tr>
                @endforeach
            @endauth
        </tbody>

    </table>
    {{ $feedbacks->links('pagination::bootstrap-4') }}
@endsection
