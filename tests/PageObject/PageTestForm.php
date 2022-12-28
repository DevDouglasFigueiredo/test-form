<?php

namespace tests\PageObject;

use Facebook\WebDriver\WebDriver;
use Facebook\WebDriver\WebDriverBy;

class PageTestForm
{
    private WebDriver $driver;

    public function __construct(WebDriver $driver)
    {
        $this->driver = $driver;
    }

    public function acessFormHomeScreen()
    {
        $titleLocator = WebDriverBy::tagName("h2");
        $this->driver->findElement($titleLocator)->getText("AUTOMATION PRACTICE ME");
    }

    public function fillName(string $name)
    {
        $inputName = WebDriverBy::cssSelector('input[name="firstname"]');
        $this->driver->findElement($inputName)->sendKeys($name);
    }

    public function fillLastName(string $lastName)
    {
        $inputName = WebDriverBy::cssSelector('input[name="lastname"]');
        $this->driver->findElement($inputName)->sendKeys($lastName);
    }

    public function chooseGender()
    {
        $radioGender = WebDriverBy::id("sex-0");
        $this->driver->findElement($radioGender)->click();
    }

    public function yearsExp()
    {
        $radioYears = WebDriverBy::id("exp-0");
        $this->driver->findElement($radioYears)->click();
    }

    public function dateBirthday(string $birthday)
    {
        $inputDateBirthday = WebDriverBy::id("datepicker");
        $this->driver->findElement($inputDateBirthday)->sendKeys($birthday);
    }

    public function selectProfession()
    {
        $checkTestManual = WebDriverBy::id("profession-0");
        $checkAutomationTest = WebDriverBy::id("profession-1");
        $this->driver->findElement($checkTestManual, $checkAutomationTest)->click();
    }

    public function automationTools()
    {
        $checkUFT = WebDriverBy::id("tool-0");
        $checkProtactor = WebDriverBy::id("tool-1");
        $checkSelenium = WebDriverBy::id("tool-2");
        $this->driver->findElement($checkUFT, $checkProtactor, $checkSelenium)->click();
    }

    public function chooseContinent(string $continent)
    {
        $selectContinent = WebDriverBy::id("continents");
        $this->driver->findElement($selectContinent)->getText($continent);
    }

    public function chooseSeleniumComands()
    {
        $browserComands = WebDriverBy::cssSelector("#selenium_commands > option:nth-child(1)");
        $this->driver->findElement($browserComands)->click();
    }

    public function uploadFile(string $pathFile)
    {
        $inputUploadFile = WebDriverBy::id("photo");
        $this->driver->findElement($inputUploadFile)->sendKeys($pathFile);

    }

    public function clickToDownload()
    {
        $linkToDownload = WebDriverBy::cssSelector("#post-body-3077692503353518311 > div:nth-child(1) > div > div > h2:nth-child(2) > div:nth-child(1) > div > div.controls > div:nth-child(2) > div > a");

        $this->driver->findElement($linkToDownload)->click();
    }

    public function submitButton()
    {
        $button = WebDriverBy::id("submit");
        $this->driver->findElement($button)->click();
    }
}
