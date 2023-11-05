<?php

namespace App\Rules;

use App\Models\Customer;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Auth;

class CustomerUpdateEmailCheck implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $email = request('email');
        $id = request('id');
        $authId = Auth::user()->id;

        $check = Customer::where('user_id',$authId)->where('email',$email)->where('id','!=',$id)->count();

        if($check !== 0){
            $fail('The email already exists');
        }
    }
}
