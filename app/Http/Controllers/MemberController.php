<?php

namespace App\Http\Controllers;

use App\Exports\MembersExport;
use App\Models\Member;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MemberController extends Controller
{
    /**
     * Menampilkan halaman manajemen anggota
     * 
     * Halaman manajemen anggota adalah halaman yang
     * digunakan untuk mengelola data anggota, seperti
     * menambah, mengubah, menghapus,
     * ekspor ke Excel dan impor dari Excel
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  View\Factory@private.members.members
     */
    public function index()
    {
        return view('private.members.members');
    }

    /**
     * Menampilkan data anggota
     * 
     * Menampilkan data anggota berdasarkan ID
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  View\Factory@private.members.member-show
     */
    public function show(Member $member)
    {
        return view('private.members.member-show', compact('member'));
    }

    /**
     * Ekspor ke excel
     * 
     * Mengekspor data anggota ke file
     * Excel.
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  File excel data anggota
     */
    public function export()
    {
        return Excel::download(new MembersExport, 'Data Anggota HIMATIF - '. time() .'.xlsx');
    }

    /**
     * Menampilkan halaman manajemen periode kepengurusan
     * 
     * Halaman manajemen periode kepengurusan adalah
     * halaman yang menampilkan manajemen periode kepengurusan
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  View\Factory@private.members.periods
     */
    public function periods()
    {
        return view('private.members.periods');
    }

    /**
     * Menampilkan halaman manajemen angkatan
     * 
     * Halaman manajemen angkatan adalah
     * halaman yang menampilkan manajemen angkatan
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  View\Factory@private.members.forces
     */
    public function forces()
    {
        return view('private.members.forces');
    }

    /**
     * Menampilkan halaman manajemen divisi
     * 
     * Halaman manajemen divisi adalah
     * halaman yang menampilkan manajemen divisi
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  View\Factory@private.members.divisions
     */
    public function divisions()
    {
        return view('private.members.divisions');
    }

    /* Menampilkan halaman manajemen jabatan
     * 
     * Halaman manajemen jabatan adalah halaman
     * yang digunakan untuk mengelola jabatan pengurus
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  View\Factory@private.members.positions
     */
    public function positions()
    {
        return view('private.members.positions');
    }

    /**
     * Menampilkan halaman manajemen pengurus
     * 
     * Halaman manajemen pengurus adalah halaman untuk
     * mengelola data pengurus
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  View\Factory@private.members.staff
     */
    public function staff()
    {
        return view('private.members.staff');
    }
}
