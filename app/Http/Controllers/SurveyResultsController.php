<?php

namespace App\Http\Controllers;

use App\Features\SurveyResults\Results;
use App\SurveyResultsLink;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SurveyResultsController extends Controller
{
    public function show()
    {
        $link = SurveyResultsLink::latest()->first();

        $formattedResults= (new Results($link->path))->format();

        return response()->json($formattedResults);
    }

    public function post(Request $request)
    {
        $surveyResults = $request->file('survey-results');

        $filename = Carbon::now()->toDateString() . '_' . Str::random(5) . '.csv';

        try {
            $success = \Storage::putFileAs('surveys', $surveyResults, $filename);
        } catch (\Throwable $e) {
            return response($e->getMessage(), 422);
        }

        if (!$success) {
            return response('Could not store file', 422);
        }

        SurveyResultsLink::create([
            'path' => '/surveys/' . $filename
        ]);

        return response('File uploaded!', 200);
    }
}
