<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;

use Illuminate\Support\Facades\Storage;

use App\Models\Article;

class ArticlesController extends Controller
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
        return view("articles.article_index", ["articles"=>Article::orderByDesc('created_at')->get()]);
    
        $arts = Article::orderByDesc('created_at')->get();
 
        return view('plt.index', ['articles' => $arts]);
    }

        /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show (Article $article)
    {
       
        /*$art = DB::table('articles')
                ->where('id', '=', $id)
                ->first();
        */
        return view('articles.article_show', ["article" => $article, ]);

       /* $article = Article::findOrFail($id);
        
        return view('plt.article', compact ('article'));// ->with ('art', $art); */
    }
  /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create ()
    {
      //DMM return view('plt.articlenew');
      return view ('articles.article_create');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Nivel $nivel
     * @return \Illuminate\Http\Response
     */
    public function edit (Article $article)
    {
        return view("articles.article_edit", ["article" => $article, ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Nivel $nivel
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        
       
        $article->fill($request->input());
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store ('public/articles');
            $article->img = Storage::url ($path);
        }

        $article->saveOrFail();
        return redirect()->route("articles.index")->with(["mensaje" => "Artículo actualizado"]);
    }

   /**
   * Ship the given order.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
    public function store (ArticleRequest $request) {
        try {
           
            $path = $request->file('file')->store ('public/articles');
      

            $article = new Article($request->input());
            $article->img = Storage::url ($path);
            $article->saveOrFail();
            return redirect()->route("articles.index")->with(["mensaje" => "Artículo creado",]);

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
    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Nivel $nivel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route("articles.index")->with(["mensaje" => "Artículo eliminado",]);
    }
}


