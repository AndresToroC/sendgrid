<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;
use Session;

use App\Contact;
use App\Group;

class ContactController extends Controller
{
    public function index(Group $group)
    {
        $group->load('contacts');

        return view('groups.contacts.index', compact('group'));
    }

    public function create(Group $group)
    {
        return view('groups.contacts.create', compact('group'));
    }

    public function store(ContactFormRequest $request, Group $group)
    {
        $contact = Contact::create($request->all());
        $group->contacts()->save($contact);

        $message = ['type' => 'success', 'text' => 'Contacto creado correctemante'];
        Session::flash('message', $message);

        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function edit(Group $group, Contact $contact)
    {
        return view('groups.contacts.edit', compact('group', 'contact'));
    }

    public function update(ContactFormRequest $request, Group $group, Contact $contact)
    {
        $contact->update($request->all());

        $message = ['type' => 'success', 'text' => 'Contacto actualizado correctemante'];
        Session::flash('message', $message);

        return redirect()->back();
    }

    public function destroy($id)
    {
        //
    }
}
