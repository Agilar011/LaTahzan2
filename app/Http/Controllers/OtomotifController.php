<?php

namespace App\Http\Controllers;

use App\Models\Otomotif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OtomotifController extends Controller
{
    // button to approve the product
    public function approve(Request $request, $id)
    {
        // Gunakan $id untuk mencari otomotif yang akan di-approve
        $otomotif = Otomotif::findOrFail($id);

        // Get the ID of the currently logged-in user
        $user = Auth::user();
        // Update the approved_by_user_id column with the ID of the currently logged-in user
        $otomotif->approved_by_user_id = $user->id;
    $otomotif->approved_by_user_name = $user->name;
        $otomotif->status_etalase = 'approved';

        $otomotif->save();

        // Redirect back to the previous page or any other page you prefer
        return back()->with('success', 'Product has been approved.');
    }
    // button to mark the product as purchased
    // show approve the product
    public function showApprovedOtomotifs()
    {
        $approvedOtomotifs = Otomotif::where('status_etalase', 'approved')->get();
        return view('approved_otomotifs', compact('approvedOtomotifs'));
    }
    public function purchase(Request $request, $id)
    {
        $otomotif = Otomotif::findOrFail($id);

        // Ensure the product is available for purchase (for example, check if it's not already purchased)
        // Add your business logic here

        // Mark the product as purchased and associate it with the logged-in user
        $otomotif->purchased_by_user_id = Auth::id();
        $otomotif->save();

        // Redirect to the show view or any other relevant page
        return redirect()->route('otomotifs.show', $otomotif->id);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $data = Otomotif::where('status_etalase', 'not yet approved')->get();

        return view('Template UI.admin.admin-category-page.oto.input-oto', compact('data'));
    }
    public function showApprovedAndNotPurchasedOtomotifs()
    {
        $approvedNotPurchasedOtomotifs = Otomotif::where('status_etalase', 'approved')
            ->where('status_pembelian', 'not yet purchased')
            ->get();

        return view('Template UI.admin.admin-category-page.oto.crd-oto', compact('approvedNotPurchasedOtomotifs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Show the create form (if needed)
        return view('otomotifs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            // Define your validation rules here based on the fields in the form
        ]);

        // Create a new Otomotif instance and save it to the database
        $otomotif = Otomotif::create($validatedData);

        // Redirect to the show view or any other relevant page
        return redirect()->route('otomotifs.show', $otomotif->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $otomotif = Otomotif::findOrFail($id);
        return view('otomotifs.show', compact('otomotif'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $otomotif = Otomotif::findOrFail($id);
        return view('otomotifs.edit', compact('otomotif'));
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
        // Validate the incoming request data
        $validatedData = $request->validate([
            // Define your validation rules here based on the fields in the form
        ]);

        // Find the Otomotif by ID and update its attributes
        $otomotif = Otomotif::findOrFail($id);
        $otomotif->update($validatedData);

        // Redirect to the show view or any other relevant page
        return redirect()->route('otomotifs.show', $otomotif->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the Otomotif by ID and delete it
        $otomotif = Otomotif::findOrFail($id);
        $otomotif->delete();

        // Redirect to the index view or any other relevant page
        return redirect()->route('otomotifs.index');
    }
}
