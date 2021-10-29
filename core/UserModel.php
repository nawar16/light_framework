<?php

namespace nawar\framework;


use nawar\framework\db\DbModel;

abstract class UserModel extends DbModel
{
    abstract public function getDisplayName(): string;
}