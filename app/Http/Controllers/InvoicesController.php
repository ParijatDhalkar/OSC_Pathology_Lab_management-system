<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Appointment;
use Session;
use Carbon\Carbon;
use Auth;
use DB;

class InvoicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web,admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::guard('admin')->check())
        {
            $invoices = Invoice::paginate(25);
            return view('invoices.index', compact('invoices'));
        }
        
        else
        {
            //We have to change query here
            $id=Auth::id();
            $invoices = DB::select('select * from invoices i inner join appointments a on i.appointment_id=a.id where a.patient_id= $id');
            //$invoices = Invoice::paginate(25);
            //return view('invoices.index', ['invoices' => $invoices]);
            return view('invoices.index_user', compact('invoices'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        if(Auth::guard('admin')->check())
            return view('invoices.create');
        else
            abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::guard('admin')->check())
        {   
            $requestData = $request->all();
            $app = Appointment::findOrFail($requestData['appointment_id']);
            $requestData['amount'] = $app->test->cost;
            $requestData['due_date'] = Carbon::today()->addDays(3);;
            
            Invoice::create($requestData);

            Session::flash('flash_message', 'Invoice added!');

            return redirect('invoices');
        }
        else
            abort(404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice = Invoice::findOrFail($id);

        return view('invoices.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::guard('admin')->check())
        {
            $invoice = Invoice::findOrFail($id);

            return view('invoices.edit', compact('invoice'));
        }
        else
            abort(404);
            
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
        if(Auth::guard('admin')->check())
        {
            $requestData = $request->all();
            $invoice = Invoice::findOrFail($id);
            $invoice->update($requestData);
            Session::flash('flash_message', 'Invoice updated!');
            return redirect('invoices');
        }
        else
            abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::guard('admin')->check())
        {
            Invoice::destroy($id);
            Session::flash('flash_message', 'Invoice deleted!');
            return redirect('invoices');
        }
        else
            abort(404);
    }

    public function printInvoice($id)
    {
        //
    }
}
