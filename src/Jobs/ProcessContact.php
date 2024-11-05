<?php 
namespace twitesoft\Contact\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use twitesoft\Contact\Mail\ContactMailable;
use Illuminate\Support\Facades\Mail;
use twitesoft\Contact\Notifications\ContactNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Log;
use twitesoft\Contact\Models\Contact;

class ProcessContact implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    private $data;

    /**
     * Create a new job instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Mail::to(config('contact.send_email_to'))->send(new ContactMailable($this->data));
        Log::info("data");
        Log::info($this->data);

        $contact = Contact::create($this->data);
  
        $contact->notify(new ContactNotification($contact));
    }
}