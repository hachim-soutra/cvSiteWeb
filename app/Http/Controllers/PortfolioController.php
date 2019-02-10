<?php

namespace App\Http\Controllers;

use App\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{ 
    public function addprojet(Request $request)
    {
        $exp = new Portfolio();
        $exp->title = $request->title;
        $exp->presentation = $request->body;
        $exp->cv_id = $request->cv_id;
        $exp->save();
        return Response()->json(['etat' => true, 'id' =>$exp->id]);
    }

    
    
    public function updateprojet(Request $request)
    {
        $exp = Portfolio::find( $request->id);
        $exp->title = $request->title;
        $exp->presentation = $request->body;
        $exp->cv_id = $request->cv_id;
        $exp->save();
        return Response()->json(['etat' => true, 'id' =>$exp->id]);
    }

   
    public function deleteprojet($id)
    {
        $exp = Portfolio::find($id);
        $exp->delete();
        return Response()->json(['etat' => true]);
    }
}
