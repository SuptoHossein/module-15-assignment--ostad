<?php

namespace App\Rules;

use App\Models\Customer;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Auth;

class CustomerEmailCheckRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $email = request('email');
        $authId = Auth::user()->id;

        $exist = Customer::where('email',$email)->where('user_id',$authId)->first();

        if($exist){
            $fail('The email already exists');
        }
    }
}
