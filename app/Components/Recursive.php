<?php

namespace App\Components;

class Recursive
{
    private $data;
    private $htmlOption = '';

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function recursive($parentId, $id = 0, $text = '')
    {
        foreach ($this->data as $cat) {
            if ($cat['parent_id'] == $id) {
                if (!empty($parentId) && $parentId == $cat['id']) {
                    $this->htmlOption .= "<option selected value='" . $cat['id'] . "'>" . $text . $cat['name'] . "</option>";
                } else {
                    $this->htmlOption .= "<option value='" . $cat['id'] . "'>" . $text . $cat['name'] . "</option>";
                }
                $this->recursive($parentId, $cat['id'], $text . '----');
            }

        }
        return $this->htmlOption;
    }
}
