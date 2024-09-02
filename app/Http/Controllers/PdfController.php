<?php

namespace App\Http\Controllers;

use App\Models\ResultModel;
use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    public function generateReport(Request $request)
    {
        // Fetch data based on the specified date
        $record = ResultModel::whereDate('created_at', $request->get('date'))->get();

        // Prepare data for PDF
        $results = $record->map(function ($data) {
            return [
                'exam_name' => $data->exam_name,
                'percentage' => ceil($data->percentage),
                'correctAnswers' => $data->correctAnswers,
                'incorrectAnswers' => $data->incorrectAnswers,
                'uns' => $data->uns,
                'score' => ceil($data->score),
                'all' => $data->all,
            ];
        });

        $pdf = PDF::loadView('pdf', [
            'record' => $results,
            'userInfo' => [
                'name' => 'ارشیا محمدی',
                'group' => 'دوازدهم ریاضی',
                'exam_date' => 'تاریخ آزمون',
                'issue_date' => 'دریافت کارنامه',
                'average_score' => ceil($results->avg('score')),
                'average_percentage' => ceil($results->avg('percentage')),
                'participants_count' => 10000, // Adjust as necessary
                'rank' => 120, // Adjust as necessary
            ]
        ])->setPaper('a4', 'landscape'); // Set the paper and orientation

        $name = md5(random_bytes(2365));
        return $pdf->stream("$name.pdf");
    }
}
