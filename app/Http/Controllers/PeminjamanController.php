<?php

namespace App\Http\Controllers;

use App\Models\Peminjamans;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {

        $trips = Peminjamans::all();


        return view('admin.peminjaman.index', compact('trips'));
    }
}
