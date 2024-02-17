<?php 

namespace VedianSoftware\Cms\Contracts;

interface ViewContract
{
    public function render();
    public function path();
}