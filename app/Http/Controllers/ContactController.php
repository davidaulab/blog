<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ContactNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
       /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index ()
    {
       return view('plt.contact');
    }

   /**
   * Ship the given order.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

      try {
         Mail::to("david.martinez@aulab.es")->send(new ContactNotification($request->input("texto"), $request->input("email")));
         return back()->with("success", "Mensaje enviado correctamente");
      } catch (\Exception $exception) {
            return back()->with ("error", "Algo ha ido mal: " . $exception->getMessage());
      }
      

      
  }
}
