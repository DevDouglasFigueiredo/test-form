<?php

namespace tests\PageObject;

use Exception;
use Facebook\WebDriver\WebDriver;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverExpectedCondition;
use Facebook\WebDriver\WebDriverWait;

use function PHPUnit\Framework\throwException;

class PageCreateLogin
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
        if(!$inputName){
            throw new Exception("Elemento não encontrado");
        }

        $this->driver->findElement($inputName)->sendKeys($name);
    }

    public function fillLastName(string $lastName)
    {
        $inputLastName = WebDriverBy::cssSelector('input[name="lastname"]');
        if(!$inputLastName){
            throw new Exception("Elemento não encontrado");
        }
        $this->driver->findElement($inputLastName)->sendKeys($lastName);
    }

    public function chooseGender()
    {
        $radioGender = WebDriverBy::id("sex-0");

        if(!$radioGender){
            throw new Exception("Elemento não encontrado");
        }

        $this->driver->findElement($radioGender)->click();
    }

    public function yearsExp()
    {
        $radioYears = WebDriverBy::id("exp-0");
        if(!$radioYears){
            throw new Exception("Elemento não encontrado");
        }

        $this->driver->findElement($radioYears)->click();
    }

    public function dateBirthday(string $birthday)
    {
        $inputDateBirthday = WebDriverBy::id("datepicker");
        if(!$inputDateBirthday){
            throw new Exception("Elemento não encontrado");
        }
        
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

    
}
