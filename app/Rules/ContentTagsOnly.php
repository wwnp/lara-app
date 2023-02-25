<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ContentTagsOnly implements Rule
{
    protected $allowedTags = ['h2', 'b', 'i', 'u', 'a'];

    public function passes($attribute, $value)
    {
        // Remove all tags except allowed ones
        $filtered = strip_tags($value, '<' . implode('><', $this->allowedTags) . '>');

        // Check if the filtered string is equal to the original
        return $filtered === $value;
    }

    public function message()
    {
        return 'The :attribute field may only contain plain text and the following HTML tags: ' . implode(', ', $this->allowedTags);
    }
    // const TAGS = [
    //     'h2' => '/^<h2>(\w{1,10})<\/h2>$/',
    //     'text' => '/(.)/',
    // ];

    // public function __construct()
    // {
    //     //
    // }
    // public function passes($attribute, $value)
    // {
    //     // Use a regular expression to check if the value contains only an <h1> tag
    //     foreach (self::TAGS as $key => $pattern) {
    //         // dd(preg_match($pattern, $value));
    //         return preg_match($pattern, $value);
    //     }
    // }

    // /**
    //  * Get the validation error message.
    //  *
    //  * @return string
    //  */
    // public function message()
    // {
    //     return 'The :attribute have problems with validation. Provide a valid tags';
    // }
}
