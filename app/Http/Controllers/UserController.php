<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Email;
use App\Models\Phone;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    //TODO refactor store and update
    public function store(UserCreateRequest $request) {
        $user = User::create($request->only('name'));
        $emails = [];
        $phones = [];
        if(isset($request->newEmails)){
            foreach($request->newEmails as $email) {
                $emails[] = new Email(['email' => $email]);
            }
        }
        if(isset($request->newPhones)){
            foreach($request->newPhones as $phone) {
                $phones[] = new Phone(['phone_number' => $phone]);
            }
        }
        $user->emails()->saveMany($emails);
        $user->phones()->saveMany($phones);
        return redirect('/user/' . $user->id);
    }

    public function update(UserUpdateRequest $request, User $user) {
        $user->update($request->only('name'));
        $emails = [];
        $phones = [];
        if(isset($request->newEmails)){
            foreach($request->newEmails as $email) {
                $emails[] = new Email(['email' => $email]);
            }
        }
        if(isset($request->newPhones)){
            foreach($request->newPhones as $phone) {
                $phones[] = new Phone(['phone_number' => $phone]);
            }
        }
        $user->emails()->saveMany($emails);
        $user->phones()->saveMany($phones);
        return redirect('/');
    }

    public function destroy(User $user) {
        $user->delete();
        return redirect('/');
    }
}
