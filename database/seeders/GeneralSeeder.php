<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $year = now()->year;
        
        $periodId = DB::table('periods')->insertGetId([
            'name' => $year,
            'is_active' => true
        ]);

        DB::table('forces')->insert([
            'name' => 'Angkatan '. $year,
            'year' => $year
        ]);

        $divisionsId = [];
        $divisions = [
            'Kerohanian', 'Kewirausahaan', 'Minat dan Bakat', 'Information and Technology',
            'Pengabdian Masyarakat', 'Pengembangan Sumber Daya Manusia'
        ];

        foreach ($divisions as $division) {
            $divisionsId[] = DB::table('divisions')->insertGetId(
                ['name' => $division]
            );
        }

        $builderPositionId = DB::table('positions')->insertGetId(
            ['order_level' => 1, 'name' => 'Pembina', 'role_name' => 'builder']
        );

        DB::table('positions')->insert([
            ['order_level' => 2, 'name' => 'Ketua Umum', 'role_name' => 'chairman'],
            ['order_level' => 2, 'name' => 'Wakil Ketua Umum', 'role_name' => 'vice_chairman'],
            ['order_level' => 3, 'name' => 'Dewan Penasehat Organisasi', 'role_name' => 'dpo'],
            ['order_level' => 4, 'name' => 'Badan Pertimbangan Organisasi', 'role_name' => 'bpo']
        ]);

        $secretaryPositionId = DB::table('positions')->insertGetId(['order_level' => 5, 'name' => 'Sekretaris', 'role_name' => 'secretary']);
        $treasurerPositionId = DB::table('positions')->insertGetId(['order_level' => 5, 'name' => 'Bendahara', 'role_name' => 'treasurer']);

        DB::table('positions')->insert([
            ['order_level' => 6, 'name' => 'Biro Kestari', 'role_name' => 'head_of_division'],
            ['order_level' => 6, 'name' => 'Biro Dana Usaha', 'role_name' => 'head_of_division']
        ]);

        $headOfDivisionsId = [];
        $headOfDivisions = [
            'Kepala Bidang Kerohanian', 'Kepala Bidang Kewirausahaan', 'Kepala Bidang Minat dan Bakat',
            'Kepala Bidang IT', 'Kepala Bidang Pengabdian Masyarakat', 'Kepala Bidang PSDM'
        ];

        $n = 0;
        foreach ($headOfDivisions as $head) {
            $headOfDivisionsId[] = DB::table('positions')->insertGetId(
                ['order_level' => 7, 'name' => $head, 'role_name' => 'head_of_division', 'division_id' => $divisionsId[$n]]
            );

            $n++;
        }

        $divisionStaffs = [
            'Anggota Bidang Kerohanian', 'Anggota Bidang Kewirausahaan', 'Anggota Bidang Minat dan Bakat',
            'Anggota Bidang IT', 'Anggota Bidang Pengabdian Masyarakat', 'Anggota Bidang PSDM'
        ];

        $n = 0;
        foreach ($divisionStaffs as $staff) {
            DB::table('positions')->insert([
                'order_level' => 8, 'name' => $staff, 'role_name' => 'staff', 'division_id' => $divisionsId[$n], 'parent_id' => $headOfDivisionsId[$n]
            ]);

            $n++;
        }

        /**
         * Membuat user dummy
         * 
         * User yang dibuat:
         * - Super admin
         * - Pembina
         * - Sekretaris
         */
        $superAdminId = DB::table('users')->insertGetId([
            'name' => 'Super Admin', 'email' => 'super.admin@default.test', 'password' => Hash::make('12345678'), 'created_at' => date('Y-m-d H:i:s')
        ]);
        $builderId = DB::table('users')->insertGetId([
            'name' => 'Pembina '. getSetting('organizationName'), 'email' => 'pembina@default.test', 'password' => Hash::make('12345678'), 'created_at' => date('Y-m-d H:i:s')
        ]);

        User::find($superAdminId)->assignRole('super_admin');
        User::find($builderId)->assignRole('builder');

        $secretaryId = DB::table('users')->insertGetId([
            'name' => 'Sekretaris', 'email' => 'sekretaris@default.test', 'password' => Hash::make('12345678'), 'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('members')->insert([
            ['user_id' => $secretaryId, 'name' => 'Sekretaris']
        ]);
        User::find($secretaryId)->assignRole('secretary');

        DB::table('staff')->insert([
            ['period_id' => $periodId, 'position_id' => $builderPositionId, 'user_id' => $builderId],
            ['period_id' => $periodId, 'position_id' => $secretaryPositionId, 'user_id' => $secretaryId],
        ]);
    }
}
