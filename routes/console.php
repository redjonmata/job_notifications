<?php

use App\Category;
use App\Employer;
use App\Helpers\Helper;
use Illuminate\Support\Str;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::comand('insert-categories', function () {
    $categories = Employer::select('field')->get()->toArray();

    foreach ($categories as $category) {
        $result = Category::where('slug',Str::slug($category['field']))->count();

        if ($result == 0 && $category['field'] != '' && $category['field'] != '-' && Helper::trimNumber($category['field'])) {
            DB::table('categories')->insert([
                'name' => Helper::trimNumber($category['field']),
                'slug' => Str::slug(Helper::trimNumber($category['field']))
            ]);
        }
    }
});
