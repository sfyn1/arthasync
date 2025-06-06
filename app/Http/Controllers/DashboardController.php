<?php

namespace App\Http\Controllers;

use App\Models\Incomes;
use App\Models\Expenses;
use App\Models\Balance;
use App\Models\Categories;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Ambil total pemasukan dari model
        $total_incomes = Incomes::totalIncomes();

        // Ambil total balance dari model
        $total_balance = Balance::totalBalance();

        // Ambil total kategori dari model
        $total_categories = Categories::totalCategories();

        // Ambil total pengeluaran dari model
        $total_expenses = Expenses::totalExpenses();

        // Ambil semua data pemasukan dan pengeluaran dari model balance
        $incomesAndExpenses = Balance::getAllIncomesAndExpenses();

        // Ambil semua data kategori dari model categories
        $categories = Categories::getAll();

        // Data pemasukan & pengeluaran per Bulan
        $monthlyIncomes = DB::table('incomes')
            ->selectRaw("MONTH(date) as month_number, DATE_FORMAT(date, '%M') as month, SUM(amount) as total")
            ->groupBy('month_number', 'month')
            ->orderBy('month_number')
            ->get();

        $monthlyExpenses = DB::table('expenses')
            ->selectRaw("MONTH(date) as month_number, DATE_FORMAT(date, '%M') as month, SUM(amount) as total")
            ->groupBy('month_number', 'month')
            ->orderBy('month_number')
            ->get();
            

        $data = [
            'total_incomes' => $total_incomes,
            'total_balance' => $total_balance,
            'total_categories' => $total_categories,
            'total_expenses' => $total_expenses,
            'incomesAndExpenses' => $incomesAndExpenses,
            'categories' => $categories,
            'monthlyIncomes' => $monthlyIncomes,
            'monthlyExpenses' => $monthlyExpenses
        ];

        // Kirim data total pemasukan ke view
        return view('dashboard/index', $data);
    }
}
