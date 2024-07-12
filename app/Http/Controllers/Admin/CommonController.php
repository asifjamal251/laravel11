<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\ClientPlate;
use App\Models\JobType;
use App\Models\PlateStock;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CommonController extends Controller{

    public function plateSizeStock(Request $request, $id)
    {
        $plate_stock = PlateStock::find($id);
        if($plate_stock != ''){
            return response()->json(['error' => false, 'datas' => $plate_stock]);
        }
        return response()->json(['error' => true, 'datas' => null]);
    }
  

    public function PlateSize(Request $request, $client){
        if ($request->ajax()) {
            $page = $request->page;
            $resultCount = 5;
    
            $offset = ($page - 1) * $resultCount;
    
            $quality = ClientPlate::where('plate_size', 'LIKE', '%' . $request->term. '%')
                                    ->where('client_id', $client)
                                    ->orderBy('created_at', 'asc')
                                    ->skip($offset)
                                    ->take($resultCount)
                                    ->selectRaw('id, plate_size as text')
                                    ->get();
    
            $count = Count(ClientPlate::where('plate_size', 'LIKE', '%' . $request->term. '%')
                                    ->where('client_id', $client)
                                    ->orderBy('created_at', 'asc')
                                    ->selectRaw('id, plate_size as text')
                                    ->get());
    
            $endCount = $offset + $resultCount;
            $morePages = $count > $endCount;
    
            $results = array(
                  "results" => $quality,
                  "pagination" => array(
                      "more" => $morePages
                  )
              );
    
            return response()->json($results);
        }
        return response()->json('oops');
    }


       
    public function clients(Request $request){
        if ($request->ajax()) {
            $page = $request->page;
            $resultCount = 5;
    
            $offset = ($page - 1) * $resultCount;
    
            $quality = Client::where('company_name', 'LIKE', '%' . $request->term. '%')
                                    ->orderBy('created_at', 'asc')
                                    ->skip($offset)
                                    ->take($resultCount)
                                    ->selectRaw('id, company_name as text')
                                    ->get();
    
            $count = Count(Client::where('company_name', 'LIKE', '%' . $request->term. '%')
                                    ->orderBy('created_at', 'asc')
                                    ->selectRaw('id, company_name as text')
                                    ->get());
    
            $endCount = $offset + $resultCount;
            $morePages = $count > $endCount;
    
            $results = array(
                  "results" => $quality,
                  "pagination" => array(
                      "more" => $morePages
                  )
              );
    
            return response()->json($results);
        }
        return response()->json('oops');
    }
    


    public function clientPlateSize(Request $request, $jobType, $client){
        if ($request->ajax()) {
            $page = $request->page;
            $resultCount = 5;
    
            $offset = ($page - 1) * $resultCount;
    
            $quality = ClientPlate::where('plate_size', 'LIKE', '%' . $request->term. '%')
                                    ->where('client_id', $client)
                                    ->whereIn('job_type_id', [$jobType])
                                    ->orderBy('created_at', 'asc')
                                    ->skip($offset)
                                    ->take($resultCount)
                                    ->selectRaw('id, plate_size as text')
                                    ->get();
    
            $count = Count(ClientPlate::where('plate_size', 'LIKE', '%' . $request->term. '%')
                                    ->where('client_id', $client)
                                    ->whereIn('job_type_id', [$jobType])
                                    ->orderBy('created_at', 'asc')
                                    ->selectRaw('id, plate_size as text')
                                    ->get());
    
            $endCount = $offset + $resultCount;
            $morePages = $count > $endCount;
    
            $results = array(
                  "results" => $quality,
                  "pagination" => array(
                      "more" => $morePages
                  )
              );
    
            return response()->json($results);
        }
        return response()->json('oops');
    }




    public function clientJobType(Request $request, $id){
        if ($request->ajax()) {

            $job_type_ids = ClientPlate::where('client_id', $id)->pluck('job_type_id');
            $page = $request->page;
            $resultCount = 5;
    
            $offset = ($page - 1) * $resultCount;
    
            $quality = JobType::where('job_type', 'LIKE', '%' . $request->term. '%')
                                    ->whereIn('id', $job_type_ids)
                                    ->orderBy('created_at', 'asc')
                                    ->skip($offset)
                                    ->take($resultCount)
                                    ->selectRaw('id, job_type as text')
                                    ->get();
    
            $count = Count(JobType::where('job_type', 'LIKE', '%' . $request->term. '%')
                                    ->whereIn('id', $job_type_ids)
                                    ->orderBy('created_at', 'asc')
                                    ->selectRaw('id, job_type as text')
                                    ->get());
    
            $endCount = $offset + $resultCount;
            $morePages = $count > $endCount;
    
            $results = array(
                  "results" => $quality,
                  "pagination" => array(
                      "more" => $morePages
                  )
              );
    
            return response()->json($results);
        }
        return response()->json('oops');
    }



}