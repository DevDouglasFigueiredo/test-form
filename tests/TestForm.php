<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use Facebook\WebDriver\WebDriver;
use tests\PageObject\PageTestForm;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;

class TestForm extends TestCase{
    
    private static WebDriver $driver;

    public static function setUpBeforeClass(): void
    {
        $host = 'http://localhost:4444/wd/hub';
        $capabilities = DesiredCapabilities::chrome();
        // self::$driver = RemoteWebDriver::create($host, $capabilities);
        $options = new ChromeOptions(); 
        $options->addArguments( [ 'headless' ] ); // método para o navegador nao precisar abrir
        $capabilities->setCapability( ChromeOptions::CAPABILITY, $options ); 
        self::$driver = RemoteWebDriver::create($host, $capabilities);
    }

    protected function setUp(): void
    {
        self::$driver->get("https://www.techlistic.com/p/selenium-practice-form.html");
        $this->PageTestForm = new PageTestForm(self::$driver);
        $this->assertFalse(false);
        $this->assertTrue(true);
    }

    public function testAcessFormHomeScreen()
    {
        $this->PageTestForm->acessFormHomeScreen();
        $this->assertSame(
            "https://www.techlistic.com/p/selenium-practice-form.html",
            self::$driver->getCurrentURL()
        );
    }

    public function testFillName()
    {
        $this->PageTestForm->fillName("Anyone");
    }

    public function testFillLastName()
    {
        $this->PageTestForm->fillLastName("Else");
    }

    public function testChooseGender()
    {
        $this->PageTestForm->chooseGender();
    }

    public function testYearsExp()
    {
        $this->PageTestForm->yearsExp();
    }

    public function testDateBirthday()
    {
        $this->PageTestForm->dateBirthday("22/06/1988");
    }

    public function testSelectProfession()
    {
        $this->PageTestForm->selectProfession();
    }

    public function testAutomationTools()
    {
        $this->PageTestForm->automationTools();
    }

    public function testChooseContinent()
    {
        $this->PageTestForm->chooseContinent("South America");
    }

    public function testChooseSeleniumComands()
    {
        $this->PageTestForm->chooseSeleniumComands();
    }

    public function testClickToDownload()
    {
        $this->PageTestForm->clickToDownload();
    }

    public function testSubmitButton()
    {
        $this->PageTestForm->submitButton();
    }

    public static function tearDownAfterClass(): void
    {
        self::$driver->close();
    }





}