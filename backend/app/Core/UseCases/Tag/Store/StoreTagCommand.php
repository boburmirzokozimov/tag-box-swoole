<?php

namespace Core\UseCases\Tag\Store;

final readonly class StoreTagCommand
{
    private function __construct(
        private string $name,
        private string $description,
        private string $type,
    )
    {
    }

    public static function fromArray(array $data): StoreTagCommand
    {
        return new self(
            name: $data['name'],
            description: $data['description'],
            type: $data['type']
        );
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getType(): string
    {
        return $this->type;
    }

}
