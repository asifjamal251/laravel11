<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\Media\MediaCollection;
use App\Models\Media;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        if ($request->ajax()) {
            $datas = Media::orderBy('created_at', 'desc')->select('id','file','type','name','original_name','size');
            $totaldata = $datas->count();

            $search = $request->search['value'];

            if ($search) {
                $datas->where('name', 'like', '%'.$search.'%');
            }
            
            $request->merge(['recordsTotal' => $datas->count(), 'length' => $request->length]);
            $datas = $datas->limit($request->length)->offset($request->start)->get();
            return response()->json(new MediaCollection($datas));
           
        }
        return view('admin.media.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request )
    {
        return view('admin.media.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request )
    {   
       
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        public function store(Request $request) {

            $this->validate($request,[
                // 'title'=>'required',
                // 'sub_title'=>'required',
                // 'button_text'=>'required',
                // 'button_link'=>'required',
               // 'image' => 'required|image|mimes:jpeg,png,jpg|max:4000',    
            ]);

            $media = new Media;

            
            


            if($request->hasFile('file')){

                $bytes = $request->file('file')->getSize();

                $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];
                for ($i = 0; $bytes > 1024; $i++) $bytes /= 1024;
                $media_size = round($bytes, 2) . ' ' . $units[$i];

                //return number_format($request->file('file')->getSize() / 1048576,2);

                $media_org = $request->file('file')->getClientOriginalName();

                $media_name = pathinfo($media_org, PATHINFO_FILENAME);


                $media_ext = $request->file('file')->getClientOriginalExtension();
                
                $media_handle = Str::slug($media_name, '-');
                

                $media->name = $media_name;
                $media->original_name = $media_org;
                $media->type = $media_ext;
                $media->handle = $media_handle;
                $media->size = $media_size;
            }  

            if($media->save()){ 

                $media_rename = $media->slug.".".$request->file('file')->getClientOriginalExtension();
                $image = $request->file('file')->storeAs('media', $media_rename);
                $media->file = 'https://d1pq24iuvdf5vg.cloudfront.net/'.$image;
                $media->save();


                return response()->json(['success'=>true, 'message'=>'File Uploaded Successfully', 'class'=>'success']);
            }

            return redirect()->back()->with(['class'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
        }
        
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Slider $slider)
    {
        return view('admin.slider.edit', compact('slider')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $this->validate($request,[
                // 'title'=>'required',
                // 'sub_title'=>'required',
                // 'button_text'=>'required',
                // 'button_link'=>'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:4000',    
            ]);
          
            $slider->title = $request->title;
            $slider->body = $request->description;
            $slider->button_text = $request->button_text;
            $slider->button_link = $request->button_link;
            $slider->status = $request->status;


            if($request->hasFile('image')){
                $image_name = time().".".$request->file('image')->getClientOriginalExtension();
                $image = $request->file('image')->storeAs('slider', $image_name);
                $slider->image = 'storage/'.$image;
            }  

            if($slider->save()){ 
                return redirect()->route('admin.slider.index')->with(['class'=>'success','message'=>'Slider Updated successfully.']);
            }

            return redirect()->back()->with(['class'=>'error','message'=>'Whoops, looks like something went wrong ! Try again ...']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Media $media)
    {
        if($media->delete()){
            
            return response()->json(['message'=>'Admin deleted successfully ...', 'class'=>'success']);  
        }
        return response()->json(['message'=>'Whoops, looks like something went wrong ! Try again ...', 'class'=>'error']);
    }



    public function getAllMediaSingle(Request $request){
        

        // if ($request->search != '') {
        //     $medias = Media::orderBy('created_at', 'desc')->where('name', 'like', '%'.$request->search.'%')->select('id', 'file', 'name')->paginate(10);
        // }
        // else{
        //     $medias = Media::orderBy('created_at', 'desc')->select('id', 'file', 'name')->paginate(10);
        // }

        $medias = Media::orderBy('created_at', 'desc')->when($request->has("search"),function($q)use($request){
            return $q->where("name","like","%".$request->get("search")."%");
        })->paginate(10);


        if ($request->ajax()) {

            $type = $request->opentype;

            return view('admin.media.ajax-list', compact('medias','type'));

            $html = '';

            if ($request->opentype == 'single') {
                foreach ($medias as $media) {
                    $current_page = $medias->currentPage();
                    $last_page = $medias->lastPage();
                    if($current_page == $last_page){
                        $html.='<li current="'.$current_page.'" last="'.$last_page.'" class="d-inline-block get-all-media">
                        <input type="radio" name="media[]" id="mediaid'.$media->id.'" value="'.$media->id.'"/><label for="mediaid'.$media->id.'" id="getmedia-'.$media->id.'"><img class="d-block" src="'.asset($media->file).'" alt="'.$media->name.'"></label></li><script>$(".no-more").show();$("#load-more-mediafiles").hide();</script>';
                    }
                    else{
                        $html.='<li current="'.$current_page.'" last="'.$last_page.'" class="d-inline-block get-all-media">
                        <input type="radio" name="media[]" id="mediaid'.$media->id.'" value="'.$media->id.'"/><label for="mediaid'.$media->id.'" id="getmedia-'.$media->id.'"><img class="d-block" src="'.asset($media->file).'" alt="'.$media->name.'"></label></li>';
                    }
                    
                }
            }
            else{
                foreach ($medias as $media) {
                    $current_page = $medias->currentPage();
                    $last_page = $medias->lastPage();
                    if($current_page == $last_page){
                        $html.='<li current="'.$current_page.'" last="'.$last_page.'" class="d-inline-block get-all-media">
                        <input type="checkbox" name="media[]" id="mediaid'.$media->id.'" value="'.$media->id.'"/><label for="mediaid'.$media->id.'" id="getmedia-'.$media->id.'"><img class="d-block" src="'.asset($media->file).'" alt="'.$media->name.'"></label></li><script>$(".no-more").show();$("#load-more-mediafiles").hide();</script>';
                    }
                    else{
                        $html.='<li current="'.$current_page.'" last="'.$last_page.'" class="d-inline-block get-all-media">
                        <input type="checkbox" name="media[]" id="mediaid'.$media->id.'" value="'.$media->id.'"/><label for="mediaid'.$media->id.'" id="getmedia-'.$media->id.'"><img class="d-block" src="'.asset($media->file).'" alt="'.$media->name.'"></label></li>';
                    }
                    
                }
            }

            


            return $html;
        }
        return view('admin.media.select-media-single');
    }



    public function getAllMediaMultiple(Request $request){
        $medias = Media::orderBy('created_at', 'desc')->select('id', 'file', 'name')->paginate(10);
        if ($request->ajax()) {
            $html = '';
            foreach ($medias as $media) {
                $current_page = $medias->currentPage();
                $last_page = $medias->lastPage();
                if($current_page == $last_page){
                    $html.='<li current="'.$current_page.'" last="'.$last_page.'" class="d-inline-block get-all-media">
                    <input type="checkbox" name="media[]" id="mediaid'.$media->id.'" value="'.$media->id.'"/><label for="mediaid'.$media->id.'" id="getmedia-'.$media->id.'"><img class="d-block" src="'.asset($media->file).'" alt="'.$media->name.'"></label></li><script>$(".no-more").show();$("#load-more-multiple").hide();</script>';
                }
                else{
                    $html.='<li current="'.$current_page.'" last="'.$last_page.'" class="d-inline-block get-all-media">
                    <input type="checkbox" name="media[]" id="mediaid'.$media->id.'" value="'.$media->id.'"/><label for="mediaid'.$media->id.'" id="getmedia-'.$media->id.'"><img class="d-block" src="'.asset($media->file).'" alt="'.$media->name.'"></label></li>';
                }
                
            }
            return $html;
        }
        return view('admin.media.select-media-multiple');
    }
}
