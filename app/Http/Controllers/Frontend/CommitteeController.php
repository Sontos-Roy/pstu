<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AcademicCouncil;
use App\Models\FinanceCommittee;
use App\Models\PlanningWorkCommittee;
use App\Models\RegentBoard;
use Illuminate\Http\Request;

class CommitteeController extends Controller
{
    function regentBoard(){
        $this->data['name'] = "Regent Board Members";
        $this->data['members'] = RegentBoard::all();

        return view('frontend.committee', $this->data);
    }
    function planningWorkCommittee(){
        $this->data['name'] = "Planning Work Committee Members";
        $this->data['members'] = PlanningWorkCommittee::all();

        return view('frontend.committee', $this->data);
    }
    function financeCommittee(){
        $this->data['name'] = "Finance Committee Members";
        $this->data['members'] = FinanceCommittee::all();

        return view('frontend.committee', $this->data);
    }
    function academicCouncil(){
        $this->data['name'] = "Academic Council Members";
        $this->data['members'] = AcademicCouncil::all();

        return view('frontend.committee', $this->data);
    }
}
