<?php

namespace MedCore\Nk0252021Parser\Dto;

use Countable;
use IteratorAggregate;

class ClassificationCollection implements IteratorAggregate, Countable
{
    /**
     * @var Classification[]
     */
    private array $classifications = [];

    public function add(Classification $classification): void
    {
        $this->classifications[] = $classification;
    }

    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this->classifications);
    }

    public function count(): int
    {
        return count($this->classifications);
    }

    public function findByCode(string $code): ?Classification
    {
        foreach ($this->classifications as $classification) {
            if ($classification->code === $code) {
                return $classification;
            }
        }

        return null;
    }

    public function findBySpecificCode(string $specificCode): ?Classification
    {
        foreach ($this->classifications as $classification) {
            if ($classification->specific_code === $specificCode) {
                return $classification;
            }
        }

        return null;
    }
    
    public function searchByName(string $query): ClassificationCollection
    {
        $results = new self();
        foreach ($this->classifications as $classification) {
            if (
                stripos($classification->name_ua, $query) !== false ||
                stripos($classification->name_en, $query) !== false ||
                stripos($classification->specific_name_ua, $query) !== false ||
                stripos($classification->specific_name_en, $query) !== false
            ) {
                $results->add($classification);
            }
        }

        return $results;
    }
}
