<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vister;
use Illuminate\Http\Request;

class VisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $status = $request->query('status');

        $query = Vister::query();

        if ($status == 'active') {
            $query->where('is_here', true);
        } elseif ($status == 'not_active') {
            $query->where('is_here', false);
        }

        $visters = $query->latest()->paginate(2);

        return view('front.index', compact('visters'));
        // $vister = Vister::latest()->paginate(2);
        // return view('front.index', compact('vister'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $visiter = new Vister();

        return view('front.create', compact('visiter'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'emp_name' => 'required',
            'dep_name' => 'required',
            'idNumber' => 'required|min:10|numeric'
        ]);


        $emp = User::where('name', $request->emp_name)->first();
        $visiter = Vister::where('idNumber', $request->idNumber)->first();


        if ($visiter) {
            if ($visiter->is_here == true) {
                flash('The Vister In The Building!!', 'warning');
                return redirect()->route('visiter.create');
            }
            if (!$emp) {
                flash('Error : Not found Employ Try Agin With True Name', 'error');
                session()->put('error_employ_not_found', 'Employee not found. Please enter a valid employee name.');
                return redirect()->route('visiter.create');
            }
            if ($emp->department_name != $request->dep_name) {
                flash('Error : The employee name does not match the department name. Check the information and try again.', 'error');
                session()->put('error_no_match', 'The employee name does not match the department name.');
                return redirect()->route('visiter.create');
            }
            $name = $visiter->name;
            $phone = $visiter->phone;
            $visiter->update([
                'time_in' => now(),
                'time_out' => null,
                'name' => $name,
                'phone' => $phone,
                'empName' => $request->emp_name,
                'depName' => $request->dep_name,
            ]);
            flash('The Vister Is Found So We Are Updating Visiter data', 'success');
            return redirect()->route('visiter.index');
        }





        if (!$emp) {
            flash('Error : Not found Employ Try Agin With True Name', 'error');
            session()->put('error_employ_not_found', 'Employee not found. Please enter a valid employee name.');
            return redirect()->route('visiter.create');
        }
        if ($emp->department_name != $request->dep_name) {
            flash('Error : The employee name does not match the department name. Check the information and try again.', 'error');
            session()->put('error_no_match', 'The employee name does not match the department name.');
            return redirect()->route('visiter.create');
        }

        Vister::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'depName' => $request->dep_name,
            'empName' => $request->emp_name,
            'idNumber' => $request->idNumber,
            'user_id' => $emp->id
        ]);


        flash('The Visiter Added', 'success');
        return redirect()->route('visiter.index');





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


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    function isHer($id)
    {
        $vister = Vister::findOrFail($id);


        $vister->update([
            'is_here' => true,
            'time_in' => now(),
            'time_out' => null,
        ]);
        // dd($vister);
        return back();
    }

    function isNotHer($id)
    {
        $vister = Vister::findOrFail($id);
        $vister->update([
            'is_here' => false,
            'time_in' => null,
            'time_out' => date(now()),
        ]);
        return back();
    }
}
