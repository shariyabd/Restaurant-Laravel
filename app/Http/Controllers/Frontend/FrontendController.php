<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Reservation;

class FrontendController extends Controller
{
   
        public function index()
        {
            return view('frontend.index');
        }
        public function story()
        {
            return view('frontend.modules.story');
        }
        public function menu()
        {
            return view('frontend.modules.menu ');
        }
        public function news()
        {
            return view('frontend.modules.news');
        }
        public function contact()
        {
            return view('frontend.modules.contact');
        }

        public function storeContact(Request $request)
        {
            $request->validate([
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'message' => 'required|max:1000', // Add a max validation rule
            ]); 
        
            // Check if the message exceeds the maximum allowed length
            $message = $request->input('message');
            if (strlen($message) > 1000) {
                return redirect()->back()->withInput()->withErrors(['message' => 'Please enter less than 1000 characters.']); // Redirect back with error message
            }
        
            $contact = new Contact();
            $contact->name = $request->input('name');
            $contact->phone = $request->input('phone');
            $contact->email = $request->input('email');
            $contact->message = $message;
            $contact->status = 'pending';
            $contact->save();
        
            return redirect()->back()->with('success', 'Form Submission Successful');
        }
        
        public function reservation(Request $request){

            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:reservations',
                'phone' => 'required',
                'num_persons' => 'required',
                'date' => 'required',
                'time' => 'required',
                'request_msg' => 'required',
                'status' => 'required',
            ]);

            $reservation = new Reservation();

            $reservation->name = $request->input('name');
            $reservation->email = $request->input('email');
            $reservation->phone = $request->input('phone');
            $reservation->num_persons = $request->input('num-persons');
            $reservation->date = $request->input('date');
            $reservation->time = $request->input('time');
            $reservation->request_msg = $request->input('request-msg');
            $reservation->status = 'pending';

            $reservation->save();
            return redirect()->back()->with('success', 'Reservation Submission Successful');
        }
    
}
