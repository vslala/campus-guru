<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();


        $categories = ["Education and Reference", "Entertainment and Music", "Environment", "Relationships",
            "Food & Drinks", "Games & Recreation", 'Science & Mathematics', "Computer Science", "Sports",
            "Travel", "Machinery", "Information Technology", "Civil", "Electricals and Electronics", "other"
        ];

        for($i=0; $i < count($categories); $i++)
        {
            $c = new \App\Category();
            $c->name = $categories[$i];
            $c->save();
        }
	}

    public function UserTableSeeder()
    {

    }

}
