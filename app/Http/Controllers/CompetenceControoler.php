<?php

namespace App\Http\Controllers;

use App\Competence;
use Illuminate\Http\Request;

class CompetenceControoler extends Controller
{

    public function addcompetence(Request $request)
    {
        $exp = new Competence();
        $exp->competences = $request->competence;
        $exp->cv_id = $request->cv_id;
        $exp->save();
        return Response()->json(['etat' => true, 'id' =>$exp->id]);
    }

    
    
    public function updatecompetence(Request $request)
    {
        
        $exp = Competence::find( $request->id);
        
        $exp->competences = $request->competence;
        $exp->cv_id = $request->cv_id;
        $exp->save();
        return Response()->json(['etat' => true, 'id' =>$exp->id]);
    }

   
    public function deletecompetence($id)
    {
        $exp = Competence::find($id);
        $exp->delete();
        return Response()->json(['etat' => true]);
    }
}
