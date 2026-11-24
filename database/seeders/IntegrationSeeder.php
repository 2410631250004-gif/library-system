<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\Member;
use Illuminate\Database\Seeder;

class IntegrationSeeder extends Seeder
{
    public function run(): void
    {
        foreach (['Fiksi', 'Non-Fiksi', 'Sains & Teknologi', 'Sejarah', 'Pengembangan Diri'] as $name) {
            Category::firstOrCreate(['name' => $name]);
        }

        $members = [
            ['name' => 'Tasya', 'member_code' => 'MBR001', 'phone' => '081200000001', 'address' => 'Karawang'],
            ['name' => 'Anas', 'member_code' => 'MBR002', 'phone' => '081200000002', 'address' => 'Karawang'],
            ['name' => 'Tania','member_code' => 'MBR003', 'phone' => '081200000003', 'address' => 'Bekasi'],
            ['name' => 'Aul', 'member_code' => 'MBR004', 'phone' => '081200000004', 'address' => 'Bekasi'],
            ['name' => 'Citra','member_code' => 'MBR005', 'phone' => '081200000005', 'address' => 'Purwakarta'],
        ];

        foreach ($members as $member) {
            Member::firstOrCreate(['member_code' => $member['member_code']], $member);
        }

        $categoryIds = Category::orderBy('id')->pluck('id')->values();

        Book::whereNull('category_id')->get()->each(function ($book, $i) use ($categoryIds) {
            $book->update(['category_id' => $categoryIds[$i % $categoryIds->count()]]);
        });
    }
}