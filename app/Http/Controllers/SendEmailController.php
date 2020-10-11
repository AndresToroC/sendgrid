<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

use App\Group;

class SendEmailController extends Controller
{
    public function index(Group $group)
    {
        $group->load('contacts');

        $this->sendEmails($group->contacts, $group);

        return redirect()->back();
    }

    public function create(Group $group)
    {
        return view('emails.index', compact('group'));
    }

    public function store(Request $request, Group $group)
    {
        $rules = [
            'email' => 'email'
        ];

        $request->validate($rules);

        $this->sendEmails(['email' => $request->email], $group);

        return redirect()->back();
    }

    public function sendEmails($emails, $group) {
        $send_email = new \SendGrid\Mail\Mail(); 
        $send_email->setFrom(env('SENDGRID_FROM_EMAIL'), env('SENDGRID_FROM_USER'));
        $send_email->setSubject("Envio de email con sendgrid del grupo: ".$group->name);

        try {
            foreach ($emails as $key => $email) {
                $send_email->addTo($email->email, $email->name);
            }
        } catch (\Throwable $th) {
            $send_email->addTo($emails['email']);
        }
        
        $send_email->addContent("text/html", $group->theme);
        $sendgrid = new \SendGrid(env('SENDGRID_API_KEY'));
        
        $message = [];
        try {
            $response = $sendgrid->send($send_email);
            $message = ['type' => 'success', 'text' => 'Email enviado correctamente'];
        } catch (\Throwable $th) {
            $message = ['type' => 'danger', 'text' => 'Error al enviar el email'];
        }

        Session::flash('message', $message);
    }
}
