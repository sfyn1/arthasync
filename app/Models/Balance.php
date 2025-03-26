<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    // Inisilisasi Table
    protected $table = 'balance';
    public $timestamps = false;

    // Table Pemasukan dan Pengeluaran
    protected $incomesTable = 'incomes';
    protected $expensesTable = 'expenses'; 
    protected $primaryKey = 'id_income'; // Tambahkan ini untuk memberi tahu Laravel primary key yang benar

    // Fill Table
    protected $fillable = [
        'amount', 'description', 'updated_at'
    ];

    // Get All Data
    public static function getAll()
    {
        return Balance::all();
    }

    // Get Data by ID
    public static function getById($id)
    {
        return Balance::where('id_balance', $id)->first();
    }

    // Total Balance
    public static function totalBalance()
    {
        $totalBalance = Balance::sum('amount');
        return $totalBalance;
    }

   // Mengambil semua data pemasukan dan pengeluaran dan memperbarui saldo
public static function getAllIncomesAndExpenses()
{
    // Ambil semua data pemasukan dari tabel Incomes
    $incomes = Incomes::all();

    // Ambil semua data pengeluaran dari tabel Expenses
    $expenses = Expenses::all();

    // Gabungkan data pemasukan dan pengeluaran
    $incomesAndExpenses = $incomes->concat($expenses);

    // Urutkan berdasarkan tanggal terbaru
    $incomesAndExpenses = $incomesAndExpenses->sortByDesc('date');

    // Hitung ulang saldo berdasarkan data terbaru
    self::updateBalance($incomes, $expenses);

    // Return data pemasukan dan pengeluaran
    return $incomesAndExpenses;
}

// Fungsi untuk memperbarui saldo setelah perubahan pemasukan/pengeluaran
public static function updateBalance($incomes, $expenses)
{
    // Hitung total pemasukan
    $totalIncome = $incomes->sum('amount');

    // Hitung total pengeluaran
    $totalExpense = $expenses->sum('amount');

    // Hitung ulang saldo akhir
    $newBalance = $totalIncome - $totalExpense;

    // Update saldo di tabel balance (gunakan ID balance yang benar)
    self::where('id_balance', 1)->update(['amount' => $newBalance, 'updated_at' => now()]);
}

    
}
