<?php

namespace perf\Form;

use perf\Form\Field\Field;
use perf\Form\Field\FieldCollection;

/**
 *
 *
 */
class Form
{

    /**
     *
     *
     * @var string
     */
    private $method = 'post';

    /**
     *
     *
     * @var string
     */
    private $action = '';

    /**
     *
     *
     * @var AttributeCollection
     */
    private $attributes;

    /**
     *
     *
     * @var FieldCollection
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
     * @param string $method
     * @return Form Fluent return.
     */
    public function setMethod($method)
    {
        $this->method = $method;

        return $this;
    }

    /**
     *
     *
     * @param string $action
     * @return Form Fluent return.
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

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
     * @param string $key
     * @param mixed $value
     * @return Form Fluent return.
     */
    public function setAttribute($key, $value)
    {
        $this->getAttributes()->set($key, $value);

        return $this;
    }

    /**
     *
     *
     * @param array $submittedValues
     * @return SubmissionOutcome
     */
    public function submit(array $submittedValues = array())
    {
        $this->errors = array();

        if (!$this->submittable($submittedValues)) {
            return new NoSubmission($this->getValues());
        }

        $fields = $this->getFields();
        $fields->setSubmittedValues($submittedValues);

        $values = $fields->getValues();

        $this->validate($values);

        if (count($this->errors) > 0) {
            $this->onInvalid($values);

            return new InvalidSubmission($this->errors, $values);
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
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     *
     *
     * @return string
     */
    public function getAction()
    {
        return $this->action;
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

    /**
     *
     * Lazy getter.
     *
     * @return FieldCollection
     */
    public function getFields()
    {
        if (!isset($this->fields)) {
            $this->fields = new FieldCollection();
        }

        return $this->fields;
    }

    /**
     *
     *
     * @param string $name
     * @return bool
     */
    public function hasAttribute($name)
    {
        return $this->getAttributes()->has($name);
    }

    /**
     *
     *
     * @param string $name
     * @return mixed
     */
    public function getAttribute($name)
    {
        return $this->getAttributes()->get($name);
    }

    /**
     *
     * Lazy getter.
     *
     * @return AttributeCollection
     */
    public function getAttributes()
    {
        if (!isset($this->attributes)) {
            $this->attributes = new AttributeCollection();
        }

        return $this->attributes;
    }
}
