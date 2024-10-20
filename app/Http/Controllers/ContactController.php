<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactReply;
use App\Models\Contact;


class ContactController extends Controller
{
    public function index()
    {
        // Fetch all contacts from the database
        $contacts = Contact::all();

        // Pass the contacts data to the view
        return view('admin.contact', compact('contacts'));
    }
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|max:120',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'message' => 'required|max:500',
        ]);

        // Save contact data to the database
        Contact::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'message' => $request->input('message'),
        ]);

        return redirect()->back()->with('success', 'Your contact information has been submitted!');
    }
    public function replyForm($id)
    {
        // Fetch the contact data by ID
        $contact = Contact::findOrFail($id);
        return view('admin.reply', compact('contact'));
    }

    // Handle the reply submission
    public function sendReply(Request $request, $id)
    {
        // Validate the reply input
        $request->validate([
            'reply_message' => 'required'
        ]);
    
        // Fetch the contact data
        $contact = Contact::findOrFail($id);
        $replyMessage = $request->input('reply_message');
    
        // Send the reply via email
        Mail::to($contact->email)->send(new ContactReply($contact, $replyMessage));
    
        // Cập nhật trạng thái thành "Đã Phản Hồi"
        $contact->status = 'Đã Phản Hồi';
        $contact->save();
    
        return redirect()->route('admin.contact')->with('success', 'Phản hồi đã được gửi tới khách hàng!');
    }
    public function showForm()
    {
        return view('Sanpham.contact'); // Đảm bảo rằng bạn có view này
    }
}
