<?php

namespace App\DTO;

use Illuminate\Contracts\Validation\Validator as ValidationValidator;

class ExemploDTO extends AbstractDTO implements InterfaceDTO
{
    // ESTA dto trabalha com ESTES tipos de DADOS

    // Definindo tipos
    // public string $name;
    // public int $idade;
    // public bool $situacao;

    // feat do php 8, ja define os atributos no construct (sendo public)
    // readonly outra feat do php 8 , uma vez o dado setado, não pode se alterado
    public function __construct(
        public readonly ?string $name,
        public readonly ?int $idade = 0,
        public readonly ?bool $situacao = false
    ) {
        $this->validate();
    }

    // definindo padrao
    // public function __construct(
    //     string $name,
    //     int $idade,
    //     bool $situacao
    // ) {
    // $this->name = $name;
    // $this->idade = $idade;
    // $this->situacao = $situacao;
    // }

    // validações

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'min:5'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'necessario',
            'name.string' => 'precisa ser string',
            'name.min' => 'minimo :min',
        ];
    }

    public function validator(): ValidationValidator
    {
        return validator($this->toArray(), $this->rules(), $this->messages());
    }

    public function validate(): array
    {
        return $this->validator()->validate();
    }
}
