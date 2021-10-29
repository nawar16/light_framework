<?php

namespace nawar\framework\form;


use nawar\framework\Model;

abstract class BaseField
{
    public Model $model;
    public string $attribute;
    public function __construct(Model $model, string $attribute)
    {
        $this->model = $model;
        $this->attribute = $attribute;
    }
    abstract public function renderInput(): string ;
    public function __toString()
    {
        return sprintf('
             <div class="form-group">
                  <label >%s</label>
              </div>
              %s
             <div class="text-danger">
                   %s
             </div>',
            $this->model->getLabel($this->attribute) ?? $this->attribute,
            $this->renderInput(),
            $this->model->getFirstError($this->attribute)
        );
    }
}