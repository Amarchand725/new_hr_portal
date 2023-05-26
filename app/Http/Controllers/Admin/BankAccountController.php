<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BankAccount;
use Auth;
use DB;

class BankAccountController extends Controller
{
    public function index(Request $request)
    {
        // $this->authorize('bank_details-edit');
        $title = 'All Bank Accounts';
        if($request->ajax()){
            $query = BankAccount::orderby('id', 'desc')->where('id', '>', 0);
            if($request['search'] != ""){
                $query->where('bank_name', 'like', '%'. $request['search'] .'%');
                $query->orWhere('branch_code', 'like', '%'. $request['search'] .'%');
                $query->orWhere('iban', 'like', '%'. $request['search'] .'%');
                $query->orWhere('account', 'like', '%'. $request['search'] .'%');
                $query->orWhere('title', 'like', '%'. $request['search'] .'%');
            }
            if($request['status'] != "All"){
                $query->where('status', $request['status']);
            }
            $models = $query->paginate(10);
            return (string) view('admin.bank_accounts.search', compact('models'));
        }

        $models = BankAccount::orderby('id', 'desc')->paginate(10);
        $onlySoftDeleted = BankAccount::onlyTrashed()->count();
        return view('admin.bank_accounts.index', compact('title', 'onlySoftDeleted', 'models'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!empty(bankDetail(Auth::user()->id))){
            $title = 'Edit Bank Account Details';
            $model = BankAccount::where('user_id', Auth::user()->id)->first();
            return view('admin.bank_accounts.edit', compact('title', 'model'));
        }else{
            $title = 'Create Bank Account';
            return view('admin.bank_accounts.create', compact('title'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'account' => ['required', 'unique:bank_accounts', 'max:50'],
            'bank_name' => ['required', 'string', 'max:255'],
            'branch_code' => ['required', 'string', 'max:10'],
            'iban' => ['required', 'string', 'max:50'],
            'title' => ['required', 'string', 'max:200'],
        ]);

        $input = $request->all();
        $input['user_id'] = Auth::user()->id;

        DB::beginTransaction();

        try{
            $model = BankAccount::create($input);
            if($model){
                DB::commit();
            }

            \LogActivity::addToLog('Bank Account Added');

            return redirect()->route('bank_accounts.edit', $model->id)->with('message', 'Account added successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function show($account_id)
    {
        $model = BankAccount::findOrFail($account_id);
        return (string) view('admin.bank_accounts.show_content', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // $this->authorize('bank_details-edit');
        $title = 'Edit Bank Account Details';
        $model = BankAccount::where('id', $id)->where('status', 1)->first();
        return view('admin.bank_accounts.edit', compact('title', 'model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $bankDetail = BankAccount::where('id', $id)->first();
        $request->validate([
            'account' => 'required|max:55|unique:bank_accounts,id,'.$bankDetail->id,
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

            \LogActivity::addToLog('Bank Account Details Updated');

            return redirect()->back()->with('message', 'Bank Account Details Updated Successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function status($account_id)
    {
        // $this->authorize('department-status');
        $model = BankAccount::where('id', $account_id)->first();
        if($model->status==1){
            $model->status = 0;
        }else{
            $model->status = 1;
        }

        $model->save();

        if($model){
            return true;
        }
    }
}
