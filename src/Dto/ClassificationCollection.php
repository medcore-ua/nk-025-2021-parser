<?php

namespace ChernegaSergiy\Nk0252021Parser\Dto;

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
            if ($classification->specificCode === $specificCode) {
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
                stripos($classification->nameUa, $query) !== false ||
                stripos($classification->nameEn, $query) !== false ||
                stripos($classification->specificNameUa, $query) !== false ||
                stripos($classification->specificNameEn, $query) !== false
            ) {
                $results->add($classification);
            }
        }

        return $results;
    }
}
