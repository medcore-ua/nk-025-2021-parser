<?php

namespace MedCore\Nk0252021Parser;

use MedCore\Nk0252021Parser\Dto\Classification;
use MedCore\Nk0252021Parser\Dto\ClassificationCollection;

class Parser
{
    private const DATA_URL = 'https://meddata.pp.ua/data/classifications/nk-025-2021.json';

    private ?ClassificationCollection $collection = null;

    /**
     * Fetches and parses the NK-025-2021 data.
     *
     * @return ClassificationCollection The parsed data as a collection of Classification objects.
     * @throws \Exception If the data cannot be fetched or parsed.
     */
    public function parse(): ClassificationCollection
    {
        if ($this->collection) {
            return $this->collection;
        }

        $json = @file_get_contents(self::DATA_URL);

        if ($json === false) {
            throw new \Exception("Failed to fetch data from " . self::DATA_URL);
        }

        $data = json_decode($json, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception("Failed to parse JSON: " . json_last_error_msg());
        }

        $this->collection = new ClassificationCollection();

        foreach ($data['data'] as $row) {
            $this->collection->add(new Classification(
                class: $row[0] ?? '',
                chapter: $row[1] ?? '',
                code_range: $row[2] ?? '',
                sub_category: $row[3] ?? '',
                code: $row[4] ?? '',
                name_en: $row[5] ?? '',
                name_ua: $row[6] ?? '',
                specific_code: $row[7] ?? '',
                specific_name_en: $row[8] ?? '',
                specific_name_ua: $row[9] ?? '',
            ));
        }

        return $this->collection;
    }

    public function findByCode(string $code): ?Classification
    {
        return $this->parse()->findByCode($code);
    }

    public function findBySpecificCode(string $specificCode): ?Classification
    {
        return $this->parse()->findBySpecificCode($specificCode);
    }

    public function searchByName(string $query): ClassificationCollection
    {
        return $this->parse()->searchByName($query);
    }
}
