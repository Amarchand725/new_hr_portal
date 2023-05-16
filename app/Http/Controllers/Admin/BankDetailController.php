<?php

namespace App\Http\Controllers\Admin;

use App\Models\BankDetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DB;
use Auth;

class BankDetailController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!empty(bankDetail(Auth::user()->id))){
            $title = 'Edit Bank Details';
            $model = BankDetail::where('user_id', Auth::user()->id)->first();
            return view('admin.bank_details.edit', compact('title', 'model'));
        }else{
            $title = 'Create Bank Details';
            return view('admin.bank_details.create', compact('title'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'account' => ['required', 'unique:bank_details', 'max:50'],
            'bank_name' => ['required', 'string', 'max:255'],
            'branch_code' => ['required', 'string', 'max:10'],
            'iban' => ['required', 'string', 'max:50'],
            'title' => ['required', 'string', 'max:200'],
        ]);

        $input = $request->all();
        $input['user_id'] = Auth::user()->id;

        DB::beginTransaction();

        try{
            $model = BankDetail::create($input);
            if($model){
                DB::commit();
            }

            \LogActivity::addToLog('Bank Details Added');

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BankDetail $model)
    {
        $title = 'Edit Bank Details';
        return view('admin.bank_details.edit', compact('title', 'model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BankDetail $bankDetail)
    {
        $request->validate([
            'account' => 'required|max:55|unique:bank_details,id,'.$bankDetail->id,
            'bank_name' => ['required', 'string', 'max:255'],
            'branch_code' => ['required', 'string', 'max:10'],
            'iban' => ['required', 'string', 'max:50'],
            'title' => ['required', 'string', 'max:200'],
        ]);

        DB::beginTransaction();

        try{
            $bankDetail->account = $request->account;
            $bankDetail->bank_name = $request->bank_name;
            $bankDetail->branch_code = $request->branch_code;
            $bankDetail->iban = $request->iban;
            $bankDetail->title = $request->title;
            $bankDetail->save();

            if($bankDetail){
                DB::commit();
            }

            \LogActivity::addToLog('Bank Details Updated');

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BankDetail $bankDetail)
    {
        //
    }
}
