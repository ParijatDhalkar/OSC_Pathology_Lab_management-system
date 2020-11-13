<?php

namespace App\Http\Controllers;

use App\Models\Sample;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Session;

class SamplesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $samples = Sample::paginate(25);

        return view('samples.index', compact('samples'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $requestData = $request->all();

        $sample_types = Sample::getPossibleEnumValues('sample_type');
        
        return view('samples.create', ['data' => $requestData, 'sample_types' => $sample_types]);
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

        
        Sample::create($requestData);

        $appointment = Appointment::findOrFail($requestData['appointment_id']);
        $appointment->status = 'processing';
        $appointment->save();

        Session::flash('flash_message', 'Sample added!');

        return redirect('admin/samples');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sample = Sample::findOrFail($id);
        return view('samples.show', compact('sample'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sample = Sample::findOrFail($id);
        $sample_types = Sample::getPossibleEnumValues('sample_type');

        return view('samples.edit', ['sample' => $sample, 'sample_types' => $sample_types]);
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
        $requestData = $request->all();
        
        $sample = Sample::findOrFail($id);
        $sample->update($requestData);

        Session::flash('flash_message', 'Sample updated!');

        return redirect('admin/samples');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sample::destroy($id);

        Session::flash('flash_message', 'Sample deleted!');

        return redirect('admin/samples');
    }
}
