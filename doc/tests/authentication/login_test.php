<?php
class Example extends PHPUnit_Extensions_SeleniumTestCase
{
  protected function setUp()
  {
    $this->setBrowser("*chrome");
    $this->setBrowserUrl("http://localhost/");
  }

  public function testMyTestCase()
  {
    $this->open("/ScrumDev/src/web/signin.php");
    $this->type("id=email", "visiteur@hotmail.fr");
    $this->type("id=password", "visiteurScrum");
    $this->click("name=submit");
    $this->waitForPageToLoad("30000");
    $this->assertEquals("http://localhost/ScrumDev/src/web/listProjects.php", $this->getLocation());
    $this->assertTrue($this->isElementPresent("link=Scrumify"));
    $this->assertTrue($this->isElementPresent("link=Visitor visiteur"));
    $this->assertTrue($this->isElementPresent("link=Paramètre du compte"));
    $this->assertTrue($this->isElementPresent("id=logout_link"));
    $this->assertTrue($this->isElementPresent("//button[@type='button']"));
  }
}
?>