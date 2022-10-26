<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\User;
use App\Notifications\PaidNotification;
use Carbon\Carbon;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Support\Facades\Storage;

class PaymentController extends Controller
{
    public function review(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $payment = $user->payment;

        return view('admin.users.review', compact('user', 'payment'));
    }

    public function approve(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $payment = $user->payment;
        $payment->status = 'paid';
        $payment->hash = md5(date('dmYhis') . $user->registration_number);
        $payment->save();

        $this->generateReceipt($user);

        $user->notify(new PaidNotification($user));

        return back()->with('status', 'Pembayaran berhasil diverifikasi!');
    }

    public function showReceipt($hash)
    {
        $check = Payment::where('hash', $hash)->count();

        if ($check != 0) {
            return response()->file(public_path('storage/receipt/' . $hash . '.pdf'));
        }

        return redirect('/');
    }

    public function generateReceipt($user)
    {
        $today = Carbon::today();

        $pdf = new Fpdf('L', 'mm', [230, 110]);
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 8);
        $pdf->SetTitle('Invoice Pendaftaran Member AMCC');
        $pdf->Image(asset('img/nota.png'), 15, 14, -300);

        // --- Lembar Bukti
        // Nomor
        $pdf->SetXY(19, 37);
        $pdf->Cell(25, 5.5, 'AMCC/2022', 0, 1);
        $pdf->SetXY(46, 37);
        $pdf->Cell(25, 5.5, $user->registration_number, 0, 1); // NO.REG

        // Telah diterima dari
        $pdf->SetXY(19, 48);
        $pdf->Cell(50, 5.5, strtoupper($user->name), 0, 1); // nama penerima

        // Uang sejumlah
        $pdf->SetXY(22, 59);
        $pdf->Cell(48, 5.5, number_format($user->payment->amount), 0, 1); // harga

        // Untuk pembayaran
        $pdf->SetXY(19, 70);
        $pdf->Cell(50, 5.5, strtoupper('PENDAFTARAN MEMBER AMCC'), 0, 1);

        // Tanggal
        $pdf->SetXY(19, 81.25);
        $pdf->Cell(14, 5.5, date_format($today,"d"), 0, 1, 'C'); // hari
        $pdf->SetXY(37, 81.25);
        $pdf->Cell(14, 5.5, date_format($today,"m"), 0, 1, 'C'); // bulan
        $pdf->SetXY(55, 81.25);
        $pdf->Cell(14, 5.5, date_format($today,"Y"), 0, 1, 'C'); // tahun

        // --- Lembar Daftar
        // Nomor
        $pdf->SetXY(115.50, 37);
        $pdf->Cell(50, 5.5, 'AMCC/2022/' . $user->registration_number, 0, 1); // no.reg

        // Telah diterima dari
        $pdf->SetXY(115.50, 43.75);
        $pdf->Cell(50, 5.5, strtoupper($user->name), 0, 1); // nama member

        // Uang sejumlah
        $pdf->SetXY(119, 50.5);
        $pdf->Cell(48, 5.5, number_format($user->payment->amount), 0, 1); // price

        // Untuk pembayaran
        $pdf->SetXY(115.50, 57.75);
        $pdf->Cell(50, 5.5, strtoupper('PENDAFTARAN MEMBER AMCC'), 0, 1);

        $pdf->SetFontSize(6);

        // Tanggal
        $pdf->SetXY(108, 67.50);
        $pdf->Cell(20, 5.5, date_format($today,"d/m/Y"), 0, 1, 'L'); // day/month/year

        $pdf->Image(asset('img/cap_amcc.png'), 98, 73, -300);
        $pdf->Image(asset('img/ttd_mufti.png'), 107, 76, -500);

        // Penerima
        $pdf->SetXY(102, 81.50);
        $pdf->Cell(23, 5.5, strtoupper("Muhammad Mufti"), 0, 1, 'C'); //penerima

        // return $pdf;
        // $pdf->Output();

        // save pdf to file
        $pdf->Output(public_path('storage/receipt/' . $user->payment->hash . '.pdf'),'F');
    }
}
