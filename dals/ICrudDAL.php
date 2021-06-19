<?php

interface ICrudDAL
{
    function add ($payload);

    function get ($page);

    function edit ($id, $payload);

    function delete ($id);
}

?>