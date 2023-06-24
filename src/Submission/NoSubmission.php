<?php

namespace perf\Form\Submission;

use perf\Form\Validation\FormValidationErrorCollection;

readonly class NoSubmission implements SubmissionInterface
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
        return false;
    }

    public function valid(): bool
    {
        return false;
    }

    public function getErrors(): FormValidationErrorCollection
    {
        return FormValidationErrorCollection::empty();
    }

    public function getValues(): array
    {
        return $this->values;
    }
}
