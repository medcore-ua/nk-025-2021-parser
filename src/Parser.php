<?php

namespace Meddata\Nk0252021Parser;

class Parser
{
    private const DATA_URL = 'https://meddata.pp.ua/data/classifications/nk-025-2021.json';

    /**
     * Fetches and parses the NK-025-2021 data.
     *
     * @return array The parsed data as an associative array.
     * @throws \Exception If the data cannot be fetched or parsed.
     */
    public function parse(): array
    {
        $json = @file_get_contents(self::DATA_URL);

        if ($json === false) {
            throw new \Exception("Failed to fetch data from " . self::DATA_URL);
        }

        $data = json_decode($json, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception("Failed to parse JSON: " . json_last_error_msg());
        }

        return $data;
    }
}
