<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DeleteModal extends Component
{
    public $id;
    public $title;
    public $message;
    public $action;
    public $buttonText;

    public function __construct($id, $action, $title = null, $message = null, $buttonText = null)
    {
        $this->id = $id;
        $this->action = $action;
        $this->title = $title;
        $this->message = $message;
        $this->buttonText = $buttonText;
    }

    public function render()
    {
        return view('components.delete-modal');
    }
}
