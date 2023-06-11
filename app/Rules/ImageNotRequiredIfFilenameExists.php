<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ImageNotRequiredIfFilenameExists implements Rule
{
    protected $filename;

    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    public function passes($attribute, $value)
    {
        // Check if the filename column has a value
        return !empty($this->filename);
    }

    public function message()
    {
        return 'The :attribute field is required.';
    }
}
