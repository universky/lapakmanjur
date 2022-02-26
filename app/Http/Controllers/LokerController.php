<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Job;
use Illuminate\Http\Request;

class LokerController extends Controller
{
    public function index()
    {
        $jobs = Job::with('companies')->get();
        return view('loker.index', [
            'jobs' => $jobs
        ]);
    }

    public function detail($id)
    {
        $jobs = Job::where('id', $id)->with('companies')->first();


        return view('loker.detail', [
            'jobs' => $jobs
        ]);
    }
}
