<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Activitylog\ActivitylogCollection;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ActivitylogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       //return  Activity::orderBy('created_at','desc')->with('causer')->get();
        if ($request->wantsJson()) {
            $datas = Activity::orderBy('created_at','desc')->with('causer');
            
            $search = $request->search['value'];
            if ($search) {
                $datas->where('slug', 'like', '%'.$search.'%');
                $datas->orWhere('name', 'like', '%'.$search.'%');
              
            }


            $getDate = request()->input('datefilter');
            if($getDate != '' && $getDate != 'All'){ //|| $getDate != 'all' || $getDate != 'All'
                $filterDate = explode(' - ', $getDate);
                $startDate = Carbon::parse($filterDate[0])->format('Y-m-d');
                $endDate = Carbon::parse($filterDate[1])->format('Y-m-d');

                $datas->when($getDate != '', function ($query) use ($startDate, $endDate) {
                    $query->whereBetween('created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59']);
                });
            }

            if($request->log_name != ''){
                $datas->when($request->log_name != '', function ($query) use ($request) {
                    $query->where('log_name', $request->log_name);
                });
            }


            if($request->event != ''){
                $datas->when($request->event != '', function ($query) use ($request) {
                    $query->where('event', $request->event);
                });
            }


            $request->merge(['recordsTotal' => $datas->count(), 'length' => $request->length]);
            $datas = $datas->limit($request->length)->offset($request->start)->get();
            return response()->json(new ActivitylogCollection($datas));
           
        }

        return view('admin.activity-log.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request )
    {
        return view('admin.Activitylog.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id )
    {   
        $log = Activity::orderBy('created_at','desc')->where('id', $id)->with('causer')->first();
        return view('admin.activity-log.view', compact('log'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        public function store(Request $request) {

            $this->validate($request,[
                'name'=>'required',    
            ]);

            $Activitylog = new Activitylog;
            $Activitylog->name = $request->name;
            if($Activitylog->save()){ 
                return response()->json(['class'=>'success','message'=>'Activitylog Created Successfuly.']);
            }
            return response()->json(['class'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
            return redirect()->back()->with(['class'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
        }
        
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Activitylog $Activitylog)
    {
        return response()->json(['class'=>'success','message'=>'Record Founded','data'=>$Activitylog]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activitylog $Activitylog)
    {
        $this->validate($request,[
                'name'=>'required',    
            ]);

            $Activitylog->name = $request->name;
            if($Activitylog->save()){ 
                return response()->json(['class'=>'success','message'=>'Activitylog Updated Successfuly.']);
            }

            return redirect()->back()->with(['class'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Activitylog $Activitylog)
    {
        if($Activitylog->delete()){
            return response()->json(['message'=>'Activitylog deleted Successfully ...', 'class'=>'success']);  
        }
        return response()->json(['message'=>'Whoops, looks like something went wrong ! Try again ...', 'class'=>'error']);
    }
}
