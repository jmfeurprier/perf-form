<?php

namespace perf\Form\Submission;

use perf\Form\Validation\FormValidationErrorCollection;

interface SubmissionInterface
{
    public function submitted(): bool;

    public function valid(): bool;

    public function getErrors(): FormValidationErrorCollection;

    public function getValues(): array;
}
