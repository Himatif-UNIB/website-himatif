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
     * @return  View\Factory@admin.members
     */
    public function index()
    {
        return view('admin.members');
    }

    /**
     * Menampilkan data anggota
     * 
     * Menampilkan data anggota berdasarkan ID
     * 
     * @since   1.0.0
     * @author  mulyosyahidin95
     * 
     * @return  View\Factory@admin.member-show
     */
    public function show(Member $member)
    {
        return view('admin.member-show', compact('member'));
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
}
