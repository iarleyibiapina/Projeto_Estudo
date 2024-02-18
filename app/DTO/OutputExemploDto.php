<?php

namespace App\DTO;

use Illuminate\Contracts\Validation\Validator;

class OutputExemploDTO extends AbstractDTO implements InterfaceDTO
{
    // define regras de 'saida' ou de respota do banco para o controller
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
