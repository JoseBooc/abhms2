<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\ApplianceDeclaration;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ApplianceController extends Controller
{
    public function index(Request $request): View
    {
        $appliances = ApplianceDeclaration::where('user_id', $request->user()->id)->latest()->paginate(15);
        return view('tenant.appliances', compact('appliances'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'wattage' => 'nullable|integer|min:0',
            'notes' => 'nullable|string|max:255',
        ]);
        $data['user_id'] = $request->user()->id;
        ApplianceDeclaration::create($data);
        return back()->with('status','Appliance added');
    }

    public function destroy(Request $request, ApplianceDeclaration $appliance): RedirectResponse
    {
        abort_unless($appliance->user_id === $request->user()->id, 403);
        $appliance->delete();
        return back()->with('status','Appliance removed');
    }
}
