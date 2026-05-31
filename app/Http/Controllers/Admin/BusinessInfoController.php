<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessInfo;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BusinessInfoController extends Controller
{
    public function edit()
    {
        // Get or create the business info (only one record)
        $businessInfo = BusinessInfo::first() ?? new BusinessInfo();

        return Inertia::render('Admin/Settings/BusinessInfoEdit', [
            'businessInfo' => $businessInfo,
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'business_name' => 'nullable|string|max:255',
            'owner_name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'whatsapp_number' => 'nullable|string|max:20',
            'instagram' => 'nullable|url|max:500',
            'tiktok' => 'nullable|url|max:500',
            'facebook' => 'nullable|url|max:500',
            'owner_bank_name' => 'nullable|string|max:255',
            'owner_bank_account' => 'nullable|string|max:255',
            'location_link' => 'nullable|url',
            'map_embed_code' => 'nullable|string',
            'service' => 'nullable|string|max:500',
        ]);

        // Get or create the business info (only one record)
        $businessInfo = BusinessInfo::firstOrCreate([]);
        $businessInfo->update($validated);

        return redirect()->route('admin.business-info.edit')->with('success', 'Informasi bisnis berhasil diperbarui');
    }
}

