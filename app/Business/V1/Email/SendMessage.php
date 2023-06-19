<?php

namespace App\Business\V1\Email;

use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class SendMessage {

    private $fields;

    public function store(){
        $this->setFields();
        $this->sendEmail();
    }

    public function sendEmail(){
        //dd(new SendEmail($this->fields['content_message'], $this->fields['subject_message']));
        Mail::to($this->fields['to_message'], $this->fields['to_name'])->send(new SendEmail([
            'fromName' => 'O Grande Programador',
            'fromEmail' => 'api_onfly@gmail.com',
            'subject' => $this->fields['subject_message'],
            'message' => $this->fields['content_message']
        ]));
    }

    private function setFields(){
        $this->fields['to_message'] = Auth::guard('api')->user()->email;
        $this->fields['to_name'] = Auth::guard('api')->user()->name;
        $this->fields['subject_message'] = 'Despesa Cadastrada!';
        $this->fields['content_message'] = 'A despesa foi cadastrada com sucesso.';
    }


}