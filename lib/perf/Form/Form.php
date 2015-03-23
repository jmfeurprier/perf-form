<?php

namespace perf\Form;

use perf\Form\Field\Field;
use perf\Form\Field\Fields;

/**
 *
 *
 */
class Form
{

    /**
     *
     *
     * @var Fields
     */
    private $fields;

    /**
     *
     *
     * @var Error[]
     */
    private $errors = array();

    /**
     *
     *
     * @param Field $field
     * @return Field
     */
    public function addField(Field $field)
    {
        $this->getFields()->add($field);

        return $field;
    }

    /**
     *
     *
     * @param array $submittedValues
     * @return SubmissionResult
     */
    public function submit(array $submittedValues)
    {
        $this->errors = array();

        if (!$this->submittable($submittedValues)) {
            return new NotSubmitted($this->getValues());
        }

        $values = $this->getFields()->setSubmittedValues($submittedValues)->getValues();

        $this->validate($values);

        if (count($this->errors) > 0) {
            $this->onInvalid($values);

            return new InvalidValuesSubmitted($this->errors, $values);
        }

        $this->onValid($values);

        return new ValidValuesSubmitted($values);
    }

    /**
     *
     * Default implementation, to be overridden.
     *
     * @param {string:mixed} $submittedValues
     * @return bool
     */
    protected function submittable(array $submittedValues)
    {
        return true;
    }

    /**
     *
     * Default implementation, to be overridden.
     *
     * @param {string:mixed} $values
     * @return void
     */
    protected function validate(array $values)
    {
    }

    /**
     *
     *
     * @return Fields
     */
    public function getFields()
    {
        if (!isset($this->fields)) {
            $this->fields = new Fields();
        }

        return $this->fields;
    }

    /**
     *
     *
     * @param string $id
     * @return Error
     */
    protected function addError($id)
    {
        $error = new Error($id);

        $this->errors[] = $error;

        return $error;
    }

    /**
     *
     *
     * @return int
     */
    protected function getErrorCount()
    {
        return count($this->errors);
    }

    /**
     *
     * Default implementation.
     *
     * @param {string:mixed} $values
     * @return void
     */
    protected function onValid(array $values)
    {
    }

    /**
     *
     * Default implementation.
     *
     * @param {string:mixed} $values
     * @return void
     */
    protected function onInvalid(array $values)
    {
    }

    /**
     *
     *
     * @return {string:mixed}
     */
    public function getValues()
    {
        return $this->getFields()->getValues();
    }

    /**
     *
     *
     * @return Form Fluent return.
     */
    public function resetFields()
    {
        $this->getFields()->reset();

        return $this;
    }
}
