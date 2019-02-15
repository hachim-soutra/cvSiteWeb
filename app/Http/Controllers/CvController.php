<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Auth;
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
        $cv->user_id  = Auth::user()->id;
        $cv->save();
        session()->flash('succes','le CV bien enregistré !!!');
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
        $cv =  Cv::find($id);
        
        if($cv->user_id  === Auth::user()->id){
            return view('cv.show',['id' => $id]);
        }
        else{
            return view('cv.admin',['id' => $id]);
        }
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
        $url  = $request->imgUpload1->store('img');
        $cv->photo  = $url;
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
        $this->authorize('delete' , $cv);
        $cv->delete();
        return redirect('cvs');
    }
    public function getdata($id){
        $cv = Cv::find($id);

        $experiences = $cv->experiences()->orderBy('debut','desc')->get();
        $formations = $cv->formations()->orderBy('debut','desc')->get();
        $competences = $cv->competences()->orderBy('updated_at','desc')->get();
        $projets = $cv->projets()->orderBy('updated_at','desc')->get();
        
        return Response()->json([
            'experiences' => $experiences,
            'formations'  => $formations,
            'competences' => $competences,
            'projets'     =>  $projets,
            ]);
    }
  
}
