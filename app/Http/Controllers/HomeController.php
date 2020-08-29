<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Faker\Generator as Faker;

class HomeController extends Controller
{
    public function index(Faker $faker) {
        $now = Carbon::now();
        $packages = Package::where('status_id', status(config('status.active')))->get();
        return view('index', compact('faker', 'now', 'packages'));
    }
}
