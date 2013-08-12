<?php
class MrtBehavior extends CBehavior
{
  public function dump( $obj )
  {
    CVarDumper::dump($obj,10, true);
  }

}
