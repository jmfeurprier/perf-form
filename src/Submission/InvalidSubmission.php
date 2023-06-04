<?php

namespace perf\Form\Submission;

use perf\Form\Validation\FormValidationErrorCollection;

class InvalidSubmission implements SubmissionInterface
{
    public function __construct(
        private readonly FormValidationErrorCollection $errors,
        private readonly array $values
    ) {
    }

    public function submitted(): bool
    {
        return true;
    }

    public function valid(): bool
    {
        return false;
    }

    public function getErrors(): FormValidationErrorCollection
    {
        return $this->errors;
    }

    public function getValues(): array
    {
        return $this->values;
    }
}
