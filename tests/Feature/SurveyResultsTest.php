<?php

namespace Tests\Feature;

use App\SurveyResultsLink;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;
use Tests\TestCase;

class SurveyResultsTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test
     */
    public function it_stores_a_csv_file_for_survey_results()
    {
        \Storage::fake();

        $this->withoutExceptionHandling();

        $csv = new UploadedFile(
            base_path('tests/Fixtures/survey_results.csv'),
            'test.csv',
            'text/csv',
            $error = null,
            $testMode = true
        );

        $response = $this->post('/survey-results', [
            'survey-results' => $csv
        ]);

        $this->assertEquals(1, SurveyResultsLink::count());
        $this->assertTrue(\Storage::exists(SurveyResultsLink::first()->path));
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function it_gets_latest_stored_survey_results()
    {
        \Storage::fake();

        \Storage::putFileAs('surveys', new File(base_path('tests/Fixtures/survey_results.csv')), 'test123.csv');

        SurveyResultsLink::create([
            'path' => '/surveys/test123.csv'
        ]);

        $response = $this->get('/survey-results');

        $content = $response->decodeResponseJson();
        $this->assertCount(5, $content);
        $this->assertEquals(
            ["ID", "Last Name", "First Name", "Treat", "Type of Ministering", "Availability", "Hobbies", "Phone Number"],
            array_keys(Arr::first($content))
        );
    }
}
