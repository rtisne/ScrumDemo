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
    $this->open("/ScrumDev/src/web/listProjects.php");
    $this->click("//button[@type='button']");
    $this->waitForPageToLoad("30000");
    $this->assertEquals("http://localhost/ScrumDev/src/web/createProject.php", $this->getLocation());
    $this->verifyText("css=h2.text-center", "Creer un nouveau projet");
    $this->assertTrue($this->isElementPresent("//label['text()=Nom du projet']"));
    $this->type("name=name", "Scrum");
    $this->assertTrue($this->isElementPresent("//label['text()=Description du projet']"));
    $this->type("name=description", "Méthode agile");
    $this->assertTrue($this->isElementPresent("//label['text()=Membre']"));
    $this->type("id=add_member_input", "thom");
    $this->type("id=add_member_input", "romai");
    $this->assertTrue($this->isElementPresent("//label['text()=Product Owner']"));
    $this->click("name=submit");
    $this->waitForPageToLoad("30000");
    $this->verifyText("css=h3.panel-title", "Scrum");
    $this->verifyText("css=div.panel-body", "Méthode agile");
  }
}
?>