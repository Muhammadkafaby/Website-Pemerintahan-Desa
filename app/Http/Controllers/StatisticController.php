<?php

namespace App\Http\Controllers;

use App\Models\Population;
use App\Models\Setting;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StatisticController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key');
        $gender = Population::select('gender', \DB::raw('count(*) as total'))->groupBy('gender')->get();
        $education = Population::select('education', \DB::raw('count(*) as total'))->groupBy('education')->get();
        $occupation = Population::select('occupation', \DB::raw('count(*) as total'))->groupBy('occupation')->get();
        $religion = Population::select('religion', \DB::raw('count(*) as total'))->groupBy('religion')->get();
        $age = Population::select(\DB::raw('
            CASE
                WHEN age < 17 THEN "0-17"
                WHEN age BETWEEN 17 AND 25 THEN "17-25"
                WHEN age BETWEEN 26 AND 35 THEN "26-35"
                WHEN age BETWEEN 36 AND 45 THEN "36-45"
                WHEN age BETWEEN 46 AND 55 THEN "46-55"
                ELSE "55+"
            END as age_range
        '), \DB::raw('count(*) as total'))->groupBy('age_range')->get();

        return Inertia::render('Statistics/Index', compact('settings', 'gender', 'education', 'occupation', 'religion', 'age'));
    }
}
