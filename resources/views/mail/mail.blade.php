@foreach ($user->feedback as $feedback)
    Name: {{ $feedback->name }}
    Email: {{ $user->email }}
    Subject: {{ $feedback->subject }}
    Message: {{ $feedback->message }}
    Created_at: {{ $feedback->created_at }}
@endforeach
