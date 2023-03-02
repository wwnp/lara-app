<?php

namespace App\Http\Requests\Auth;

use App\Rules\PasswordEqualUserPasswordRule;
use App\Rules\PasswordPatternRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class ChangePasswordRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'current' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],

            // 'current_password' => ['required', new PasswordEqualUserPasswordRule],
            // 'password' => ['required', new PasswordPatternRule],
            // 'password_confirmation' => ['required', 'same:password'],
        ];
    }
}


// curl --request POST \
//   --url https://sandbox.api.mailtrap.io/api/send/inbox_id \
//   --header 'Api-Token: 16c0f9d0b7cd62dc3c7a4e8b7cdb29b4' \
//   --header 'Content-Type: application/json' \
//   --data '{
//   "to": [
//     {
//       "email": "john_doe@example.com",
//       "name": "John Doe"
//     }
//   ],
//   "cc": [
//     {
//       "email": "jane_doe@example.com",
//       "name": "Jane Doe"
//     }
//   ],
//   "bcc": [
//     {
//       "email": "james_doe@example.com",
//       "name": "Jim Doe"
//     }
//   ],
//   "from": {
//     "email": "sales@example.com",
//     "name": "Example Sales Team"
//   },
//   "attachments": [
//     {
//       "content": "PCFET0NUWVBFIGh0bWw+CjxodG1sIGxhbmc9ImVuIj4KCiAgICA8aGVhZD4KICAgICAgICA8bWV0YSBjaGFyc2V0PSJVVEYtOCI+CiAgICAgICAgPG1ldGEgaHR0cC1lcXVpdj0iWC1VQS1Db21wYXRpYmxlIiBjb250ZW50PSJJRT1lZGdlIj4KICAgICAgICA8bWV0YSBuYW1lPSJ2aWV3cG9ydCIgY29udGVudD0id2lkdGg9ZGV2aWNlLXdpZHRoLCBpbml0aWFsLXNjYWxlPTEuMCI+CiAgICAgICAgPHRpdGxlPkRvY3VtZW50PC90aXRsZT4KICAgIDwvaGVhZD4KCiAgICA8Ym9keT4KCiAgICA8L2JvZHk+Cgo8L2h0bWw+Cg==",
//       "filename": "index.html",
//       "type": "text/html",
//       "disposition": "attachment"
//     }
//   ],
//   "custom_variables": {
//     "user_id": "45982",
//     "batch_id": "PSJ-12"
//   },
//   "headers": {
//     "X-Message-Source": "dev.mydomain.com"
//   },
//   "subject": "Your Example Order Confirmation",
//   "text": "Congratulations on your order no. 1234",
//   "category": "API Test"
// }'