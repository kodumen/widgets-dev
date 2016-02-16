<?php

namespace App\Http\Widgets;

class Widget
{
    public $data;
    private $name;
    private $template;

    public function __construct($data)
    {
        $this->data = $data;
        $this->name = snake_case(class_basename($this));
        $this->template = config('widgets.templates.' . $this->name);
    }

    /**
     * Set the template used by this widgets.
     * @param $template
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    }

    /**
     * Turn this widgets into a string.
     * @return string
     * @throws \Exception
     * @throws \Throwable
     */
    public function __toString()
    {
        return view($this->template, [$this->name => $this])->render();
    }
}