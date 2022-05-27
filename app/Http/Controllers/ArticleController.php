<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public $arts =  array ();
public function __construct()
{
    array_push ($this->arts, array (1, 'Titulo artículo 1', 'Este sería el contenido de artículo 1 que no es muy largo'));
    array_push ($this->arts, array (2, 'Titulo artículo 2', 'Este sería el contenido de artículo 2 que es el siguiente'));
    array_push ($this->arts, array (3, 'Titulo artículo 3', 'Este sería el contenido de artículo 3 que es la suma de los dos anteriores'));
    array_push ($this->arts, array (5, 'Titulo artículo 5', 'Este sería el contenido de artículo 5 que sigue la numeración de Fibonacci'));
    array_push ($this->arts, array (8, 'Titulo artículo 8', 'Este sería el contenido de artículo 8 que ya es el último'));
    
}


        /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('plt.index')->with ('arts', $this->arts);
    }

        /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show ($id)
    {
        $art = null;
        $i = 0;
        while (($art == null) && ($i < sizeof($this->arts))) {
            if ($this->arts[$i][0] == $id) {
                $art = $this->arts[$i];
            }
            $i++;
        }
        return view('plt.article')->with ('arts', $art);
    }
}
