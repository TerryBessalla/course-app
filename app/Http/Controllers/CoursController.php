<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Cours;
use App\Models\Episode;
use App\Http\Requests\CreateCoursRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CoursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cours=Cours::with('User')
        ->select('cours.*', DB::raw(
            '(SELECT COUNT(DISTINCT(user_id))
            FROM completion
            INNER JOIN episodes ON completion.episodes_id=episodes.id
            WHERE episodes.cours_id=cours.id)
         AS participant'
        ))
        ->orderBy('id','desc')
        ->withCount('episodes')->get();
        //dd($cours);
        return Inertia::render('cours/index',compact('cours'));
    }


    public function show($id)
    {
        $cours=Cours::whereId($id)->with("episodes")->first();
        $watched=auth()->user()->episodes;
        return Inertia::render('cours/show',compact('cours','watched'));

    }


    public function store(CreateCoursRequest $request)
    {
       
       $cours=Cours::create($request->all());

        foreach ($request->input('episodes') as $episode) {
            $episode['cours_id'] = $cours->id;
            Episode::create($episode);
        }
        
       return redirect()->route('dashboard')->with('success','Formation crée avec success');
    }

    public function progression(Request $request)
    {
        $id=$request->input('episodeId');
        $user=auth()->user();

        $user->episodes()->toggle($id);

        return $user->episodes;



    }
}

