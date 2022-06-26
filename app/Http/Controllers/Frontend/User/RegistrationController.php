<?php

namespace App\Http\Controllers\Frontend\User;

use App\Action\UserRegistrationAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Models\UserAuth\User;


class RegistrationController extends Controller
{
    public function registration()
    {
        return view('frontend.page.registration');
    }

    public function createNewUser(RegistrationRequest $request, UserRegistrationAction $action)
    {

       if ($user = $action->handle(new User(), $request->all())) {
            return redirect()->route('login')->with("status", "User was Created");
       }

       return back()->withInput()->with('status', "Is there something wrong");
    }
}
