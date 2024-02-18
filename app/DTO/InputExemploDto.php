<?php

namespace App\DTO;

use Illuminate\Contracts\Validation\Validator;

class InputExemploDTO extends AbstractDTO
{
    // define regras de 'entrada' do controller para o banco 
    public function __construct(public string $name, public int $idade = 0 | null)
    {
        $this->validate();
    }
    public function rules(): array
    {
        return [];
    }
    public function messages(): array
    {
        return [];
    }
    public function validator(): Validator
    {
        return validator($this->toArray(), $this->rules(), $this->messages());
    }
    public function validate(): array
    {
        return $this->validator()->validate();
    }
}
