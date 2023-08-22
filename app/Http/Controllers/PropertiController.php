<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Properti;
use App\Models\laporan_transaksi_properti;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PropertiController extends Controller
{
    public function index()
    {
        $data = Properti::where('status_etalase', 'not yet approved')->get();
        return view('Template UI.admin.admin-category-page.prop.input-prop', compact('data'));
    }

    public function dashboardProp()
    {
        $user = Auth::user();
        $data = Properti::where('upload_by_user_id', $user->id)->get();
        return view('Template UI.customer.prop-customer.dasboard-prop-customer', compact('data'));
    }

    public function etalaseProp()
    {
        $data = Properti::where('status_step', 'etalase')->get();
        return view('Template UI.admin.admin-category-page.prop.crd-prop', compact('data'));
    }

    public function tambahProp()
    {
        $user = Auth::user();
        if ($user->role === 'user') {
            return view('Template UI.customer.prop-customer.input-prop-customer');
        } else {
            // Handle other cases or provide an error response
        }
    }

    public function insertdataprop(Request $request)
    {
        $user = Auth::user();

        $requestData = $request->all();
        $requestData['upload_by_user_id'] = $user->id;
        $requestData['upload_by_user_name'] = $user->name;
        $requestData['no_hp_uploader'] = $user->phone;

        // Handle file uploads

        $data = Properti::create($requestData);

        // Handle photo file names and other logic

        if ($user->role === 'user') {
            $data = Properti::where('status_etalase', 'not yet approved')
                ->where('upload_by_user_id', $user->id)
                ->get();
            return view('Template UI.customer.prop-customer.dasboard-prop-customer', compact('data'));
        } else {
            return redirect()->route('property');
        }
    }

    // Other methods...

    public function approved_payment(Request $request, $id)
    {
        $properti = Properti::findOrFail($id);

        $user = Auth::user();

        // Update and save the property

        $laporan_transaksi_properti = new laporan_transaksi_properti();
        // Fill the data for laporan_transaksi_properti

        DB::beginTransaction();

        try {
            $laporan_transaksi_properti->save();
            $properti->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Failed to process payment.');
        }

        return back()->with('success', 'Product has been purchased.');
    }

    // Other methods...
}
