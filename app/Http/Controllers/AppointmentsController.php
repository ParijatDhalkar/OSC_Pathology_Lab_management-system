<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\User;
use App\Models\Slot;
use App\Models\Appointment;
use Session;

class AppointmentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $appointments = Appointment::paginate(25);
        return view('appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tests = Test::all();
        $patients = User::all();
        
        $patient_data = [];
        $test_data = [];
        
        foreach ($patients as $patient) {
            $patient_data[$patient->id] = $patient->name;
            
        }
        foreach ($tests as $test) {
            $test_data[$test->id] = $test->name;
        }

        error_log("Inside the create appointment");
        
        return view('appointments.create', ['tests' => $test_data, 'patients' => $patient_data]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $requestData['status'] = 'pending';

        //dd($requestData);

        $appointment = Appointment::create($requestData);

        // create invoice for this appointment
        //$id = $this->createInvoice($appointment);

        //dd($id);

        // send it to patient's mail

        Session::flash('flash_message', 'Appointment added!');

        return redirect('appointments');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $appointment = Appointment::findOrFail($id);
        $slot = Slot::findOrFail($appointment->slot_id);
        //dd($appointment->slot->time);

        return view('appointments.show', ['appointment' => $appointment, 'slot' => $slot->time]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Appointment::destroy($id);

        Session::flash('flash_message', 'Appointment deleted!');

        return redirect('appointments');
    }

    public function checkAvailableSlots(Request $request){
        
        error_log("Inside the check slots");
        $data = $request->all();
        
        $appointments = Appointment::where('test_id', $data['test_id'])
                                    ->where('status', 'pending')
                                    ->where('date', $data['date'])
                                    ->get();

        $test = Test::where('id', $data['test_id'])->first();;
        $slots = unserialize($test->slot);

        if ( $appointments->isEmpty() ) {

            // all slots are available
            // return all slots for this test
            $slots = Slot::find($slots);
            return response()->json(['status' => 'found', 'slots' => $slots->toArray()]);
        } else {

            foreach ($appointments as $appointment) {
                
                if(($key = array_search($appointment->slot_id, $slots)) !== false) {
                    unset($slots[$key]);
                }

            }

            if ( empty($slots) ) {

                // all slots are occupied
                return response()->json(['status' => 'all_busy']);
            } else {

                // some slots are still available, return them
                $slots = Slot::find($slots);
                return response()->json(['status' => 'found', 'slots' => $slots->toArray()]);


            }



        }                       

        return response()->json(['status' => 'error']);
        //return response()->json(['slots' => $slots]);

    }
}
