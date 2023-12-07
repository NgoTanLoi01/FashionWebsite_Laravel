<?php

namespace App\Components;

class Recusive
{
    private $data;
    private $htmlSlelect = '';

    public function __construct($data)
    {
        $this->data = $data;
    }
    public function categoryRecusive($parentID, $id = 0, $text = '')
    {
        foreach ($this->data as $value) {
            if ($value['parent_id'] == $id) {
                if (!empty($parentID) && $parentID == $value['id']) { // Sửa ở đây
                    $this->htmlSlelect .= "<option selected value='" . $value['id'] . "'>" . $text . $value['name'] . "</option>";
                } else {
                    $this->htmlSlelect .= "<option value='" . $value['id'] . "'>" . $text . $value['name'] . "</option>";
                }
                $this->categoryRecusive($parentID, $value['id'], $text . '--'); // Sửa ở đây
            }
        }

        return $this->htmlSlelect;
    }
}
