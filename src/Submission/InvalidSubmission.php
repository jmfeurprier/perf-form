<?php

namespace perf\Form\Submission;

use perf\Form\Validation\FormValidationErrorCollection;

class InvalidSubmission implements SubmissionInterface
{
    private FormValidationErrorCollection $errors;

    private array $values;

    public function __construct(FormValidationErrorCollection $errors, array $values)
    {
        $this->errors = $errors;
        $this->values = $values;
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
