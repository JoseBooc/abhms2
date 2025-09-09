<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTenantProfileRequest;
use App\Http\Requests\UpdateTenantProfileRequest;
use App\Models\TenantProfile;
use App\Models\User;
use App\Models\Room;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class TenantProfileController extends Controller
{
    public function index(): View
    {
        $profiles = TenantProfile::with(['user','room'])->orderByDesc('id')->paginate(15);
        return view('admin.tenants.index', compact('profiles'));
    }

    public function create(): View
    {
        $users = User::orderBy('name')->get();
        $rooms = Room::orderBy('number')->get();
        return view('admin.tenants.create', compact('users','rooms'));
    }

    public function store(StoreTenantProfileRequest $request): RedirectResponse
    {
        TenantProfile::create($request->validated());
        return redirect()->route('admin.tenants.index')->with('status','Tenant profile created');
    }

    public function edit(TenantProfile $tenant): View
    {
        $users = User::orderBy('name')->get();
        $rooms = Room::orderBy('number')->get();
        return view('admin.tenants.edit', ['profile' => $tenant, 'users' => $users, 'rooms' => $rooms]);
    }

    public function update(UpdateTenantProfileRequest $request, TenantProfile $tenant): RedirectResponse
    {
        $tenant->update($request->validated());
        return redirect()->route('admin.tenants.index')->with('status','Tenant profile updated');
    }

    public function destroy(TenantProfile $tenant): RedirectResponse
    {
        $tenant->delete();
        return redirect()->route('admin.tenants.index')->with('status','Tenant profile deleted');
    }
}
