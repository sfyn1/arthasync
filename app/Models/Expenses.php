<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    use HasFactory;

    // Inisialisasi Tabel
    protected $table = 'expenses';
    protected $secondaryTable = 'balance';
    protected $primaryKey = 'id_expense'; // Menentukan Primary Key

    // Fillable Tabel
    public $timestamps = false;
    protected $fillable = [
        'amount', 'description', 'date', 'id_category', 'created_at'
    ];

    // Get All Data
    public static function getAll()
    {
        return Expenses::all();
    }

    // Get Data by ID
    public static function getById($id)
    {
        return Expenses::where('id_expense', $id)->first();
    }

    // Insert Data
    public static function insert($data)
    {
        // Ambil amount dari $data
        $amount = $data['amount'];

        // Tambahkan data ke tabel balance (mengurangi saldo)
        $balance = Balance::create([
            'amount' => -1 * $amount,
            'updated_at' => now()
        ]);

        // Jika penambahan data ke tabel balance berhasil, lanjutkan insert ke tabel Expenses
        if ($balance) {
            return Expenses::create($data);
        }

        // Jika gagal menambahkan ke balance, return false
        return false;
    }

    // Update Data
    public static function updateData($id_expense, $data)
    {
        return Expenses::where('id_expense', $id_expense)->update($data);
    }

    // Delete Data
    public static function deleteData($id)
    {
        // Ambil data expense yang akan dihapus
        $expense = Expenses::find($id);
        
        if ($expense) {
            // Tambahkan kembali amount ke balance (mengembalikan saldo)
            Balance::create([
                'amount' => $expense->amount,
                'updated_at' => now()
            ]);

            // Hapus data expense
            return $expense->delete();
        }

        return false;
    }

    // Total Pengeluaran
    public static function totalExpenses()
    {
        $expenses = Expenses::getAll();
        $total_expenses = 0;
        foreach ($expenses as $expense) {
            $total_expenses += $expense->amount;
        }
        return $total_expenses;
    }
}