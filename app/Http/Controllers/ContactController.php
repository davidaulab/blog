<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactNotification;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
class ContactController extends Controller
{
       /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create ()
    {
       return view('plt.contact');
    }

   /**
   * Ship the given order.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(ContactRequest $request)
  {

     try {
      //$path = $request->file('file')->store('files', 'public');
      
      $path = $request->file('file')->store ('public/contacts');
      
      /*
      $name = $request->file('file')->getClientOriginalName();

      $request->file ('file')->fil
      ->move('files', $name);
*/
      
      DB::table('contacts')->insert ([
         'email' => $request->input("email"),
         'msg' => $request->input("text"),
         'img' => Storage::url ($path),
         'created_at' =>  \Carbon\Carbon::now(), 
         'updated_at' => \Carbon\Carbon::now() 
         
        ]);
         try {
            Mail::to("david.martinez@aulab.es")->send(new ContactNotification($request->input("text"), $request->input("email")));
            return back()->with("success", "Mensaje enviado correctamente");
         } catch (\Exception $exception) {
               return back()->with ("error", "Algo ha ido mal: " . $exception->getMessage());
         }
     } catch(\Illuminate\Database\QueryException $exception){ 
         return back()->with ("error", "Algo ha ido mal: " . $exception->getMessage());
     }
     
      /*try {
         Mail::to("david.martinez@aulab.es")->send(new ContactNotification($request->input("text"), $request->input("email")));
         return back()->with("success", "Mensaje enviado correctamente");
      } catch (\Exception $exception) {
            return back()->with ("error", "Algo ha ido mal: " . $exception->getMessage());
      }*/
      

      
  }

       /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $contacts = DB::table('contacts')->get();
 
      return view('plt.contacts', ['contacts' => $contacts]);

    }
    
}
