<?php

namespace App\Mail;

use App\Models\EmailCampaign;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MasterMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
    public $campaign;
    public function __construct($data, $campaignName, $campaign = null, $email=null)
    {
        $this->data = $data;
        if($campaignName) {
            $this->campaign = EmailCampaign::where('title',$campaignName)->first();
        } else {
            $this->campaign = $campaign;
        }
        if(!$this->campaign || !$this->campaign->template) {
            throw new \UnexpectedValueException('Error in config file!', 501);
        }

        if($email) {
            $this->data['unsubscribe_btn'] = '<a href="https://example.com/unsubscribe/' . base64_encode($email) . '">unsubscribe</a>';
        } else {
            $this->data['unsubscribe_btn'] = '<a href="https://example.com/">unsubscribe</a>';
        }
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $campaign = $this->campaign;
        $body = $campaign->template->description;

        $keys = $vals = [];
        foreach ($this->data as $k=>$v) {
            $keys[] = '{{' . $k . '}}';
            $vals[] = $v;
        }
        $body = str_replace($keys, $vals, $body);

        // $from_name = Settings::where('setting','From Name')->get()->first();
        // $from_email = Settings::where('setting','From Mail')->get()->first();

        return $this->view('emails.master')
            ->withBody($body)
            // ->from($from_email->value, $from_name->value)
            ->subject($campaign->template->subject);
    }
}
