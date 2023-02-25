<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Mews\Purifier\Facades\Purifier;
use HTMLPurifier;
use HTMLPurifier_Config;

class CleanHtml implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $config = HTMLPurifier_Config::createDefault();
        $config->set('HTML.Allowed', 'div[class|id],p,b,strong,i,em,ul,ol,li,br,a,code[class],pre');
        $purifier = new HTMLPurifier($config);
        $cleanHtml = $purifier->purify($value);
        return $value === $cleanHtml;

        // $cleaned = Purifier::clean($value, ['HTML.Allowed' => 'div.code']);
        // return $value === $cleaned;
    }

    public function message()
    {
        return 'The :attribute field contains invalid HTML.';
    }
}
