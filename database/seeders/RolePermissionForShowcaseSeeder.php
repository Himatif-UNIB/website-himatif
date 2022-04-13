<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionForShowcaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['name' => 'create_showcase', 'label' => 'Create Showcase'],
            ['name' => 'read_showcase', 'label' => 'Read Showcase'],
            ['name' => 'update_showcase', 'label' => 'Update Showcase'],
            ['name' => 'delete_showcase', 'label' => 'Delete Showcase'],
        ];

        foreach ($permissions as $item => $permission) {
            Permission::create([
                'name' => $permission['name'],
                'label' => $permission['label']
            ]);
        }

        $superAdminRole = Role::findByName('super_admin');
        $superAdminRole->givePermissionTo([
            Permission::findByName('create_showcase'),
            Permission::findByName('read_showcase'),
            Permission::findByName('update_showcase'),
            Permission::findByName('delete_showcase'),
        ]);
        
        $dpoRole = Role::findByName('dpo');
        $dpoRole->givePermissionTo([
            Permission::findByName('create_showcase'),
            Permission::findByName('read_showcase'),
            Permission::findByName('update_showcase'),
            Permission::findByName('delete_showcase'),

            Permission::findByName('create_form'), Permission::findByName('update_form'), Permission::findByName('delete_form'),
        ]);

        $bpoRole = Role::findByName('bpo');
        $bpoRole->givePermissionTo([
            Permission::findByName('create_showcase'),
            Permission::findByName('read_showcase'),
            Permission::findByName('update_showcase'),
            Permission::findByName('delete_showcase'),

            Permission::findByName('create_form'), Permission::findByName('update_form'), Permission::findByName('delete_form'),
        ]);

        $chairmanRole = Role::findByName('chairman');
        $chairmanRole->givePermissionTo([
            Permission::findByName('create_showcase'),
            Permission::findByName('read_showcase'),
            Permission::findByName('update_showcase'),
            Permission::findByName('delete_showcase'),

            Permission::findByName('create_form'), Permission::findByName('update_form'), Permission::findByName('delete_form'),
        ]);

        $viceChairmanRole = Role::findByName('vice_chairman');
        $viceChairmanRole->givePermissionTo([
            Permission::findByName('create_showcase'),
            Permission::findByName('read_showcase'),
            Permission::findByName('update_showcase'),
            Permission::findByName('delete_showcase'),

            Permission::findByName('create_form'), Permission::findByName('update_form'), Permission::findByName('delete_form'),
        ]);

        $secretaryRole = Role::findByName('secretary');
        $secretaryRole->givePermissionTo([
            Permission::findByName('create_showcase'),
            Permission::findByName('read_showcase'),
            Permission::findByName('update_showcase'),
            Permission::findByName('delete_showcase'),
        ]);

        $treasurerRole = Role::findByName('treasurer');
        $treasurerRole->givePermissionTo([
            Permission::findByName('create_showcase'),
            Permission::findByName('read_showcase'),
            Permission::findByName('update_showcase'),
            Permission::findByName('delete_showcase'),

           Permission::findByName('update_form'), Permission::findByName('delete_form'),
        ]);

        $headOfDivisionRole = Role::findByName('head_of_division');
        $headOfDivisionRole->givePermissionTo([
            Permission::findByName('create_showcase'),
            Permission::findByName('read_showcase'),
            Permission::findByName('update_showcase'),
            Permission::findByName('delete_showcase'),
        ]);

        $staffRole = Role::findByName('staff');
        $staffRole->givePermissionTo([
            Permission::findByName('create_showcase'),
            Permission::findByName('read_showcase'),
            Permission::findByName('update_showcase'),
            Permission::findByName('delete_showcase'),

            Permission::findByName('create_form'), Permission::findByName('read_form'), Permission::findByName('update_form'), Permission::findByName('delete_form'),
        ]);

        $memberRole = Role::findByName('member');
        $memberRole->givePermissionTo([
            Permission::findByName('create_showcase'),
            Permission::findByName('read_showcase'),
            Permission::findByName('update_showcase'),
            Permission::findByName('delete_showcase'),

            Permission::findByName('create_archive'), Permission::findByName('read_archive'),  Permission::findByName('update_archive'),  Permission::findByName('delete_archive'),
            Permission::findByName('create_form'), Permission::findByName('read_form'), Permission::findByName('update_form'), Permission::findByName('delete_form'),
        ]);
    }
}
