<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Feedback;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::paginate(5);
        return view('admin.feedback.index')->with('feedbacks', $feedbacks);
    }

    public function show(Feedback $feedback)
    {
        return view('admin.feedback.show')->with('feedback', $feedback);
    }

    public function destroy(Feedback $feedback, Request $request)
    {
        $feedback->delete();

        $referer = $request->headers->get('referer'); // for pagination
        return redirect($referer)->with('msg', ['type' => 'success', 'text' => 'Feedback has deleted.']);
    }
}
