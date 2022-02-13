<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;


class ManageReservationsController extends Controller
{
    public function index()
    {
        return view('reservations.index', ['customer' => Reservation::orderBy('reservation_date', 'ASC')->orderBy('reservation_time', 'ASC')->get()]);
    }
    public function today()
    {
        $date = date("d-m-Y");
        $pdf = new Dompdf();
        $pdf->loadHtml(view('reservations.today', ['info' => Reservation::where('reservation_date', date("Y/m/d"))->orderBy('reservation_time', 'ASC')->get()]));
        $pdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $pdf->render();

        // Output the generated PDF to Browser
        $pdf->stream('Rezervacije-' . $date . ".pdf");

        return redirect('reservation.index');
    }
    public function cancel()
    {
        return view('reservations.cancel');
    }
    public function delete(Request $request)
    {
        if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Manager') {
            try {
                $toCancel = Reservation::where('order_number', $request['order_number'])->firstOrFail();
                $toCancel->delete($toCancel['id']);
                return 'done';
            } catch (ModelNotFoundException $e) {
                session()->flash('status', 'Invalid order number.');
                return redirect()->route('reservations.cancel');
            }
        } else {
            session()->flash('status', 'You do not have authority for this.');
            return redirect()->route('home');
        }
    }
    public function date()
    {
        return view('reservations.date');
    }
    public function print(Request $request)
    {
        $count = Reservation::where('reservation_date', $request['reservation_date'])->count();
        $date = date("d-m-Y", strtotime($request['reservation_date']));

        if ($count > 0) {
            $pdf = new Dompdf();
            $pdf->loadHtml(view('reservations.today', ['info' => Reservation::where('reservation_date', $request['reservation_date'])->orderBy('reservation_time', 'ASC')->get()]));
            $pdf->setPaper('A4', 'portrait');

            // Render the HTML as PDF
            $pdf->render();

            // Output the generated PDF to Browser
            $pdf->stream('Rezervacije-'.$date.".pdf");

            return redirect('reservation.date');
        } else {
            session()->flash('status', 'Nema rezervacija za taj datum');
            return redirect()->route('reservations.date');
        }
    }
}
