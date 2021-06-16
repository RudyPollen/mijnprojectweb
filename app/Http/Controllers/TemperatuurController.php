<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Dagmeting;
use App\Maanden;
use App\Nieuwsbrief;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class TemperatuurController extends Controller
{
    public function index()
    {
        return view('selecteer', array('maandnamen'=>Maanden::namen()));
    }
    public function detail(Request $request)
    {
        $request->validate(
            ['maand' => 'bail|required|between:1,12|int']
        );
        if ($request->fails()) {
            Log::error ('validatie fout: ', $request->all());
            return redirect('/');
        }
        $maand = $request->input('maand',1);
        $metingen = Dagmeting::where('maandnr', $maand)->orderBy('dagnr', 'asc')->get();
        return view('overzicht', array('maand'=>$maand, 'metingen'=>$metingen, 'maandnamen'=>Maanden::namen()));
    }
    public function contact()
    {
        return view('contact');
    }
    public function nieuwsbrief(Request $request2)
    {
         $request2->Validator::make($request2->all(), [
            'emailadres' => 'bail|required|email'
        ]);
        if ($request2->fails()) {
            Log::error ('Er is iets fout gegaan in de validatie: ', $request2->all());
            return redirect('/');
        }
        $nieuwsbrief = new Nieuwsbrief();
        $nieuwsbrief->mailadres = $request2->input('emailadres');
        $nieuwsbrief->save();
        return view('bedankt');
    }


}

