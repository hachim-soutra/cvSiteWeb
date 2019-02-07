<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Cv;
use App\Experience;
class CvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $listcv = Cv::all();
        return view('cv.index')->with('cvs' , $listcv);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cv.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cv               = new Cv();
        $cv->title        = $request->input('title');
        $cv->presentation = $request->input('text');
        /*if($request->hasFile('photo')){
            $cv->photo  = $request->photo->store('img');
        }*/
        $url  = $request->imgUpload1->store('img');
        $cv->photo  = $url;
        $cv->user_id      = Auth::user()->id;
        $cv->save();
        return redirect('cvs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('cv.show',['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cv =  Cv::find($id);
        $this->authorize('update' , $cv);
        return view('cv.edit',['cv' => $cv]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cv =  Cv::find($id);
        $cv->title = $request->input('title');
        $cv->presentation = $request->input('text');

        $cv->save();
        return redirect('cvs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cv =  Cv::find($id);
        $cv->delete();
        return redirect('cvs');
    }
    public function getExperiences($id){
        $cv = Cv::find($id);
        return $cv->experiences()->orderBy('debut','desc')->get();
    }
    public function addExperience(Request $request){
        $exp = new Experience;
        $exp->titre = $request->input('titre');
        $exp->description = $request->input('description');
        $exp->debut = $request->input('debut');
        $exp->fin = $request->input('fin');
        $exp->cv_id = $request->input('cv_id');
        $exp->save();
        
        return $exp;
    }
    public function updateExperience(Request $request)
    {
        $exp         = Experience::find($request->id);
        $exp->title  = $request->input('titre');
        $exp->body   = $request->input('description');
        $exp->fin    = $request->input('fin');
        $exp->debut  = $request->input('debut');
        $exp->save();
       
        return Response()->json(['etat' => true],200);
    }
}
