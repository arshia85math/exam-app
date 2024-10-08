<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnswersKeysSeeder extends Seeder
{
    public function run()
    {
        DB::table('answers_keys')->insert([
            [
                'id' => 16,
                'exam_name' => 'تست های حسابان iq گاج پایان مثلثات و مرور لگاریتم',
                'key' => '{"answers":{"1":"1","2":"1","3":"1","4":"1","5":"1","6":"1","7":"1","8":"1","9":"1","10":"1","11":"1","12":"1","13":"1","14":"1","15":"1","16":"1","17":"1","18":"1","19":"1","20":"1","21":"1","22":"1","23":"1","24":"1","25":"1","26":"1","27":"1","28":"1","29":"1","30":"1","31":"1","32":"1","33":"1","34":"1","35":"1","36":"1","37":"1","38":"1","39":"1","40":"1","41":"1","42":"1","43":"1","44":"1","45":"1","46":"1","47":"1","48":"1","49":"1","50":"1"},"unanswered":""}',
                'created_at' => '2024-08-17 05:05:52',
                'updated_at' => '2024-08-17 05:05:52',
            ],
            [
                'id' => 18,
                'exam_name' => 'تست های فیزیک پایه الگو کار و انرژی تا ابتدای قضیه کار و انرژی جنبشی(دهم فصل سوم)',
                'key' => '{"answers":{"1":"1","2":"1","3":"1","4":"1","5":"1","6":"1","7":"1","8":"1","9":"1","10":"1","11":"1","12":"1","13":"1","14":"1","15":"1","16":"1","17":"1","18":"1","19":"1","20":"1","21":"1","22":"1","23":"1","24":"1","25":"1","26":"1","27":"1","28":"1","29":"1","30":"1"},"unanswered":""}',
                'created_at' => '2024-08-17 12:35:30',
                'updated_at' => '2024-08-17 12:35:30',
            ],
            [
                'id' => 19,
                'exam_name' => 'آمار و احتمال یازدهم کتاب الگو تا سر احتمال کلاسیک دسته دوم پرتاب مهره و تاس',
                'key' => '{"answers":{"1":"1","2":"1","3":"1","4":"1","5":"1","6":"1","7":"1","8":"1","9":"1","10":"1","11":"1","12":"1","13":"1","14":"1","15":"1","16":"1","17":"1","18":"1","19":"1","20":"1"},"unanswered":""}',
                'created_at' => '2024-08-17 12:45:47',
                'updated_at' => '2024-08-17 12:45:47',
            ],
            [
                'id' => 20,
                'exam_name' => 'شیمی یک کتاب مسائل شیمی پایه خیلی سبز استوکیومتری فرمولی و استوکیومتری گاز ها',
                'key' => '{"answers":{"1":"1","2":"1","3":"1","4":"1","5":"1","6":"1","7":"1","8":"1","9":"1","10":"1","11":"1","12":"1","13":"1","14":"1","15":"1","16":"1","17":"1","18":"1","19":"1","20":"1","21":"1","22":"1","23":"1","24":"1","25":"1"},"unanswered":""}',
                'created_at' => '2024-08-17 12:50:17',
                'updated_at' => '2024-08-17 12:50:17',
            ],
            [
                'id' => 21,
                'exam_name' => 'هندسه 2 پایان فصل دوم تبدیل های هندسی',
                'key' => '{"answers":{"1":"1","2":"1","3":"1","4":"1","5":"1","6":"1","7":"1","8":"1","9":"1","10":"1","11":"1","12":"1","13":"1","14":"1","15":"1","16":"1","17":"1","18":"1","19":"1","20":"1","21":"1","22":"1","23":"1","24":"1","25":"1","26":"1","27":"1","28":"1","29":"1","30":"1","31":"1","32":"1","33":"1","34":"1","35":"1"},"unanswered":""}',
                'created_at' => '2024-08-17 13:57:21',
                'updated_at' => '2024-08-17 13:57:21',
            ]
        ]);
    }
}
