<?php

namespace App\Rules;

use GuzzleHttp\Client;
use Illuminate\Contracts\Validation\Rule;

class RecaptchaRule implements Rule
{
    public function passes($attribute, $value)
    {
        $client = new Client();

        $response = $client->post('https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret' => config('services.recaptcha.secret_key'),
                'response' => $value,
            ],
        ]);
        dd($response);
        $body = json_decode((string) $response->getBody());

        return $body->success;
    }

    public function message()
    {
        return 'The :attribute field is invaasdasdlid.';
    }
}
