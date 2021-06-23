<?php


namespace TestTaskQDigital;


class View
{

    function generate($content_view, $template_view, $data = null)
    {
        /*
        if(is_array($data)) {
            // преобразуем элементы массива в переменные
            extract($data);
        }
        */

        include 'application/view/'.$template_view;
    }

}