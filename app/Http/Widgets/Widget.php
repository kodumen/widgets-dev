<?php

namespace App\Http\Widgets;

class Widget
{
    public $name;
    public $data;
    protected $template;

    public function __construct($data)
    {
        $this->data = $data;
        $this->template = config('widget.templates.' . strtolower(class_basename($this)));
    }

    public function __toString()
    {
        return view($this->template, ['widget' => $this])->render();
    }
}