<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class ResponseStatusCheckController extends Controller
{
    public function index (Feedback $feedback, Request $request)
    {
        if (isset($request->checkBox) && $request->checkBox === 'on'){
            $feedback->update([
                'admin_mark' => 'Ansed'
            ]);
        }
        return redirect()->back();
    }
}
