<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Menampilkan halaman pengaturan
     * 
     * Halaman pengaturan adalah halaman untuk
     * mengatur website, seperti nama, logo,
     * deskripsi, sambutan, dan sebagainya.
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  View\Factory@private.settings.general
     */
    public function general()
    {
        $logo = Setting::where('key', 'organizationLogo')->first()->media;

        return view('private.settings.general', compact('logo'));
    }

    public function webmaster()
    {
        return view('private.settings.webmaster');
    }

    public function blog()
    {
        return view('private.settings.blog');
    }

    public function socialMedia()
    {
        return view('private.settings.social');
    }

    /**
     * Menyimpan data pengaturan
     * 
     * Menyimpan data pengaturan situs
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  View\Factory@private.settings.general
     */
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
            case 'blog' :
                $allowedFields = ['allowComment', 'moderateComment'];

                foreach ($allowedFields as $field) {
                    Setting::where('key', $field)
                        ->update(
                            ['value' => isset($request->settings[$field]) ? $request->settings[$field] : false]
                        );
                }

                return redirect()
                    ->back()
                    ->withSuccess('Berhasil menyimpan pengaturan');
            break;
            case 'webmaster':
                $allowedFields = ['googleVerifyCode', 'alexaVerifyCode', 'bingVerifyCode', 'yandexVerifyCode', 'googleAnalyticsId', 'facebookAuthorId', 'facebookAppId'];

                foreach ($allowedFields as $field) {
                    Setting::where('key', $field)
                    ->update(
                        ['value' => isset($request->settings[$field]) ? $request->settings[$field] : null]
                    );
                }

                return redirect()
                    ->back()
                    ->withSuccess('Berhasil menyimpan pengaturan');
            break;
            case 'social' :
                $allowedFields = ['facebookUrl', 'instagramUrl', 'youtubeUrl'];

                foreach ($allowedFields as $field) {
                    Setting::where('key', $field)
                        ->update(
                            ['value' => isset($request->settings[$field]) ? $request->settings[$field] : null]
                        );
                }

                return redirect()
                    ->back()
                    ->withSuccess('Berhasil menyimpan pengaturan');
            break;
        }
    }
}
