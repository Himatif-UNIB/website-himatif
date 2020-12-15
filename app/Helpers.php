<?php

use App\Models\Setting;
use Illuminate\Support\Facades\DB;

if (!function_exists('getSetting')) {
    /**
     * Mendapatkan data pengaturan
     * 
     * Mendapatkan data pengaturan berdasarkan
     * kunci yang diberikan.
     * 
     * @param mixed $key    Kunci pengaturan
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  String  Data pengaturan
     */
    function getSetting($key)
    {
        $setting = DB::table('settings')->select('value')
            ->where('key', $key)
            ->first();

        return $setting->value;
    }
}

if (!function_exists('getSiteName')) {
    /**
     * Mendapatkan nama situs
     * 
     * Mendapatkan data nama situs dari
     * tabel `settings`
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  String  Nama situs
     */
    function getSiteName()
    {
        return getSetting('siteName');
    }
}

if (!function_exists('getSiteLogo')) {
    /**
     * Mendapatkan logo situs
     * 
     * Mendapatkan URL logo situs dari tabel `media`.
     * Mengembalikan NULL jika tidak ada logo
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  String|NULL URL logo
     */
    function getSiteLogo()
    {
        $logo = Setting::where('key', 'organizationLogo')->first()->media;

        return (isset($logo[0])) ? $logo[0]->getFullUrl() : NULL;
    }
}

if (!function_exists('updateSetting')) {
    /**
     * Memperbarui data pengaturan
     * 
     * Memperbarui data pengaturan berdasarkan
     * kunci yang diberikan
     * 
     * @param mixed $key        kunci pengaturan
     * @param string $newValue  data baru
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return void
     */
    function updateSetting($key, $newValue = '')
    {
        DB::table('settings')
            ->where('key', $key)
            ->update([
                'value' => $newValue
            ]);
    }
}

if (!function_exists('getController')) {
    /**
     * Mendapatkan nama controller
     * 
     * Mendapatkan nama controller yang sedang diakses
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return String   nama controller
     */
    function getController()
    {
        $action = app('request')->route()->getAction();
        $route = class_basename($action['controller']);

        list($controller, $action) = explode('@', $route);

        return $controller;
    }
}

if (!function_exists('getAction')) {
    /**
     * Mendapatkan nama method
     * 
     * Mendapatkan nama method yang sedang diakses
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  String  nama method
     */
    function getAction()
    {
        $action = app('request')->route()->getAction();
        $route = class_basename($action['controller']);

        list($controller, $action) = explode('@', $route);

        return $action;
    }
}

if (!function_exists('isController')) {
    /**
     * Memeriksa controller
     * 
     * Memeriksa apakah controller yang sedang diakses adalah
     * controller `$controller`
     * 
     * @param mixed $controller
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return Bool hasil pemeriksaan
     */
    function isController($controller)
    {
        return ($controller === getController());
    }
}

if (!function_exists('isAction')) {
    /**
     * Memeriksa method
     * 
     * Memeriksa apakah method yang sedang diakses adalah
     * method `$action`
     * 
     * @param mixed $action
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  Bool hasil pemeriksaan
     */
    function isAction($action)
    {
        return ($action === getAction());
    }
}

if (!function_exists('__active')) {
    /**
     * Membuat class `.active`
     * 
     * Membuat class `.active` jika controller dan method
     * yang sedang diakses sesuai dengan
     * kondisi yang diberikan
     * 
     * @param string $controller
     * @param string $action
     * @param string $param
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return String   html class .active
     */
    function __active($controller = '', $action = '', $param = '')
    {
        $phpSelf = $_SERVER['PHP_SELF'];

        if ($controller === '' && $action === '') {
            return ' active';
        } else if ($param !== '') {
            if (isController($controller) && isAction($action)) {
                if (strpos($phpSelf, $param) !== FALSE) {
                    return ' active';
                }
            }
        } else if (is_array($controller) && count($controller)) {
            foreach ($controller as $c) {
                if (isController($c)) {
                    return ' active';
                    break;
                }
            }
        } else if (is_array($action) && count($action) > 0) {
            foreach ($action as $method) {
                if (isController($controller) && isAction($method)) {
                    return ' active';
                    break;
                }
            }
        } else if (isController($controller) && isAction($action)) {
            return ' active';
        }
    }
}

if (!function_exists('createAcronym')) {
    /**
     * Membuat akronim
     * 
     * Membuat akronim dari kalimat
     * yang diberikan
     * 
     * @param mixed $words
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return String   hasil akronim
     */
    function createAcronym($words)
    {
        $acronym = '';
        $words = explode(' ', $words);
        foreach ($words as $word) {
            $first_letter = str_split($word);

            $acronym .= $first_letter[0];
        }

        return $acronym;
    }
}

if (!function_exists('getProfilePicture')) {
    /**
     * Mendapatkan URL foto profil
     * 
     * Mendapatkan URL foto profil user
     * yang sedang login
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return URL Foto profil
     */
    function getProfilePicture()
    {
        if (isset(auth()->user()->media[0])) {
            return auth()->user()->media[0]->getFullUrl();
        }

        return asset('assets/images/avatar-1.png');
    }
}

if (!function_exists('printUserName'))
{
    /**
     * Membuat nama panggilan
     * 
     * Membuat nama panggilan berdasarkan nama lengkap.
     * Nama depan akan dijadikan sebagai nama panggilan.
     * 
     * @param mixed $name Nama lengkap
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return Nama panggilan
     */
    function printUserName($name) {
        $nama = trim($name);
        $names = explode(' ', $name);
        if (count($names) == 1)
            return $nama;
    
        $firstName = $names[0];
    
        $backName = '';
        for ($i = 1; $i < count($names); $i++) {
            $backName .= $names[$i] .' ';
        }
        $backName = rtrim($backName);
        $backName = createAcronym($backName);
    
        $name = $firstName .' '. $backName;
    
        return $name;
    }
}