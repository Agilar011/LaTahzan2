<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;


class PropertyController extends Controller
{
    // method approved
    public function approve(Request $request, $id)
    {
        // Gunakan $id untuk mencari otomotif yang akan di-approve
        $property = Property::findOrFail($id);

        // Get the ID of the currently logged-in user
        $user = Auth::user();
        // Update the approved_by_user_id column with the ID of the currently logged-in user
        $property->approved_by_user_id = $user->id;
        $property->approved_by_user_name = $user->name;
        $property->status_etalase = 'approved';

        $property->save();

        // Redirect back to the previous page or any other page you prefer
        return back()->with('success', 'Product has been approved.');
    }
     // show approve the product
     public function showApprovedPropertys()
     {
         $approvedPropertys = Property::where('status_etalase', 'approved')->get();
         return view('approved_propertys', compact('approvedPropertys'));
     }
    //  Purchased Method
    public function purchase(Request $request, $id)
    {
        $property = Property::findOrFail($id);

        // Ensure the product is available for purchase (for example, check if it's not already purchased)
        // Add your business logic here

        // Mark the product as purchased and associate it with the logged-in user
        $property->purchased_by_user_id = Auth::id();
        $property->save();

        // Redirect to the show view or any other relevant page
        return redirect()->route('propertys.show', $property->id);
    }


    // method show approved and not purchased otomotif
    public function showApprovedAndNotPurchasedPropertys()
    {
        $approvedNotPurchasedPropertys = Property::where('status_etalase', 'approved')
            ->where('status_pembelian', 'not yet purchased')
            ->get();

        return view('Template UI.admin.admin-category-page.prop.crd-prop', compact('approvedNotPurchasedPropertys'));
    }

    //RETRIEVE DATA PROP

    public function index(){
        $data = Property::where('status_etalase', 'not yet approved')->get();

        return view('Template UI.admin.admin-category-page.prop.input-prop', compact('data'));
    }

    //CREATE DATA PROP

    public function tambahProp(){
        return view('Template UI.admin.admin-category-page.prop.tambah-prop');
    }

    public function insertdataprop(Request $request){
        // dd($request->all());
        $data = Property::create($request->all());
        if($request->hasFile('foto1') && $request->hasFile('foto2') && $request->hasFile('foto3') && $request->hasFile('foto_sertifikat')){
            $request->file('foto1')->move('fotoProp1/', $request->file('foto1')->getClientOriginalName());
            $request->file('foto2')->move('fotoProp2/', $request->file('foto2')->getClientOriginalName());
            $request->file('foto3')->move('fotoProp3/', $request->file('foto3')->getClientOriginalName());
            $request->file('foto_sertifikat')->move('fotoSertifikat/', $request->file('foto_sertifikat')->getClientOriginalName());

            $data->foto1 = $request->file('foto1')->getClientOriginalName();
            $data->foto2 = $request->file('foto2')->getClientOriginalName();
            $data->foto3 = $request->file('foto3')->getClientOriginalName();
            $data->foto_sertifikat = $request->file('foto_sertifikat')->getClientOriginalName();

            $data->save();
        }
        return redirect()->route('properti');
    }

    //UPDATE DATA PROP

    public function tampilkandataprop($id){
        // $data = Otomotif::find($id);
        $data = Property::find($id);

        return view('admin.admin-category-page.prop.update-prop', compact('data'));
    }

    public function updatedataprop(Request $request, $id){
        $data = Property::find($id);
        $data->update($request->all());

        return redirect()->route('properti');
    }

    //DELETE DATA OTO

    public function deletedataprop($id){
        $data = Property::find($id);
        $data->delete();

        return redirect()->route('properti');
    }


}
