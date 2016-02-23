<?php

namespace perf\Form;

/**
 *
 *
 */
class ErrorCollection implements \IteratorAggregate, \Countable
{

    /**
     * Wrapped errors, indexed by Id.
     *
     * @var {string Error Id:Error}
     */
    private $errors = array();

    /**
     * Constructor.
     *
     * @param Error[] $errors
     * @return void
     */
    public function __construct(array $errors = array())
    {
        foreach ($errors as $error) {
            $this->add($error);
        }
    }

    /**
     *
     *
     * @param Error $error
     * @return void
     */
    public function add(Error $error)
    {
        $this->errors[$error->getId()] = $error;
    }

    /**
     *
     *
     * @return Error[]
     */
    public function toArray()
    {
        return array_values($this->errors);
    }

    /**
     *
     *
     * @return string[]
     */
    public function getIds()
    {
        return array_keys($this->errors);
    }

    /**
     *
     *
     * @return string[]
     */
    public function getMessages()
    {
        $messages = array();

        foreach ($this->errors as $error) {
            $messages[] = $error->getMessage();
        }

        return $messages;
    }

    /**
     *
     *
     * @param string $id
     * @return bool
     * @throws \InvalidArgumentException
     */
    public function has($id)
    {
        if (!is_string($id)) {
            throw new \InvalidArgumentException();
        }

        return array_key_exists($id, $this->errors);
    }

    /**
     *
     *
     * @return Traversable
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->errors);
    }

    /**
     *
     *
     * @return int
     */
    public function count()
    {
        return count($this->errors);
    }
}
