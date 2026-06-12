<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Reader;
use App\Models\Loan;
use App\Models\AuditLog;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(UserSeeder::class);

        AuditLog::query()->delete();
        Loan::query()->delete();
        Reader::query()->delete();
        Book::query()->delete();

        Book::insert(
            $this->loadJsonData('data/books.json')
        );

        Reader::insert(
            $this->loadJsonData('data/readers.json')
        );

        AuditLog::insert(
            $this->loadJsonData('data/audit_logs.json')
        );

        $loans = $this->loadJsonData('data/loans.json');

        foreach ($loans as $loan) {
            Loan::create($loan);
        }
    }

    private function loadJsonData(string $path): array
    {
        $data = json_decode(
            file_get_contents(database_path($path)),
            true
        );

        foreach ($data as $item) {
            if (isset($item['data']) && is_array($item['data'])) {
                return $item['data'];
            }
        }

        return $data;
    }
}