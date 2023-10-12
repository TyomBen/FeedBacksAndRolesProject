<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFeedBackRequest;
use App\Jobs\FeedbackUserJob;
use App\Models\Feedback;
use App\Models\Role;
use App\Models\User;
class FeedBackSendController extends Controller
{
    public function index(CreateFeedBackRequest $request)
    {
        $filePath = $request->file->store('uploads', 'public');
        $data = array_merge($request->validated(),
        ['file' => $filePath], ['admin_mark' => 'No ansed'],
        ['user_id' => auth()->user()->id]);
        Feedback::create($data);
        $adminRole = Role::where('role', 'admin')->first();
        $admin = User::select('email')
            ->where('role_id', $adminRole->id)
            ->first();
        $id = auth()->user()->id;
        $user = User::find($id);
        FeedbackUserJob::dispatch($user, $admin->email);
        return 'Email scheduled Successfully';
    }
}
