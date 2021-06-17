<?php

interface ICrudDAL
{
    function get ();

    function add ($payload);

    function edit ($payload);

    function delete ($id);
}

?>