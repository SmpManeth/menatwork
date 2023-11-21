<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;
use App\Models\Attachments;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function edit_user(Request $request, $id)
    {
        // Find the user by ID
        $user = User::find($id);

        return view('admin-edit', ['user' => $user]);
    }

    public function update_user(Request $request)
    {
        $request->validate([
            'employee_agreement_user' => 'required|max:2048', // Max file size of 2MB
            'offerletter' => 'required|max:2048', // Max file size of 2MB
            'workpormit' => 'required|max:2048', // Max file size of 2MB
            'termsandcondition_user' => 'required|max:2048', // Max file size of 2MB 'photo' => 'required|image|max:2048', // Max file size of 2MB
        ]);

        // Store the images
        $employee_agreement_user = $request->file('employee_agreement_user')->store('public/upload_images');
        $workpormit = $request->file('workpormit')->store('public/upload_images');
        $offerletter = $request->file('offerletter')->store('public/upload_images');
        $termsandcondition_user = $request->file('termsandcondition_user')->store('public/upload_images');

        $user = User::find($request->id);
        $user->update([
            'employee_agreement_user' => $employee_agreement_user,
            'workpormit' => $workpormit,
            'termsandcondition_user' => $termsandcondition_user,
            'status' => $request->status,
            'date' => $request->date,
            'time' => $request->time,
            'offerletter' => $offerletter,
        ]);


        $users = User::all();
        return view('admin', ['users' => $users]);
    }

    public function epmloyeeagreement(Request $request)
    {


        $request->validate([
            'epmloyeeagreement' => 'required|max:2048', // Max file size of 2MB

        ]);

        // Store the images
        $epmloyeeagreement = $request->file('epmloyeeagreement')->store('public/upload_images');



        $users = User::all();

        $user->update([
            'employee_agreement' => $epmloyeeagreement,
        ]);


        $user = $request->user(); // Get the authenticated user

        if ($user && auth()->check() && $user->usertype === 'admin') {
            return view('admin', ['users' => $users]); // Redirect to the "admin" view
        } else {
            return view('stepthree'); // Redirect to the "stepthree" view
        }

        // if ($user->usertype === 'admin') {
        //    / Redirect to the "admin" view
        // } else {
        //     return view('stepthree'); // Redirect to the "stepthree" view
        // }

    }

    public function show_users()
    {
        $users = User::all();
        return view('admin', ['users' => $users]);
    }

    public function show_step_four(Request $request)
    {
        $user = $request->user(); // Get the authenticated user

        return view('/stepfour', ['user' => $user]); // Red
    }
    public function show_step_three(Request $request)
    {
        // Find the user by ID
        $user = $request->user(); // Get the authenticated user

        return view('/stepthree', ['user' => $user]); // Red
    }

    public function show_stepfive(Request $request)
    {
        // Find the user by ID
        $user = $request->user(); // Get the authenticated user

        return view('/stepfive', ['user' => $user]); // Red
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store_step_three()
    {

        //  $dataToPass = request()->getQueryString();
        //  parse_str($dataToPass, $request);


        $user = Auth::user();
        // Update the user's fields
        // $user->employee_agreement = $request['employee_agreement'];
        // $user->tc = $request['termsconditions'];
        //  $user->save();

        return redirect()->route('stepfour')->with(['user' => $user]);
        // return view('/stepfour', ['user' => $user]);
    }

    public function store_step_four(Request $request)
    {
        $dataToPass = request()->getQueryString();
          parse_str($dataToPass, $request);


        $user = Auth::user();
        // Update the user's fields
         $user->employee_agreement = $request['employee_agreement'];
        // $user->tc = $request['termsconditions'];
      $user->save();
      return redirect()->route('stepfive')->with(['user' => $user]);

        // $request->validate([
        //     'sc' => 'required', // Max file size of 2MB
        //     'visa_proof' => 'required|max:2048', // Max file size of 2MB 'photo' => 'required|image|max:2048', // Max file size of 2MB
        // ]);

        // // Store the images
        // $visa_proof = $request->file('visa_proof')->store('public/upload_images');


        // $user = $request->user(); // Get the authenticated user
        // $user->update([
        //     'visa_proof' => $visa_proof,
        //     'sc' => $request->sc,
        // ]);

       // return redirect()->away('https://www.menatwork.com.ro');

        // return view('stepfour')->with('user', $user);
    }

    public function store_step_five(Request $request)
    {
        $user = Auth::user();
        // Update the user's fields
        //$user->employee_agreement = $request['employee_agreement'];
        // $user->tc = $request['termsconditions'];
     // $user->save();
     // return redirect()->route('stepfive')->with(['user' => $user]);

         $request->validate([
             'visa_proof' => 'required|max:2048', // Max file size of 2MB 'photo' => 'required|image|max:2048', // Max file size of 2MB
         ]);

         // Store the images
         $visa_proof = $request->file('visa_proof')->store('public/upload_images');


         $user = $request->user(); // Get the authenticated user
         $user->update([
             'visa_proof' => $visa_proof,
         ]);

        return redirect()->away('https://www.menatwork.com.ro');

        // return view('stepfour')->with('user', $user);
    }


    public function store_step_two(Request $request)
    {

        $request->validate([
            'photo' => 'required|max:2048', // Max file size of 2MB
            'passport_copy' => 'required|max:2048', // Max file size of 2MB 'photo' => 'required|image|max:2048', // Max file size of 2MB
            'police_report' => 'required|max:2048', // Max file size of 2MB 'photo' => 'required|image|max:2048', // Max file size of 2MB
            'CV' => 'required|max:2048', // Max file size of 2MB
        ]);

        // Store the images
        $photoPath = $request->file('photo')->store('public/upload_images');
        $passportCopyPath = $request->file('passport_copy')->store('public/upload_images');
        $policeReportPath = $request->file('police_report')->store('public/upload_images');
        $cvPath = $request->file('CV')->store('public/upload_images');

        $user = $request->user(); // Get the authenticated user
        $user->update([
            'photo_path' => $photoPath,
            'passport_copy_path' => $passportCopyPath,
            'police_report_path' => $policeReportPath,
            'cv_path' => $cvPath,
            'status' => "pending"
        ]);


        return redirect()->route('stepthree')->with(['user' => $user]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApplicationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateApplicationRequest $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        //
    }
}
