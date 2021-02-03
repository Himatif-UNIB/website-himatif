<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function general()
    {
        $logo = Setting::where('key', 'organizationLogo')->first()->media;

        return view('admin.settings.general', compact('logo'));
    }

    public function update(Request $request)
    {
        $section = $request->section;

        switch ($section) {
            case 'general':
                $request->validate([
                    'settings.siteName' => 'required',
                    'settings.siteDescription' => 'nullable|min:10|max:512'
                ]);

                $allowedFields = ['siteName', 'siteDescription'];
                foreach ($allowedFields as $field) {
                    Setting::where('key', $field)
                        ->update(
                            ['value' => $request->settings[$field]]
                        );
                }

                return redirect()
                    ->back()
                    ->withSuccess('Berhasil menyimpan pengaturan');
            break;
            case 'contact':
                $request->validate([
                    'settings.organizationPhoneNumber' => 'nullable|min:9|max:15',
                    'settings.organizationEmail' => 'nullable|min:10|max:128|email'
                ]);

                $allowedFields = ['organizationPhoneNumber', 'organizationEmail', 'organizationAddress'];
                foreach ($allowedFields as $field) {
                    Setting::where('key', $field)
                        ->update(
                            ['value' => $request->settings[$field]]
                        );
                }

                return redirect()
                    ->back()
                    ->withSuccess('Berhasil menyimpan pengaturan kontak');
            break;
            case 'logo' :
                $request->validate([
                    'logo' => 'required|max:5012|mimes:jpg,jpeg,png'
                ]);

                if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
                    $getLogo = Setting::where('key', 'organizationLogo')->first();
                    if (isset($getLogo->media[0])) {
                        $getLogo->media[0]->delete();
                    }

                    $getLogo->addMediaFromRequest('logo')
                        ->toMediaCollection('logo');
                }

                return redirect()
                    ->back()
                    ->withSuccess('Berhasil menyimpan pengaturan logo');
            break;
            case 'organization':
                $allowedFields = ['organizationName', 'organizationUniversity', 'organizationDesc', 'organizationTagLine'];
                foreach ($allowedFields as $field) {
                    Setting::where('key', $field)
                        ->update(
                            ['value' => $request->settings[$field]]
                        );
                }

                return redirect()
                    ->back()
                    ->withSuccess('Berhasil menyimpan pengaturan');
            break;
        }
    }
}
