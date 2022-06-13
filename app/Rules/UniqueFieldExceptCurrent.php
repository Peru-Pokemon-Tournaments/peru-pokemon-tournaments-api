<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UniqueFieldExceptCurrent implements Rule
{
    /**
     * The model name.
     *
     * @var string
     */
    private string $modelName;

    /**
     * The field name.
     *
     * @var string
     */
    private string $fieldName;

    /**
     * Create a new rule instance.
     *
     * @param string $modelName
     * @param string $fieldName
     */
    public function __construct(
        string $modelName,
        string $fieldName
    ) {
        $this->modelName = $modelName;
        $this->fieldName = $fieldName;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $model = request()->route($this->modelName);

        return get_class($model)::where($this->fieldName, '=', $value)
            ->where('id', '!=', $model->id)
            ->get()
            ->isEmpty();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return trans('validation.unique_field_except_current', [$this->fieldName]);
    }
}
