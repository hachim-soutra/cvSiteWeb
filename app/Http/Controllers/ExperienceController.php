<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Experience;


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

    
    
    public function updateExperience(Request $request)
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

   
    public function deleteExperience($id)
    {
        $exp = Experience::find($id);
        $exp->delete();
        return Response()->json(['etat' => true]);
    }
}
