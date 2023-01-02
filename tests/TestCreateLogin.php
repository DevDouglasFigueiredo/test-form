<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use Facebook\WebDriver\WebDriver;
use tests\PageObject\PageCreateLogin;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverExpectedCondition;

class TestCreateLogin extends TestCase
{

    private static WebDriver $driver;

    public static function setUpBeforeClass(): void
    {
        $host = 'http://localhost:4444/wd/hub';
        $capabilities = DesiredCapabilities::chrome();
        // self::$driver = RemoteWebDriver::create($host, $capabilities);
        $options = new ChromeOptions();
        $options->addArguments(['headless']); // método para o navegador nao precisar abrir
        $capabilities->setCapability(ChromeOptions::CAPABILITY, $options);
        self::$driver = RemoteWebDriver::create($host, $capabilities);
    }

    protected function setUp(): void
    {
        self::$driver->get("https://www.techlistic.com/p/selenium-practice-form.html");
    }

    public function testCreateLoginSucess()
    {
        $this->PageCreateLogin = new PageCreateLogin(self::$driver);
        $this->PageCreateLogin->acessFormHomeScreen();
        $this->PageCreateLogin->fillName("Anyone");
        $this->PageCreateLogin->fillLastName("Else");
        $this->PageCreateLogin->chooseGender();
        $this->PageCreateLogin->yearsExp();
        $this->PageCreateLogin->dateBirthday("22/06/1988");
        $this->PageCreateLogin->selectProfession();
        $this->PageCreateLogin->automationTools();
        $this->PageCreateLogin->chooseContinent("South America");
        $this->PageCreateLogin->chooseSeleniumComands();
        $this->PageCreateLogin->clickToDownload();

        $this->assertSame(
            "https://github.com/stanfy/behave-rest/blob/master/features/conf.yaml",
            self::$driver->getCurrentURL()
        );

        $this->assertStringContainsString(
            '© 2023 GitHub, Inc.',
            self::$driver->getPageSource()
        );
    }

    public function tearDown(): void
    {
        self::$driver->close();
    }
}
