<?php

namespace perf\Form\Field;

use perf\Form\Exception\FormException;

class FileUploadInput extends FieldBase
{
    public const FIELD_TYPE_ID = 'input.file';

    /**
     * @var array<string, null|string>
     */
    private array $initialValue = [
        'name'     => null,
        'type'     => null,
        'size'     => null,
        'tmp_name' => null,
        'error'    => null,
    ];

    /**
     * @var null|array<string, string>
     */
    private ?array $submittedValue = null;

    private bool $submitted = false;

    /**
     * @throws FormException
     */
    public function setInitialValue(mixed $value): self
    {
        if (!is_array($value)) {
            throw new FormException('Upload file input initial value must be an array.');
        }

        foreach (array_keys($this->initialValue) as $key) {
            if (array_key_exists($key, $value)) {
                $this->initialValue[$key] = $value[$key];
            }
        }

        return $this;
    }

    public function submitValue(mixed $value): void
    {
        if (is_array($value)) {
            foreach (array_keys($this->initialValue) as $key) {
                $this->submittedValue[$key] = $value[$key] ?? null;
            }
        }

        $this->submitted = true;
    }

    /**
     * {@inheritDoc}
     */
    public function getValue(): mixed
    {
        if ($this->submitted) {
            return $this->submittedValue;
        }

        return $this->initialValue;
    }

    public function reset(): void
    {
        $this->submittedValue = null;
        $this->submitted      = false;
    }
}
