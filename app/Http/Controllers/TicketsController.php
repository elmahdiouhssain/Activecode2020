<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Category;
use App\User;
use App\Ticket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Mailers\AppMailer;

class TicketsController extends Controller
{
    //

    public function index(){
    $tickets = Ticket::paginate(10);
    $categories = Category::all();

    return view('seller.tickets', compact('tickets', 'categories'));
    }


    public function create(){
    $categories = Category::all();

    return view('seller.create_ticket', compact('categories'));
	}

	public function store(Request $request, AppMailer $mailer){

    $this->validate($request, [
            'title'     => 'required',
            'category'  => 'required',
            'priority'  => 'required',
            'message'   => 'required'
        ]);

        $ticket = new Ticket([
            'title'     => $request->input('title'),
            'user_id'   => Auth::user()->id,
            'ticket_id' => strtoupper(Str::random(10)),
            'category_id'  => $request->input('category'),
            'priority'  => $request->input('priority'),
            'message'   => $request->input('message'),
            'status'    => "Open",
        ]);

        $ticket->save();

        $mailer->sendTicketInformation(Auth::user(), $ticket);

        return redirect()->back()->with("success", "A ticket with ID: #$ticket->ticket_id has been opened.");


	}

	public function userTickets(){

    $tickets = Ticket::where('user_id', Auth::user()->id)->paginate(10);
    $categories = Category::all();

    //return view('seller.user_tickets', compact('tickets', 'categories'));
    return view('seller.tickets', compact('tickets', 'categories'));

	}

	
	public function show($ticket_id){
    $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();

    $comments = $ticket->comments;

    $category = $ticket->category;

    return view('seller.show', compact('ticket', 'category', 'comments'));
	}

    public function close($ticket_id, AppMailer $mailer){
    $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();

    $ticket->status = 'Closed';

    $ticket->save();

    $ticketOwner = $ticket->user;

    $mailer->sendTicketStatusNotification($ticketOwner, $ticket);

    return redirect()->back()->with("success", "The ticket has been closed.");
}






}
