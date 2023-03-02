<?php

namespace App\Http\Livewire\Admin;

use App\Models\MasterSetting;
use Livewire\Component;

class ContactScreen extends Component
{
    private $contactDetails;
    public $contact_number;
    public $contact_number_swahili;
    public $email_address;
    public $website;
    public $facebook_link;
    public $instagram_link;
    public $twitter_link;
    public $help_email;
    public $rules = [
        'contact_number' => 'required|numeric|gte:12',
        'contact_number_swahili' => 'required|numeric|gte:12',
        'email_address' => 'required|email|max:128',
        'website' => 'required|max:128|active_url',
        'facebook_link' => 'required|max:128|active_url',
        'instagram_link' => 'required|max:128|active_url',
        'twitter_link' => 'required|max:128|active_url',
        'help_email' => 'required|email|max:128',
    ];

    public function render()
    {
        $this->getContactScreenDetails();
        if (!empty($this->contactDetails)) {
            foreach ($this->contactDetails as $contactDetail) {
                switch ($contactDetail->key) {
                    case 'contact_number':
                        $this->contact_number = $contactDetail->value;
                        break;

                    case 'contact_number_swahili':
                        $this->contact_number_swahili = $contactDetail->value;
                        break;

                    case 'email_address':
                        $this->email_address = $contactDetail->value;
                        break;

                    case 'website':
                        $this->website = $contactDetail->value;
                        break;

                    case 'facebook_link':
                        $this->facebook_link = $contactDetail->value;
                        break;

                    case 'instagram_link':
                        $this->instagram_link = $contactDetail->value;
                        break;

                    case 'twitter_link':
                        $this->twitter_link = $contactDetail->value;
                        break;

                    case 'help_email':
                        $this->help_email = $contactDetail->value;
                        break;
                }
            }
        }
        return view('livewire.admin.contact-screen', [
            'contactDetails' => $this->contactDetails
        ]);
    }

    public function getContactScreenDetails()
    {
        $this->contactDetails = MasterSetting::displayType('contact_screen')->get();
    }

    public function save()
    {
        $validated = $this->validate();

        foreach ($validated as $key => $value) {
            $setting = MasterSetting::where('key', $key)->first();
            if (!empty($setting)) {
                $setting->update([
                    'value' => $value
                ]);
            }
        }
        $this->notify('Setting saved successfully.', 'Success');
    }
}
