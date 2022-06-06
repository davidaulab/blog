<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;

use Illuminate\Support\Facades\Storage;

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
        $article = Article::findOrFail($id);
        
        return view('plt.article', compact ('article'));// ->with ('art', $art);
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
           
            $path = $request->file('file')->store ('public/contacts');
      


            // mass storage
            /*
                $art = Article::create([
                        'title' => $request->input("title"), 
                        'text' => $request->input("text"), 
                        'img' => Storage::url ($path)
                ]);
                */
            

            $art = new Article;

            $art->title = $request->input("title");
            $art->text = $request->input("text");
            $art->img = Storage::url ($path);
        
            $art->save();
    

            

           /* DB::table('articles')->insert ([
               'title' => $request->input("title"),
               'text' => $request->input("text"),
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


