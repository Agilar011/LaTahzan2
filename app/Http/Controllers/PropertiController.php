<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Properti;
use Illuminate\Support\Facades\Auth;


class PropertiController extends Controller
{

    //RETRIEVE DATA PROP

    public function index(){
        $data = Properti::where('status_etalase', 'not yet approved')->get();
        return view('Template UI.admin.admin-category-page.prop.input-prop', compact('data'));
    }

    //RETRIEVE DATA PROP ETALASE

    public function etalaseProp(){
        $data = Properti::where('status_etalase', 'not yet approved')->get();

        return view('Template UI.admin.admin-category-page.prop.crd-prop', compact('data'));
    }

    //CREATE DATA PROP

    public function tambahProp(){
        return view('Template UI.admin.admin-category-page.prop.tambah-prop');
    }

    public function insertdataprop(Request $request){

         // Mengambil id pengguna yang saat ini login
    $user_id = Auth::id();

    // Memasukkan id pengguna ke dalam data request
    $request->merge(['user_id' => $user_id]);
        // dd($request->all());
        $data = Properti::create($request->all());
        if($request->hasFile('foto1') && $request->hasFile('foto2') && $request->hasFile('foto3') && $request->hasFile('foto_sertifikat') && $request->hasFile('foto_ktp')){
            $request->file('foto1')->move('fotoProp1/', $request->file('foto1')->getClientOriginalName());
            $request->file('foto2')->move('fotoProp2/', $request->file('foto2')->getClientOriginalName());
            $request->file('foto3')->move('fotoProp3/', $request->file('foto3')->getClientOriginalName());
            $request->file('foto_sertifikat')->move('fotoSertifikat/', $request->file('foto_sertifikat')->getClientOriginalName());
            $request->file('foto_ktp')->move('fotoKtp/', $request->file('foto_ktp')->getClientOriginalName());

            $data->foto1 = $request->file('foto1')->getClientOriginalName();
            $data->foto2 = $request->file('foto2')->getClientOriginalName();
            $data->foto3 = $request->file('foto3')->getClientOriginalName();
            $data->foto_sertifikat = $request->file('foto_sertifikat')->getClientOriginalName();
            $data->foto_ktp = $request->file('foto_ktp')->getClientOriginalName();

            $data->save();
        }
        return redirect()->route('property');
    }

    //UPDATE DATA PROP

    public function tampilkandataprop($id){
        // $data = Otomotif::find($id);
        $data = Properti::find($id);

        return view('Template UI.admin.admin-category-page.prop.update-prop', compact('data'));
    }

    public function updatedataprop(Request $request, $id){
        $data = Properti::find($id);
        $data->update($request->all());

        return redirect()->route('property');
    }

    //DELETE DATA OTO

    public function deletedataprop($id){
        $data = Properti::find($id);
        $data->delete();

        return redirect()->route('property');
    }

    //UPDATE STATUS


    public function approve(Request $request, $id)
    {
        // Gunakan $id untuk mencari otomotif yang akan di-approve
        $property = Properti::findOrFail($id);

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
     // method show approved and not purchased otomotif
     public function showApprovedAndNotPurchasedPropertys()
     {
         $approvedNotPurchasedPropertys = Properti::where('status_etalase', 'approved')
             ->where('status_pembelian', 'not yet purchased')
             ->get();

         return view('Template UI.admin.admin-category-page.prop.crd-prop', compact('approvedNotPurchasedPropertys'));
     }

    //  Purchased Method
    public function purchase(Request $request, $id)
    {
        $property = Properti::findOrFail($id);

        // Ensure the product is available for purchase (for example, check if it's not already purchased)
        // Add your business logic here
         // Get the ID of the currently logged-in user
         $user = Auth::user();

        // Mark the product as purchased and associate it with the logged-in user
        $property->purchased_by_user_id = $user->id;
        $property->purchased_by_user_name = $user->name;
        $property->status_pembelian = 'purchased';

        $property->save();

        // Redirect to the show view or any other relevant page
        return back()->with('success', 'Product has been purchased.');
    }

    // show approve the productpublic function showPurchasedPropertys()
    public function showPurchasedPropertys()
{
    $purchasedPropertys = Properti::where('status_pembelian', 'purchased')->get();
    return view('Template UI.admin.admin-category-page.prop.trx-prop', compact('purchasedPropertys'));
}





}
