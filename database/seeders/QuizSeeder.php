<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Question;
use App\Models\Option;

class QuizSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'AI' => [
                'What is the goal of AI?' => ['To mimic human thinking', true, 'To improve hardware', false, 'To replace servers', false, 'To write code', false],
                'What is Machine Learning?' => ['Subset of AI', true, 'A CPU feature', false, 'Cloud Storage', false, 'A Web Language', false],
                'Which AI term means learning from experience?' => ['Reinforcement Learning', true, 'Memory Allocation', false, 'Encoding', false, 'Inference', false],
                'What does NLP stand for?' => ['Natural Language Processing', true, 'Network Level Protocol', false, 'Neural Link Processor', false, 'Node Line Parsing', false],
                'What is used to train AI models?' => ['Data', true, 'WiFi', false, 'RAM', false, 'Ethernet', false],
                'AI is used in?' => ['Self-driving cars', true, 'Oil drilling', false, 'Brick making', false, 'Clouds', false],
                'What is Deep Learning?' => ['Type of Machine Learning', true, 'File searching', false, 'Text formatting', false, 'Remote Desktop', false],
                'What is a Neural Network modeled after?' => ['Human brain', true, 'Circuit board', false, 'Database', false, 'Cloud server', false],
                'Which is a famous AI chatbot?' => ['ChatGPT', true, 'PowerPoint', false, 'Google Maps', false, 'Dropbox', false],
                'Which tech giant works on AI?' => ['Google', true, 'McDonald’s', false, 'Coca-Cola', false, 'Shell', false],
            ],
            'Computer' => [
                'What is the brain of the computer?' => ['CPU', true, 'Monitor', false, 'RAM', false, 'Hard Drive', false],
                'What does RAM stand for?' => ['Random Access Memory', true, 'Run All Memory', false, 'Read After Memory', false, 'Random Allocation Memory', false],
                'What is the function of the hard drive?' => ['Storage', true, 'Processing', false, 'Displaying', false, 'Inputting', false],
                'Which is not an input device?' => ['Printer', true, 'Mouse', false, 'Keyboard', false, 'Scanner', false],
                'What is an operating system?' => ['System software', true, 'Antivirus', false, 'MS Word', false, 'Driver', false],
                'Which of the following is a computer port?' => ['USB', true, 'LED', false, 'RAM', false, 'ROM', false],
                'What does BIOS stand for?' => ['Basic Input Output System', true, 'Binary Integrated OS', false, 'Bit Operating System', false, 'Bootloader In System', false],
                'Which part stores temporary memory?' => ['RAM', true, 'ROM', false, 'SSD', false, 'HDD', false],
                'What is a GPU?' => ['Graphics Processing Unit', true, 'General Processing Unit', false, 'Global Processing Unit', false, 'Graph Processor', false],
                'What is the main function of the motherboard?' => ['Connects all parts', true, 'Displays output', false, 'Runs programs', false, 'Stores files', false],
            ],
            'Programming' => [
                'What does HTML stand for?' => ['HyperText Markup Language', true, 'HighText Machine Language', false, 'Home Tool Markup Language', false, 'Hyperloop Tag Memory Language', false],
                'Which is a backend language?' => ['PHP', true, 'HTML', false, 'CSS', false, 'Photoshop', false],
                'What is JavaScript used for?' => ['Making pages interactive', true, 'Database', false, 'Image editing', false, 'Typing', false],
                'What does CSS do?' => ['Styles the HTML', true, 'Stores data', false, 'Runs code', false, 'Uploads files', false],
                'Which symbol is used to end PHP statements?' => [';', true, ':', false, '.', false, ',', false],
                'Which tag is used in HTML to link CSS?' => ['<link>', true, '<style>', false, '<css>', false, '<href>', false],
                'What is a variable in programming?' => ['A container for data', true, 'A file type', false, 'A browser', false, 'An error', false],
                'Which is a version control system?' => ['Git', true, 'Gimp', false, 'Gmail', false, 'GPU', false],
                'Which is a loop in PHP?' => ['foreach', true, 'if', false, 'echo', false, 'print', false],
                'What is Laravel?' => ['PHP framework', true, 'Database tool', false, 'Design software', false, 'Text editor', false],
            ]
        ];

        foreach ($data as $categoryName => $questions) {
            $category = Category::firstOrCreate(['name' => $categoryName]);

            foreach ($questions as $questionText => $optionsArray) {
                $question = $category->questions()->create([
                    'text' => $questionText
                ]);

                for ($i = 0; $i < count($optionsArray); $i += 2) {
                    $question->options()->create([
                        'text' => $optionsArray[$i],
                        'is_correct' => $optionsArray[$i + 1],
                    ]);
                }
            }
        }
    }
}
