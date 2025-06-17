<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\Choice;

class QuizSeeder extends Seeder
{
    

public function run(): void
{
    $q1 = Question::create(['text' => 'What is the capital of France?']);
    $q1->choices()->createMany([
        ['text' => 'Paris', 'is_correct' => true],
        ['text' => 'London', 'is_correct' => false],
        ['text' => 'Rome', 'is_correct' => false],
        ['text' => 'Berlin', 'is_correct' => false],
    ]);

    $q2 = Question::create(['text' => 'What is 2 + 2?']);
    $q2->choices()->createMany([
        ['text' => '3', 'is_correct' => false],
        ['text' => '4', 'is_correct' => true],
        ['text' => '5', 'is_correct' => false],
        ['text' => '22', 'is_correct' => false],
    ]);
}

}
