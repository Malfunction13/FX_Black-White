<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function calendar() {

        return view('calendar.fxCalendar');
    }
}
