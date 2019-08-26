<?php

namespace App\Http\Controllers;

use App\SurveyResultsLink;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SurveyResultsController extends Controller
{
    public function show()
    {
        $link = SurveyResultsLink::latest()->first();

        $rows = array_map("str_getcsv", explode("\n", \Storage::get($link->path)));

        $headers = $rows[0];

        $rowsWithHeaders = collect($rows)
            ->slice(1)
            ->map(function ($row) use ($headers) {
                if (count($row) == count($headers)) {
                    return array_combine($headers, $row);
                }
                return null;
            })
            ->filter()
            ->values();

        return response()->json($rowsWithHeaders);
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
