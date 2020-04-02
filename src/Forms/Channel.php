<?php

namespace Channels\Postbuffer\Forms;

class Channel
{
    /**
     * Variable to store form configuration.
     *
     * @var collection
     */
    protected $form;

    /**
     * Variable to store form configuration.
     *
     * @var collection
     */
    protected $element;

    /**
     * Initialize the form.
     *
     * @return null
     */
    public function __construct()
    {
        $this->setForm();
    }

    /**
     * Return form elements.
     *
     * @return array.
     */
    public function form($element = 'fields', $grouped = true)
    {
        $item = collect($this->form->get($element));
        if ($element == 'fields' && $grouped == true) {
            return $item->groupBy(['group', 'section']);
        }
        return $item;

    }

    /**
     * Sets the form and form elements.
     * @return null.
     */
    public function setForm()
    {
        $this->form = collect([
            'form' => [
                'store' => [],
                'update' => [],
            ],
            'groups' => [
                'main' => 'Main',
            ],
            'fields' => [
                'name' => [
                    "type" => 'text',
                    "label" => trans('postbuffer::channel.label.name'),
                    "placeholder" => trans('postbuffer::channel.placeholder.name'),
                    "rules" => '',
                    "group" => "main",
                    "section" => "first",
                    "attributes" => [
                        'wrapper' => [],
                        "label" => [],
                        "input" => [],

                    ],
                ],
            ]
        );

    }
}
