<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use League\Flysystem\Exception;
use Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
    public function redirectMail()
    {

        return view('admin.pages.mail');
    }

    public function sendMail(Request $request)
    {
        $emailId = $request->mail_to;
        $data['subject'] = $request->subject;
        $data['mail'] = $request->mail;


//        if ($result) {
//
//        }

//
        try {
            Mail::send('admin.mail.mail', $data, function ($mail) use ($emailId, $data) {
                $mail->from('santosh@acd.edu.np');
                $mail->to($emailId)->subject($data['subject']);
            });

            return redirect()->route('users')->with('success', 'Email Sent SuccessFully');

        } catch (\Exception $e) {
            return redirect()->route('users')->with('error', $e->getMessage());
        }
    }
}
