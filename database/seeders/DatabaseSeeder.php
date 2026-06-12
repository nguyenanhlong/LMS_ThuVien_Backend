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
        AuditLog::query()->delete();
        Loan::query()->delete();
        Reader::query()->delete();
        Book::query()->delete();

        Book::insert(
            json_decode(
                file_get_contents(database_path('data/books.json')),
                true
            )
        );

        Reader::insert(
            json_decode(
                file_get_contents(database_path('data/readers.json')),
                true
            )
        );

        AuditLog::insert(
            json_decode(
                file_get_contents(database_path('data/audit_logs.json')),
                true
            )
        );

        $loans = json_decode(
            file_get_contents(database_path('data/loans.json')),
            true
        );

        foreach ($loans as $loan) {
            Loan::create($loan);
        }
    }
}