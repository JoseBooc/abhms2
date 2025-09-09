<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\TenantProfile;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SelfProfileController extends Controller
{
    public function edit(Request $request): View
    {
        $profile = TenantProfile::firstOrCreate(['user_id' => $request->user()->id]);
        return view('tenant.profile', compact('profile'));
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'emergency_contact_name' => 'nullable|string|max:255',
            'emergency_contact_phone' => 'nullable|string|max:255',
        ]);
        $profile = TenantProfile::firstOrCreate(['user_id' => $request->user()->id]);
        $profile->update($data);
        return back()->with('status','Profile updated');
    }
}
