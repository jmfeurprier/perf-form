<?php

namespace perf\Form\Field;

use PHPUnit\Framework\TestCase;

class CheckboxTest extends TestCase
{
    public function testGetFieldTypeId(): void
    {
        $name = 'foo';

        $field = $this->createField($name);

        $this->assertSame(Checkbox::FIELD_TYPE_ID, $field->getFieldTypeId());
    }

    public function testIsCheckedDefault(): void
    {
        $name = 'foo';

        $field = $this->createField($name);

        $this->assertFalse($field->isChecked());
    }

    /**
     * @return array<mixed[]>
     */
    public static function dataProviderIsCheckedReturnsFalse(): array
    {
        return [
            [
                '1',
                '0',
                '0',
                null,
            ],
            [
                '1',
                '0',
                '0',
                '0',
            ],
            [
                '1',
                '0',
                '0',
                '2',
            ],
            [
                '1',
                '0',
                '1',
                '0',
            ],
            [
                '0',
                '1',
                '0',
                '1',
            ],
        ];
    }

    /**
     * @dataProvider dataProviderIsCheckedReturnsFalse
     */
    public function testIsCheckedReturnsFalse(
        string $checkedValue,
        string $uncheckedValue,
        string $initialValue,
        ?string $submittedValue
    ): void {
        $name = 'foo';

        $field = $this->createField($name)
            ->setCheckedValue($checkedValue)
            ->setUncheckedValue($uncheckedValue)
            ->setInitialValue($initialValue)
        ;

        $field->submitValue($submittedValue);

        $this->assertFalse($field->isChecked());
        $this->assertSame($uncheckedValue, $field->getValue());
    }

    /**
     * @return array<mixed[]>
     */
    public static function dataProviderIsCheckedReturnsTrue(): array
    {
        return [
            [
                '1',
                '0',
                '0',
                '1',
            ],
            [
                '1',
                '0',
                '1',
                '1',
            ],
            [
                '0',
                '1',
                '0',
                '0',
            ],
            [
                '0',
                '1',
                '1',
                '0',
            ],
            [
                '2',
                '0',
                '0',
                '2',
            ],
        ];
    }

    /**
     * @dataProvider dataProviderIsCheckedReturnsTrue
     */
    public function testIsCheckedReturnsTrue(
        string $checkedValue,
        string $uncheckedValue,
        string $initialValue,
        string $submittedValue
    ): void {
        $name = 'foo';

        $field = $this->createField($name)
            ->setCheckedValue($checkedValue)
            ->setUncheckedValue($uncheckedValue)
            ->setInitialValue($initialValue)
        ;

        $field->submitValue($submittedValue);

        $this->assertTrue($field->isChecked());
        $this->assertSame($checkedValue, $field->getValue());
    }

    protected function createField(string $name): Checkbox
    {
        return new Checkbox($name);
    }
}
