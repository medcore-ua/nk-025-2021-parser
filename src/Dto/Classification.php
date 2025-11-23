<?php

namespace ChernegaSergiy\Nk0252021Parser\Dto;

class Classification
{
    public function __construct(
        public readonly string $class,
        public readonly string $chapter,
        public readonly string $codeRange,
        public readonly string $subCategory,
        public readonly string $code,
        public readonly string $nameEn,
        public readonly string $nameUa,
        public readonly string $specificCode,
        public readonly string $specificNameEn,
        public readonly string $specificNameUa,
    ) {
    }
}
