<?php

namespace App\Features\SurveyResults;

use League\Flysystem\FileNotFoundException;

class Results
{
    /**
     * @var string
     */
    private $linkPath;

    public function __construct(string $linkPath = null)
    {
        if (!\Storage::exists($linkPath)) {
            throw new FileNotFoundException('File at path: ' . $linkPath . ' does not exist');
        }

        $this->linkPath = $linkPath;
    }

    public function format()
    {
        $rows = $this->getRows();

        $headers = $this->getHeader($rows);

        return collect($rows)
            ->slice(1)
            ->map(function ($row) use ($headers) {
                if (count($row) == count($headers)) {
                    return array_combine($headers, $row);
                }
                return null;
            })
            ->filter()
            ->values();
    }

    /**
     * @return array
     */
    private function getRows(): array
    {
        return array_map("str_getcsv", explode("\n", \Storage::get($this->linkPath)));
    }

    /**
     * @param array $rows
     * @return mixed
     */
    private function getHeader(array $rows)
    {
        $headers = $rows[0];
        return $headers;
    }
}
