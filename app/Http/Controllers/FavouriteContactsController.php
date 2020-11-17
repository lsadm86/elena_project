<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFavouriteContact;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class FavouriteContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = User::find(Auth::user()->id)->favouriteContacts()->orderBy('id', 'asc')->get();
        return view('home', compact('contacts'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param StoreFavouriteContact $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreFavouriteContact $request)
    {
        try {
            $contact = User::findOrFail($request->contact_id);
            Auth::user()->favouriteContacts()->attach($contact);
        } catch (ModelNotFoundException $e) {
            return back()->withErrors(['msg' => 'Contact id ' . $request->contact_id . ' was not found']);
        }

        return back()->with(['success' => $contact->name . ' was added to contacts']);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        try {
            $contact = Auth::user()->favouriteContacts()->findOrFail($id);

            Auth::user()->favouriteContacts()->detach($contact);

        } catch(ModelNotFoundException $e) {
            return back()->withErrors(['msg' => 'Contact id ' . $id . ' was not found']);
        }

        return back()->with(['success' => $contact->name . ' was deleted from contacts']);
    }
}
