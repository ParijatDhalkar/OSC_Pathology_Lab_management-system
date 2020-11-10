<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Slot;
use Illuminate\Http\Request;
use Session;

class TestsController extends Controller
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
        $tests = Test::paginate(25);

        return view('tests.index', compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $slots = Slot::getSlotsArray();

        return view('tests.create', ['slots' => $slots]);
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
        
        $requestData['slot'] = serialize($requestData['slot']);

        $test = new Test;
        $test->name = $request->input('name');
        $test->code = $request->input('code');
        $test->description = $request->input('description');
        $test->cost = $request->input('cost');
        $test->slot = $requestData['slot'];
        $test->save();

        Session::flash('flash_message', 'Test added!');

        return redirect('admin/tests');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $test = Test::findOrFail($id);
        $test_slots = Slot::find(unserialize($test->slot))->toArray();

        return view('tests.show', ['test' => $test, 'test_slots' => $test_slots]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $test = Test::findOrFail($id);
        $slots = Slot::getSlotsArray();

        $test_slots = Slot::find(unserialize($test->slot))->toArray();

        //dd($test_slots);

        return view('tests.edit', ['test' => $test, 
                    'slots' => $slots, 'test_slots' => $test_slots]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $requestData = $request->all();
        $requestData['slot'] = serialize($requestData['slot']);
        
        $test = Test::findOrFail($id);
        $test->name = $request->input('name');
        $test->code = $request->input('code');
        $test->description = $request->input('description');
        $test->cost = $request->input('cost');
        $test->slot = $requestData['slot'];

        Session::flash('flash_message', 'Test updated!');

        return redirect('admin/tests');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Test::destroy($id);

        Session::flash('flash_message', 'Test deleted!');

        return redirect('admin/tests');
    }
}
