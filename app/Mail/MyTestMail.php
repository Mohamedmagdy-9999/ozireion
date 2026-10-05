<?php
  
namespace App\Mail;
  
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
  
class MyTestMail extends Mailable
{
    use Queueable, SerializesModels;
  
    public $details;
  
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }
  
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
		
        if($this->details['attachment'])
        {
            // return $this->subject($this->details['title'])
            // ->view('emails.myTestMail')->attach(
            //     $this->details['attachment']->getRealPath(),
            //     [
            //         'as' =>  $this->details['attachment']->getClientOriginalName(),
            //         'mime' =>  $this->details['attachment']->getClientMimeType(),
            //     ]
            // );

            $mail =  $this->subject($this->details['title'])
            ->view('emails.myTestMail');

            foreach($this->details['attachment'] as $file)
            $mail->attach($file->getRealPath(), [
                'as' => $file->getClientOriginalName(), 
                'mime' => $file->getMimeType()
            ]);

           
        }else{
            return $this->subject($this->details['title'])
            ->view('emails.myTestMail');
        }
       
    }
}