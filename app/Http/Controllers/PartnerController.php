<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;

class PartnerController extends Controller
{
    // public function __construct(){
    //     $this->middleware(['auth', 'verified']);
    // } 

    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $partners = Partner::paginate(5);
        return view('dashboard')->with('partners', $partners);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   
        $is_approved = 1 - $request->is_approved;
        $partner = Partner::where('user_id', $id)->update(['approved'=>$is_approved]);
        return redirect(route('home'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
