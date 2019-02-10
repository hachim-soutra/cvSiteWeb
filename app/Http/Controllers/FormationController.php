<?php

namespace App\Http\Controllers;

use App\Formation;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    
    public function addformation(Request $request)
    {
        $exp = new Formation();
        $exp->college = $request->college;
        $exp->body = $request->body;
        $exp->diplome = $request->diplome;
        $exp->debut = $request->debut;
        $exp->fin = $request->fin;
        $exp->cv_id = $request->cv_id;
        $exp->save();
        return Response()->json(['etat' => true, 'id' =>$exp->id]);
    }

    
    
    public function updateformation(Request $request)
    {
        
        $exp = Formation::find( $request->id);
        
        $exp->college = $request->college;
        $exp->body = $request->body;
        $exp->diplome = $request->diplome;
        $exp->debut = $request->debut;
        $exp->fin = $request->fin;
        $exp->cv_id = $request->cv_id;
        $exp->save();
        return Response()->json(['etat' => true, 'id' =>$exp->id]);
    }

   
    public function deleteformation($id)
    {
        $exp = Formation::find($id);
        $exp->delete();
        return Response()->json(['etat' => true]);
    }
}
