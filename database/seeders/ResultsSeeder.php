<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResultsSeeder extends Seeder
{
    public function run()
    {
        DB::table('results')->insert([
            [
                'id' => 20,
                'all' => 51,
                'correctAnswers' => 41,
                'incorrectAnswers' => 6,
                'a' => '[41,44,45,47,48,50]',
                'b' => '[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,40,42,43,46,49]',
                'unansweredQuestions' => '["37","38","39",37,38,39]',
                'uns' => 3,
                'percentage' => 68.627450980392,
                'score' => 6807.8431372549,
                'exam_name' => 'حسابان iq گاج پایان مثلثات و مرور لگاریتم',
                'data' => '{"answers":{"1":"1","2":"1","3":"1","4":"1","5":"1","6":"1","7":"1","8":"1","9":"1","10":"1","11":"1","12":"1","13":"1","14":"1","15":"1","16":"1","17":"1","18":"1","19":"1","20":"1","21":"1","22":"1","23":"1","24":"1","25":"1","26":"1","27":"1","28":"1","29":"1","30":"1","31":"1","32":"1","33":"1","34":"1","35":"1","36":"1","40":"1","41":"3","42":"1","43":"1","44":"3","45":"2","46":"1","47":"3","48":"3","49":"1","50":"3"},"unanswered":"37, 38, 39"}',
                'answersKey' => '{"answers":{"1":"1","2":"1","3":"1","4":"1","5":"1","6":"1","7":"1","8":"1","9":"1","10":"1","11":"1","12":"1","13":"1","14":"1","15":"1","16":"1","17":"1","18":"1","19":"1","20":"1","21":"1","22":"1","23":"1","24":"1","25":"1","26":"1","27":"1","28":"1","29":"1","30":"1","31":"1","32":"1","33":"1","34":"1","35":"1","36":"1","37":"1","38":"1","39":"1","40":"1","41":"1","42":"1","43":"1","44":"1","45":"1","46":"1","47":"1","48":"1","49":"1","50":"1"},"unanswered":""}',
                'date' => '1403/5/27 08:56:37',
                'created_at' => '2024-08-17 05:27:01',
                'updated_at' => '2024-08-17 05:27:01',
            ],
            [
                'id' => 21,
                'all' => 31,
                'correctAnswers' => 20,
                'incorrectAnswers' => 6,
                'a' => '[7,8,9,11,12,14]',
                'b' => '[1,2,3,4,5,6,15,16,17,18,20,21,22,23,24,25,26,27,29,30]',
                'unansweredQuestions' => '["10","13","19","28",10,13,19,28]',
                'uns' => 4,
                'percentage' => 45.161290322581,
                'score' => 5916.1290322581,
                'exam_name' => 'فیزیک پایه الگو کار و انرژی تا ابتدای قضیه کار و انرژی جنبشی(دهم فصل سوم)',
                'data' => '{"answers":{"1":"1","2":"1","3":"1","4":"1","5":"1","6":"1","7":"2","8":"2","9":"3","11":"2","12":"2","14":"2","15":"1","16":"1","17":"1","18":"1","20":"1","21":"1","22":"1","23":"1","24":"1","25":"1","26":"1","27":"1","29":"1","30":"1"},"unanswered":"10, 13, 19, 28"}',
                'answersKey' => '{"answers":{"1":"1","2":"1","3":"1","4":"1","5":"1","6":"1","7":"1","8":"1","9":"1","10":"1","11":"1","12":"1","13":"1","14":"1","15":"1","16":"1","17":"1","18":"1","19":"1","20":"1","21":"1","22":"1","23":"1","24":"1","25":"1","26":"1","27":"1","28":"1","29":"1","30":"1"},"unanswered":""}',
                'date' => '1403/5/27 16:06:32',
                'created_at' => '2024-08-17 12:37:14',
                'updated_at' => '2024-08-17 12:37:14',
            ],
            [
                'id' => 22,
                'all' => 21,
                'correctAnswers' => 16,
                'incorrectAnswers' => 4,
                'a' => '[2,3,4,9]',
                'b' => '[1,5,6,7,8,10,11,12,13,14,15,16,17,18,19,20]',
                'unansweredQuestions' => '[""]',
                'uns' => 0.5,
                'percentage' => 57.142857142857,
                'score' => 6371.4285714286,
                'exam_name' => 'آمار و احتمال یازدهم کتاب الگو تا سر احتمال کلاسیک دسته دوم پرتاب مهره و تاس',
                'data' => '{"answers":{"1":"1","2":"2","3":"2","4":"2","5":"1","6":"1","7":"1","8":"1","9":"2","10":"1","11":"1","12":"1","13":"1","14":"1","15":"1","16":"1","17":"1","18":"1","19":"1","20":"1"},"unanswered":""}',
                'answersKey' => '{"answers":{"1":"1","2":"1","3":"1","4":"1","5":"1","6":"1","7":"1","8":"1","9":"1","10":"1","11":"1","12":"1","13":"1","14":"1","15":"1","16":"1","17":"1","18":"1","19":"1","20":"1"},"unanswered":""}',
                'date' => '1403/5/27 16:18:22',
                'created_at' => '2024-08-17 12:49:28',
                'updated_at' => '2024-08-17 12:49:28',
            ],
            [
                'id' => 23,
                'all' => 26,
                'correctAnswers' => 21,
                'incorrectAnswers' => 4,
                'a' => '[2,3,4,5]',
                'b' => '[1,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25]',
                'unansweredQuestions' => '[""]',
                'uns' => 0.5,
                'percentage' => 65.384615384615,
                'score' => 6684.6153846154,
                'exam_name' => 'شیمی یک کتاب مسائل شیمی پایه خیلی سبز استوکیومتری فرمولی و استوکیومتری گاز ها',
                'data' => '{"answers":{"1":"1","2":"2","3":"3","4":"2","5":"3","6":"1","7":"1","8":"1","9":"1","10":"1","11":"1","12":"1","13":"1","14":"1","15":"1","16":"1","17":"1","18":"1","19":"1","20":"1","21":"1","22":"1","23":"1","24":"1","25":"1"},"unanswered":""}',
                'answersKey' => '{"answers":{"1":"1","2":"1","3":"1","4":"1","5":"1","6":"1","7":"1","8":"1","9":"1","10":"1","11":"1","12":"1","13":"1","14":"1","15":"1","16":"1","17":"1","18":"1","19":"1","20":"1","21":"1","22":"1","23":"1","24":"1","25":"1"},"unanswered":""}',
                'date' => '1403/5/27 16:21:08',
                'created_at' => '2024-08-17 12:51:13',
                'updated_at' => '2024-08-17 12:51:13',
            ],
            [
                'id' => 24,
                'all' => 36,
                'correctAnswers' => 30,
                'incorrectAnswers' => 4,
                'a' => '[2,3,4,11]',
                'b' => '[1,5,6,7,8,9,10,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34]',
                'unansweredQuestions' => '["35",35]',
                'uns' => 1,
                'percentage' => 72.222222222222,
                'score' => 6944.4444444444,
                'exam_name' => 'هندسه جامع میکرو گاج هندسه 2 پایان فصل دوم تبدیل های هندسی',
                'data' => '{"answers":{"1":"1","2":"2","3":"2","4":"2","5":"1","6":"1","7":"1","8":"1","9":"1","10":"1","11":"2","12":"1","13":"1","14":"1","15":"1","16":"1","17":"1","18":"1","19":"1","20":"1","21":"1","22":"1","23":"1","24":"1","25":"1","26":"1","27":"1","28":"1","29":"1","30":"1","31":"1","32":"1","33":"1","34":"1"},"unanswered":"35"}',
                'answersKey' => '{"answers":{"1":"1","2":"1","3":"1","4":"1","5":"1","6":"1","7":"1","8":"1","9":"1","10":"1","11":"1","12":"1","13":"1","14":"1","15":"1","16":"1","17":"1","18":"1","19":"1","20":"1","21":"1","22":"1","23":"1","24":"1","25":"1","26":"1","27":"1","28":"1","29":"1","30":"1","31":"1","32":"1","33":"1","34":"1","35":"1"},"unanswered":""}',
                'date' => '1403/5/27 17:28:34',
                'created_at' => '2024-08-17 13:58:38',
                'updated_at' => '2024-08-17 13:58:38',
            ],
        ]);
    }
}
