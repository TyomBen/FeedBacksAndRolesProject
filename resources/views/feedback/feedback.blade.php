@extends('layouts.app')
@auth
    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-4"> </div>
                <div class="col-md-4">
                    <form action="{{ route('sendFeedback') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Your name:</label>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="name" name="name" class="form-control" id="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail:</label>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject:</label>
                            @error('subject')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="text" name="subject" class="form-control" id="subject" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <label for="file">File link:</label>
                            @error('file')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <input type="file" name="file" id="file">
                        </div>
                        <div class="form-group">
                            <label for="message">Message:</label>
                            @error('message')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <textarea class="form-control" name="message" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-info">Sent</button>
                    </form>
                </div>
                <div class="col-md-4"> </div>
            </div>
        </div>
    @endsection
@endauth
