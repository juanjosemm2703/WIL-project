<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;

class PartnerController extends Controller
{
    /**
     * PartnerController Constructor, setting up required middlewares.
    */
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('verified', ['only'=>['index']]);
        $this->middleware('checkUserType:Teacher', ['only'=>['update']]);
    } 

    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $partners = Partner::paginate(5);
        return view('home')->with('partners', $partners);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $partner = Partner::where('user_id', $id)->first();
        return view('profile.partner')->with('partner', $partner);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   
        $is_approved = 1 - $request->is_approved;
        $partner = Partner::where('user_id', $id)->update(['approved'=>$is_approved]);
        return redirect(route('partner.show', ['id' => $id]));
    }

}
