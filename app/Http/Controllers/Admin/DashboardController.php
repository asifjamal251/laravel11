<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Cutting;
use App\Models\DieCutting;
use App\Models\Dominant;
use App\Models\Embossing;
use App\Models\FirstHeidelberg;
use App\Models\Lamination;
use App\Models\Leafing;
use App\Models\SecondHeidelberg;
use App\Notifications\ChallanCreated;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use OpenAI\Laravel\Facades\OpenAI;


class DashboardController extends Controller
{
    public function index(Request $request)
    {
        //whatsappMessage();
        
        return view('admin.dashboard');
    }

    public function filter(Request $request)
    {
        $todayDate = Carbon::now()->format('Y-m-d');
        $startDate = $todayDate;
        $endDate = $todayDate;
        $getDate = request()->input('datefilter');

        if($getDate != ''){
            $filterDate = explode(' - ', $getDate);
            $startDate = Carbon::parse($filterDate[0])->format('Y-m-d');
            $endDate = Carbon::parse($filterDate[1])->format('Y-m-d'); 
        }
        
        
        $cutting_total = DB::table('cuttings')
        ->join('projects', 'cuttings.project_id', '=', 'projects.id')
        ->whereBetween('cuttings.updated_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
        ->where('cuttings.status', 1)
        ->sum('projects.total_sheet');
        
        $first_heidelberg_total = DB::table('first_heidelbergs')
        ->join('projects', 'first_heidelbergs.project_id', '=', 'projects.id')
        ->whereBetween('first_heidelbergs.updated_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
        ->where('first_heidelbergs.status', 1)
        ->sum('projects.total_sheet');
        
        
        $second_heidelberg_total = DB::table('second_heidelbergs')
        ->join('projects', 'second_heidelbergs.project_id', '=', 'projects.id')
        ->whereBetween('second_heidelbergs.updated_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
        ->where('second_heidelbergs.status', 1)
        ->sum('projects.total_sheet');
        
        
         $dominant_total = DB::table('dominants')
        ->join('projects', 'dominants.project_id', '=', 'projects.id')
        ->whereBetween('dominants.updated_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
        ->where('dominants.status', 1)
        ->sum('projects.total_sheet');



         $lamination_total = DB::table('laminations')
        ->join('projects', 'laminations.project_id', '=', 'projects.id')
        ->whereBetween('laminations.updated_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
        ->where('laminations.status', 1)
        ->sum('projects.total_sheet');



        $embossing_total = DB::table('embossings')
        ->join('projects', 'embossings.project_id', '=', 'projects.id')
        ->whereBetween('embossings.updated_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
        ->where('embossings.status', 1)
        ->sum('projects.total_sheet');


       $leafing_total = DB::table('leafings')
        ->join('projects', 'leafings.project_id', '=', 'projects.id')
        ->whereBetween('leafings.updated_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
        ->where('leafings.status', 1)
        ->sum('projects.total_sheet');



        $die_cutting_total = DB::table('die_cuttings')
        ->join('projects', 'die_cuttings.project_id', '=', 'projects.id')
        ->whereBetween('die_cuttings.updated_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
        ->where('die_cuttings.status', 1)
        ->sum('projects.total_sheet');

        return view('admin.dashboard-ajax', compact('cutting_total', 'first_heidelberg_total', 'second_heidelberg_total', 'dominant_total', 'lamination_total', 'embossing_total', 'leafing_total', 'die_cutting_total'));
  
        return view('admin.dashboard-ajax', compact('cutting', 'first_heidelberg', 'second_heidelberg', 'dominant', 'lamination', 'embossing', 'leafing', 'die_cutting', 'startDate', 'endDate','cutting_total', 'first_heidelberg_total','second_heidelberg_total'));
    }
   
    public function chatGPT(Request $request){

        return view('admin.dashboard');
    }

    
    
}
