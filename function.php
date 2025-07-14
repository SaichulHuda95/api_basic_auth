<?php

function validate($username, $password)
{
    if ($username != 'test') {
        return false;
    } elseif (md5($password) != '2fc24a43533f51de9a31ad05388d75aa') { //password = Saichul.95
        return false;
    }

    return true;
}
// file untuk pembuatan fungsi query pengambilan data