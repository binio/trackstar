<?php

class Mrtfunctions extends CApplicationComponent
{
    public function returnSomething()
    {
        return 'Something';
    }

    public function dump($varName)
    {

     CVarDumper::dump($varName,10, true);
    }
}

