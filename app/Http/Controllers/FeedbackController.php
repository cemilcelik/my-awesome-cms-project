<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Http\Requests\SendContactMessageRequest;
use App\Mail\ContactMessageSended;
use App\Feedback;

class FeedbackController extends Controller
{
    public function sendContactMessage(SendContactMessageRequest $request)
    {
        $feedback = new Feedback;
        $feedback->name_surname = $request->input('name_surname');
        $feedback->email = $request->input('email');
        $feedback->message = $request->input('message');

        // todo add exception, log etc.
        $feedback->save();

        // todo add exception, log etc.
        Mail::to(env('ADMIN_MAIL'))
            ->send(new ContactMessageSended($feedback));

        return redirect(route('contact'))->with('msg', ['type' => 'success', 'text' => trans('common.feedback.message_sent')]);
    }
}
