<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use App\Models\Vister;
use Carbon\Carbon;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index()
    {

        $visiters_count = Vister::count();

        $visiters = Vister::all();
        $visiters_act_count = Vister::where('is_here', true)->count();
        $visiters_act = Vister::where('is_here', true)->get();
        $visiters_inact = Vister::where('is_here', false)->count();

        $last = new Carbon();
        if ($visiters_act) {
            foreach ($visiters_act as $visiter) {
                if ($visiter->time_in < $last) {
                    $last = $visiter->time_in;
                }
            }
        }

        $last_visiter = $last->format('F d ,Y H:i:s');
        // dd( $last_visiter , $visiters , $visiters_act  , $visiters_inact);
        return view('back.index', compact(
            'visiters',
            'visiters_act',
            'visiters_inact',
            'last_visiter',
            'visiters_act_count',
            'visiters_count'
        ));



    }
    function create()
    {
        return view('back.create');
    }

    function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'username' => 'required',
            'password' => 'required|min:8'
        ]);
        dd($request->all());
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);


        flash('The Admin Added ', 'success');
        return view('back.index');

    }




}
