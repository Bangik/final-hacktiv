<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;
use PDF;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $transactions = Transaction::orderBy('id', 'desc')->get();
        return view('admin.transactions.index', compact('transactions'));
    }

    public function export(Request $request)
    {
        $min = $request->min;
        $max = $request->max;
        $dateTimeMin = new \DateTime($min);
        $dateTimeMax = new \DateTime($max);
        $transactions = Transaction::whereBetween('created_at', [$dateTimeMin, $dateTimeMax])->get();
        $pdf = PDF::loadView('admin.transactions.export', compact('transactions', 'min', 'max'));
        return $pdf->download('transactions.pdf');
    }
}
