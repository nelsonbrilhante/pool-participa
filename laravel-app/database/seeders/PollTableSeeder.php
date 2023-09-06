<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Poll;

class PollTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Poll::create([
            'title' => 'Orçamento Participativo 2023',
            'description' => 'Em traços largos, o OP assume-se como um instrumento relevante, com grandes potencialidades mas também limites, que contribui para a construção/consolidação da cidadania e da democracia ao nível local.',
            'status' => 'active',
        ]);
    }
}
