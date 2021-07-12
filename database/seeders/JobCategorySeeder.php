<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\JobPostCategory;
use Illuminate\Database\Seeder;

class JobCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            ['type'=>'job_category','name'=> 'Accounting and Finance', 'title' => 'Accounting and Finance', 'parent_id' => 0, 'sort_no'=>0, 'status'=> 1,'in_header'=>0],
            ['type'=>'job_category','name'=> 'Clerical & Data Entry', 'title' => 'Clerical & Data Entry', 'parent_id' => 0, 'sort_no'=>0, 'status'=> 1,'in_header'=>0],
            ['type'=>'job_category','name'=> 'Counseling', 'title' => 'Counseling', 'parent_id' => 0, 'sort_no'=>0, 'status'=> 1,'in_header'=>0],
            ['type'=>'job_category','name'=> 'Court Administration', 'title' => 'Court Administration', 'parent_id' => 0, 'sort_no'=>0, 'status'=> 1,'in_header'=>0],
            ['type'=>'job_category','name'=> 'Human Resources', 'title' => 'Human Resources', 'parent_id' => 0, 'sort_no'=>0, 'status'=> 1,'in_header'=>0],
            ['type'=>'job_category','name'=> 'Investigative', 'title' => 'Investigative', 'parent_id' => 0, 'sort_no'=>0, 'status'=> 1,'in_header'=>0],
            ['type'=>'job_category','name'=> 'IT and Computers', 'title' => 'IT and Computers', 'parent_id' => 0, 'sort_no'=>0, 'status'=> 1,'in_header'=>0],
            ['type'=>'job_category','name'=> 'Law Enforcement', 'title' => 'Law Enforcement', 'parent_id' => 0, 'sort_no'=>0, 'status'=> 1,'in_header'=>0],
            ['type'=>'job_category','name'=> 'Management', 'title' => 'Management', 'parent_id' => 0, 'sort_no'=>0, 'status'=> 1,'in_header'=>0],
            ['type'=>'job_category','name'=> 'Miscellaneous', 'title' => 'Miscellaneous', 'parent_id' => 0, 'sort_no'=>0, 'status'=> 1,'in_header'=>0],
            ['type'=>'job_category','name'=> 'Public Relations', 'title' => 'Public Relations', 'parent_id' => 0, 'sort_no'=>0, 'status'=> 1,'in_header'=>0],
        ]);
    }
}
