<?php

namespace perf\Form\Submission;

use perf\Form\Validation\FormValidationErrorCollection;

readonly class ValidValuesSubmitted implements SubmissionInterface
{
    /**
     * @param array<string, mixed> $values
     */
    public function __construct(
        private array $values
    ) {
    }

    public function submitted(): bool
    {
        return true;
    }

    public function valid(): bool
    {
        return true;
    }

    public function getErrors(): FormValidationErrorCollection
    {
        return FormValidationErrorCollection::empty();
    }

    /**
     * @return array<string, mixed>
     */
    public function getValues(): array
    {
        return $this->values;
    }
}
