@foreach ($user->feedback as $feedback)
    ID: {{ $feedback->id }}
    Name: {{ $feedback->name }}
    Email: {{ $user->email }}
    Subject: {{ $feedback->subject }}
    Message: {{ $feedback->message }}
    Created_at: {{ $feedback->created_at }}
@endforeach
