<?php

namespace App\Http\Controllers;

use App\Models\Sopd;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    private $rules = [
        'sopd_id' => 'required',
        'aduan' => 'required',
        'status' => 'required',
        'tanggalMasuk' => 'required',
    ];
    public function index()
    {
        $tickets = Ticket::all();
        return view('ticket.index', [
            'tickets' => $tickets
        ]);
    }

    public function aduan($status)
    {
        $tickets = Ticket::where('status', '=', $status)->get();
        return view('ticket.index', [
            'tickets' => $tickets,
            'status' => $status
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sopds = Sopd::all();
        return view('ticket.create', [
            'sopds' => $sopds,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate($this->rules);
        if ($request->keterangan) {
            $validatedData['keterangan'] = $request->keterangan;
        }
        if ($request->tanggalSelesai) {
            $validatedData['tanggalSelesai'] = $request->tanggalSelesai;
        }
        Ticket::create($validatedData);

        return redirect()->route('ticket-aduan', ['status' => $request->status])->with('success','Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        $sopds = Sopd::all();
        return view('ticket.edit', [
            'ticket' => $ticket,
            'sopds' => $sopds,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        $validatedData = $request->validate($this->rules);
        if ($request->keterangan) {
            $validatedData['keterangan'] = $request->keterangan;
        }
        if ($request->tanggalSelesai) {
            $validatedData['tanggalSelesai'] = $request->tanggalSelesai;
        }
        if ($request->tindak_lanjut) {
            $validatedData['tindak_lanjut'] = $request->tindak_lanjut;
        }
        Ticket::findOrFail($ticket->id)->update($validatedData);

        return redirect(route('ticket-aduan', ['status' => $request->status]))->with('success','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket, Request $request)
    {
        Ticket::destroy($ticket->id);
        return redirect(route('ticket-aduan', ['status' => $request->get('status')]))->with('success','Data berhasil dihapus');
    }
}
