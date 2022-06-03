<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;

use Illuminate\Support\Facades\DB;
use App\Models\Article;

class ArticleController extends Controller
{

  
public function __construct()
{
      
}


        /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $arts = DB::table('articles')
        ->orderBy('created_at', 'desc')
        ->get(); */
        $arts = Article::orderByDesc('created_at')->get();
 
        return view('plt.index', ['arts' => $arts]);
    }

        /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show ($id)
    {
       
        /*$art = DB::table('articles')
                ->where('id', '=', $id)
                ->first();
        */
        $art = Article::where('id', $id )->first ();
        return view('plt.article')->with ('art', $art);
    }
  /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create ()
    {
       return view('plt.articlenew');
    }

   /**
   * Ship the given order.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
    public function store (ArticleRequest $request) {
        try {
           
            $name = $request->file('file')->getClientOriginalName();
      
            $path = $request->file('file')->move('files', $name);
      
            
            $mass = true;

            if ($mass == true) {
                $art = Article::create([
                        'titulo' => $request->input("titulo"), 
                        'texto' => $request->input("texto"), 
                        'img' => $path
                ]);
            }
            else {
                $art = new Article;
 
                $art->titulo = $request->input("titulo");
                $art->texto = $request->input("texto");
                $art->img = $path;
         
                $art->save();
    
            }
            

           /* DB::table('articles')->insert ([
               'titulo' => $request->input("titulo"),
               'texto' => $request->input("texto"),
               'img' => $path,
               'created_at' =>  \Carbon\Carbon::now(), 
               'updated_at' => \Carbon\Carbon::now() 
               
              ]); */
              return back()->with("success", "Artículo guardado correctamente"); 
           } catch(\Illuminate\Database\QueryException $exception){ 
               return back()->with ("error", "Algo ha ido mal: " . $exception->getMessage());
           }

    }
}


