<?php

namespace perf\Form\Submission;

use perf\Form\Validation\FormValidationErrorCollection;

class NoSubmission implements SubmissionInterface
{
    private FormValidationErrorCollection $errors;

    public function __construct(private readonly array $values)
    {
        $this->errors = new FormValidationErrorCollection([]);
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
        return $this->errors;
    }

    public function getValues(): array
    {
        return $this->values;
    }
}
