<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Experience;
use App\Formation;
use App\Competence;
use App\Portfolio;

class ExperienceController extends Controller
{
    

    public function addExperience(Request $request)
    {
        $exp = new Experience();
        $exp->titre = $request->titre;
        $exp->body = $request->body;
        $exp->debut = $request->debut;
        $exp->fin = $request->fin;
        $exp->cv_id = $request->cv_id;
        $exp->save();
        return Response()->json(['etat' => true, 'id' =>$exp->id]);
    }

    
    
    public function updateExp(Request $request)
    {
        
        $exp = Experience::find( $request->id);
        
        $exp->titre = $request->titre;
        $exp->body = $request->body;
        $exp->debut = $request->debut;
        $exp->fin = $request->fin;
        $exp->cv_id = $request->cv_id;
        $exp->save();
        return Response()->json(['etat' => true, 'id' =>$exp->id]);
    }

   
    public function deleteexperiences($id)
    {
        $exp = Experience::find($id);
        $exp->delete();
        return Response()->json(['etat' => true]);
    }
}
