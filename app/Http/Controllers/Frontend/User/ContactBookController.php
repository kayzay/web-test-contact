<?php

namespace App\Http\Controllers\Frontend\User;

use App\Action\AddContactToUser;
use App\Action\DeleteContactFromUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequst;
use App\Repository\Contact\ContactBockRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactBookController extends Controller
{
    public function publicContact()
    {
        $repository = ContactBockRepository::getInstance();
        $data = $repository->publicContact(10);

        return view('frontend.page.contacts.public', $data);
    }

    public function userContacts()
    {
        $repository = ContactBockRepository::getInstance();
        $data = $repository->userContact(Auth::guard('web')->id(), 10);

        return view('frontend.page.contacts.userContacts', $data);
    }

    public function addContactToUser(ContactRequst $request, AddContactToUser $action)
    {
        if ($request->has('used') && $request->has('contact_id')) {
            return back()->with('status', 'Dont fount contact');
        }
        $data = $request->has('used') ? $request->only('used') : $request->only('contact_id');

        if ($action->handle(Auth::guard('web')->id(), current($data))) {

            return back()->with('status', 'Contact was added');
        }

        return back()->with('status', 'Dont fount contact');
    }

    public function deleteContactFromUser(Request $request, DeleteContactFromUser $action)
    {
        if ($request->has('used') && $request->has('contact_id')) {
            return back()->with('status', 'Dont fount contact');
        }

        $data = $request->has('used') ? $request->only('used') : $request->only('contact_id');

        if ($action->handle(Auth::guard('web')->id(), current($data))) {

            return back()->with('status', 'Contact was deleted');
        }

        return back()->with('status', 'Dont fount contact');
    }
}
