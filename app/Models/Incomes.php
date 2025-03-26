<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incomes extends Model
{
    use HasFactory;

    // Inisialisasi Tabel
    protected $table = 'incomes';
    protected $secondaryTable = 'balance';
    protected $primaryKey = 'id_income'; // Menentukan Primary Key

    // Fillable Tabel
    public $timestamps = false;
    protected $fillable = [
        'amount', 'description', 'date', 'id_category', 'created_at'
    ];

    // Get All Data
    public static function getAll()
    {
        return Incomes::all();
    }

    // Get Data by ID
    public static function getById($id)
    {
        return Incomes::where('id_income', $id)->first();
    }

    // Insert Data
    public static function insert($data)
    {
        // Ambil amount dari $data
        $amount = $data['amount'];

        // Tambahkan data ke tabel balance (menambah saldo)
        $balance = Balance::create([
            'amount' => $amount,
            'updated_at' => now()
        ]);

        // Jika penambahan data ke tabel balance berhasil, lanjutkan insert ke tabel Incomes
        if ($balance) {
            return Incomes::create($data);
        }

        // Jika gagal menambahkan ke balance, return false
        return false;
    }

    // Update Data
    public static function updateData($id_income, $data)
    {
        return Incomes::where('id_income', $id_income)->update($data);
    }

    // Delete Data
    public static function deleteData($id)
    {
        // Ambil data income yang akan dihapus
        $income = Incomes::find($id);
        
        if ($income) {
            // Kurangi amount dari balance (mengurangi saldo)
            Balance::create([
                'amount' => -1 * $income->amount,
                'updated_at' => now()
            ]);

            // Hapus data income
            return $income->delete();
        }

        return false;
    }

    // Total Pemasukan
    public static function totalIncomes()
    {
        $incomes = Incomes::getAll();
        $total_incomes = 0;
        foreach ($incomes as $income) {
            $total_incomes += $income->amount;
        }
        return $total_incomes;
    }
}
