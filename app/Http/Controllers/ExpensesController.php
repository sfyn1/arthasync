<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expenses;
use App\Models\Categories;

class ExpensesController extends Controller
{
    // Halaman List Pengeluaran
    public function index()
    {
        $expenses = Expenses::getAll();
        $categories = Categories::getAll();
        return view('dashboard.expenses.list', compact('expenses', 'categories'));
    }

    // Halaman Tambah Pengeluaran
    public function addPage()
    {
        $categories = Categories::getAll();
        return view('dashboard.expenses.add', compact('categories'));
    }

    // Tambah Pengeluaran
    public function insert(Request $request)
    {
        // Insert data ke table
        $expense = Expenses::insert([
            'amount'        => $request->amount,
            'description'   => $request->description,
            'date'          => $request->date,
            'id_category'   => $request->id_category,
            'created_at'    => date('Y-m-d H:i:s')
        ]);

        // Notifikasi
        if ($expense) {
            return redirect()->route('expenses')->with('success', 'Data Berhasil Ditambahkan');
        } else {
            return redirect()->route('expenses')->with('error', 'Data Gagal Ditambahkan');
        }
    }

     // Delete Data
     public function delete($id)
     {
         // Hapus data pendapatan berdasarkan id
         $expense = Expenses::deleteData($id);
 
         // Notifikasi
         if ($expense) {
             return redirect()->route('expenses')->with('success', 'Data Berhasil Dihapus');
         } else {
             return redirect()->route('expenses')->with('error', 'Data Gagal Dihapus');
         }
     }

}
