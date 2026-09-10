<?php

namespace App\Livewire;

use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ContactForm extends Component
{
    public string $name    = '';
    public string $email   = '';
    public string $topic   = '';
    public string $body    = '';
    public bool   $sent    = false;
    public string $sentName = '';

    public function send(): void
    {
        $this->validate(
            [
                'name'  => ['required', 'string', 'max:120'],
                'email' => ['required', 'email', 'max:255'],
                'topic' => ['required', 'in:admissions,partnerships,general,other'],
                'body'  => ['required', 'string', 'min:10', 'max:2000'],
            ],
            [
                'name.required'  => 'Full name is required.',
                'email.required' => 'Email is required.',
                'email.email'    => 'Enter a valid email address.',
                'topic.required' => 'Please select a topic.',
                'body.required'  => 'Please enter your message.',
                'body.min'       => 'Your message must be at least 10 characters.',
            ]
        );

        Mail::to('hello@exam.com')->send(new ContactMail(
            senderName:  $this->name,
            senderEmail: $this->email,
            topic:       $this->topic,
            body:        $this->body,
        ));

        $this->sentName = $this->name;
        $this->reset(['name', 'email', 'topic', 'body']);
        $this->sent = true;
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
