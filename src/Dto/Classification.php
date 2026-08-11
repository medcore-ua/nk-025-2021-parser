<?php

namespace MedCore\Nk0252021Parser\Dto;

class Classification
{
    public function __construct(
        public readonly string $class,
        public readonly string $chapter,
        public readonly string $code_range,
        public readonly string $sub_category,
        public readonly string $code,
        public readonly string $name_en,
        public readonly string $name_ua,
        public readonly string $specific_code,
        public readonly string $specific_name_en,
        public readonly string $specific_name_ua,
    ) {
    }
}
