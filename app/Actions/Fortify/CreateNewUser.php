<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        $validator = Validator::make($input, [
            'name_signUp' => ['required', 'string', 'max:255'],
            'email_signUp' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class, 'email'),
            ],
            'password_signUp' => $this->passwordRules(),
        ]);
        
        if ($validator->fails()) {
            $errors = $validator->errors();
                $errors->add('signUp_active', 'true'); 
                throw ValidationException::withMessages($errors->toArray());
        }

        return User::create([
            'name' => $input['name_signUp'],
            'email' => $input['email_signUp'],
            'password' => Hash::make($input['password_signUp']),
        ]);
    }
}
