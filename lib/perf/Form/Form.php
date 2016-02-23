<?php

namespace perf\Form;

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
     * @var bool
     */
    private $submitted = false;

    /**
     *
     *
     * @var bool
     */
    private $valid = false;

    /**
     *
     *
     * @var ErrorCollection
     */
    private $errors;

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
     * @return void
     */
    public function submit(array $submittedValues = array())
    {
        $this->submitted = false;
        $this->errors    = new ErrorCollection();
        $this->valid     = false;

        if (!$this->submittable($submittedValues)) {
            return;
        }

        $this->submitted = true;

        $fields = $this->getFields();
        $fields->submitValues($submittedValues);

        $values = $fields->getValues();

        $this->validate($values);

        if (count($this->errors) > 0) {
            $this->onInvalid($values);

            return;
        }

        $this->valid = true;

        $this->onValid($values);
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

        $this->getErrors()->add($error);

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
     * @return bool
     */
    public function isSubmitted()
    {
        return $this->submitted;
    }

    /**
     *
     *
     * @return bool
     */
    public function isValid()
    {
        return $this->valid;
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
     * @return ErrorCollection
     */
    public function getErrors()
    {
        if (!isset($this->errors)) {
            $this->errors = new ErrorCollection();
        }

        return $this->errors;
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
