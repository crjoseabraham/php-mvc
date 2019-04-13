<?php
namespace Controllers;

class Index
{
  public function home()
  {
    view('Index/home');
  }

  public function about()
  {
    view('Index/about');
  }
}