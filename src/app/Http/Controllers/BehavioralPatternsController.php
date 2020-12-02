<?php

namespace App\Http\Controllers;


use App\DesignPatterns\Behavioral\Strategy\SalaryManager;
use App\Models\User;
use Illuminate\Support\Carbon;

class BehavioralPatternsController extends Controller
{

    public function Strategy()
    {
//        $name = 'Стратегия';

        $period = [
            Carbon::now()->subMonth()->startOfMonth(),
            Carbon::now()->subMonth()->endOfMonth()
        ];
        $users = User::all();

        $result = (new SalaryManager($period, $users))->handle();

        \Debugbar::info($result);

        return view('welcome', ['pattern' => 'Strategy']);
    }
}
