<?php

namespace perf\Form;

/**
 *
 *
 */
class FieldFactory
{

    /**
     *
     *
     * @var {string:string}
     */
    private $fieldClasses = array(
        Checkbox::FIELD_TYPE_ID        => 'perf\\Form\\Checkbox',
        FileUploadInput::FIELD_TYPE_ID => 'perf\\Form\\FileUploadInput',
        HiddenInput::FIELD_TYPE_ID     => 'perf\\Form\\HiddenInput',
        Radio::FIELD_TYPE_ID           => 'perf\\Form\\Radio',
        Select::FIELD_TYPE_ID          => 'perf\\Form\\Select',
        Textarea::FIELD_TYPE_ID        => 'perf\\Form\\Textarea',
        TextInput::FIELD_TYPE_ID       => 'perf\\Form\\TextInput',
    );

    /**
     *
     *
     * @param string $fieldTypeId
     * @param string $name
     * @return Field
     * @throws \DomainException
     */
    public function create($fieldTypeId, $name)
    {
        if (!array_key_exists($fieldTypeId, $this->fieldClasses)) {
            throw new \DomainException("Unknown field type Id '{$fieldTypeId}'.");
        }

        $fieldClass = $this->fieldClasses[$fieldTypeId];

        return new $fieldClass($name);
    }
}
