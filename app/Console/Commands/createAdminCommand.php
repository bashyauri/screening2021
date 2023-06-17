<?php

namespace App\Console\Commands;

use App\Models\Admin;
use App\Models\Department;
use App\Models\Role;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class createAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admins:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new admin user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $admin['name'] = $this->ask("Name of the User");
        $admin['email'] = $this->ask("Email of the admin User");
        $admin['password'] = Hash::make($this->secret("Password of the admin User"));

        $roleName = $this->choice("Role of the new User",['admin','superadmin'],'admin');
        $role = Role::where(['name'=>$roleName])->first();
        if(!$role){
            $this->error("Role Not found");
            return -1;
        }
        $departments = Department::pluck('department_name', 'id')->toArray();
        $departmentName = $this->choice("Department of the new User", $departments);
        $department = Department::where(['department_name' => $departmentName])->first();

        if(!$department){
            $this->error("Department Not found");
            return -1;
        }
        $admin['department_id'] = $department->id;
        $newAdminUser =DB::transaction(function() use($admin,$role){
            Admin::create($admin)->roles()->attach($role->id);


        });

        $this->info("Admin User {$admin['email']} created successfully");
        return 0;
    }
}
