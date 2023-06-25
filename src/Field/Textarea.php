<?php

namespace perf\Form\Field;

class Textarea extends FieldBase
{
    final public const FIELD_TYPE_ID = 'textarea';

    public function setRowCount(int $count): self
    {
        $this->setAttribute('rows', $count);

        return $this;
    }

    public function setColumnCount(int $count): self
    {
        $this->setAttribute('cols', $count);

        return $this;
    }
}
