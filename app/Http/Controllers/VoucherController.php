<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function generateVoucher($amount)
    {
        $vouchers = [];

        for ($i = 0; $i < $amount; $i++) {
            $code = $this->generateUniqueCode(); // Fungsi untuk membuat kode unik

            $voucher = Voucher::create([
                'code' => $code,
                'expired_at' => Carbon::now()->addMonths(3), // Set expired_at 3 bulan dari sekarang
            ]);

            $vouchers[] = $voucher;
        }

        return $vouchers;
    }

    private function generateUniqueCode()
    {
        // Logika pembuatan kode unik
        return 'VOUCHER_' . \Illuminate\Support\Str::random(8);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vouchers = Voucher::all();
        return view('pages.admin.voucher.index', compact('vouchers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
