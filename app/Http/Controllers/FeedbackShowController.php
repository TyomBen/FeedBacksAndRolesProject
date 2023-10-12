<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackShowController extends Controller
{
    public function index ()
    {
        $feedbacks = Feedback::paginate(10);
        return view ('admin.adminPanel', compact ('feedbacks'));
    }
}
