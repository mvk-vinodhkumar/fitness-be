<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Payment;

class PaymentReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(Session::get('role-id') == 2 && Session::get('team') == 'Internal') {
            $from  = $request->from_date;
            $to    = $request->to_date;
            $to    = date('Y-m-d', strtotime($to . '+1 day'));
            $isGST = $request->isGST;

            if(request()->ajax())
            {
                if(!empty($request->from_date))
                {
                    if($isGST === 'false') {
                        $data = Payment::whereBetween('created_at', [$from, $to])->orderBy('created_at','DESC')->get();
                    }
                    else {
                        $data = Payment::where('country','=','India')->where('country','=','INDIA')->whereBetween('created_at', [$from, $to])->orderBy('created_at','DESC')->get();
                    }
                }
                else
                {
                    $data = DB::table('payments')->orderBy('created_at','DESC')->get();
                }
                return datatables()->of($data)->make(true);
            }
            return view('admin.payment_reports');
        }
        else {
            return redirect('/admin');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
