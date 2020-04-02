<?php

namespace Postbuffer\Channels\Forms;

class Post
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
                    "label" => trans('channels::post.label.name'),
                    "placeholder" => trans('channels::post.placeholder.name'),
                    "rules" => '',
                    "group" => "main",
                    "section" => "first",
                    "attributes" => [
                        'wrapper' => [],
                        "label" => [],
                        "input" => [],

                    ],
                ],
                'content' => [
                    "type" => 'text',
                    "label" => trans('channels::post.label.content'),
                    "placeholder" => trans('channels::post.placeholder.content'),
                    "rules" => '',
                    "group" => "main",
                    "section" => "first",
                    "attributes" => [
                        'wrapper' => [],
                        "label" => [],
                        "input" => [],

                    ],
                ],
                'posts_id' => [
                    "type" => 'numeric',
                    "label" => trans('channels::post.label.posts_id'),
                    "placeholder" => trans('channels::post.placeholder.posts_id'),
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
