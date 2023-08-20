<?php

namespace App\Http\Livewire;

use App\Http\Mail\ContactFormMailable;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $phone;
    public $message;
    public $successMessage;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'message' => 'required|min:5',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, $this->rules);
    }


    public function submitForm()
    {
        $contact = $this->validate($this->rules);

        $contact['name'] = $this->name;
        $contact['email'] = $this->email;
        $contact['phone'] = $this->phone;
        $contact['message'] = $this->message;

        sleep(1);
        Mail::to('andre@andre.com')->send(new ContactFormMailable($contact));

        $this->resetForm();

        $this->successMessage = 'We received your message successfully and will get back to you shortly!';
    }

    private function resetForm()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->message = '';
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
