<?php

namespace perf\Form;

/**
 *
 *
 */
class Textarea extends FieldBase
{

    const FIELD_TYPE_ID = 'textarea';

    /**
     *
     *
     * @param int $count
     * @return Textarea Fluent return.
     */
    public function setRowCount($count)
    {
        $this->setAttribute('rows', $count);

        return $this;
    }

    /**
     *
     *
     * @param int $count
     * @return Textarea Fluent return.
     */
    public function setColumnCount($count)
    {
        $this->setAttribute('cols', $count);

        return $this;
    }
}
