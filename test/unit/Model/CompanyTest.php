<?php

namespace jlgtechnology\model;

use PHPUnit\Framework\TestCase;

use Mockery;

use \DateTime as DateTime;

use \Exception as Exception;

class CompanyTest extends TestCase
{
    public function tearDown()
    {
        Mockery::close();
    }

    public function testGetFields()
    {
        $this->assertEquals(
            [
                "Name",
                "CRN",
                "IncorporationDate",
                "SICCodes",
                "LegalStatus",
                "TradingAddress1",
                "TradingAddress2",
                "TradingAddress3",
                "TradingAddress4",
                "TradingAddressPostcode",
                "RegisteredAddress1",
                "RegisteredAddress2",
                "RegisteredAddress3",
                "RegisteredAddress4",
                "RegisteredAddressPostcode",
                "Telephone",
                "Email",
                "Website",
                "Notes",
                "Position",
                "Files"
            ],
            Company::getFields()
        );
    }

    public function testCreate()
    {
        $strName = "Test 1";
        $strCRN = "12345678";
        $datetimeIncorporationDate = new DateTime();
        $strSicCodes = "00000";
        $intLegalStatus = 1;
        $strTradingAddressOne = "Test 3";
        $strTradingAddressTwo = "Test 4";
        $strTradingAddressThree = "Test 5";
        $strTradingAddressFour = "Test 6";
        $strTradingAddressPostcode = "AB1 2CD";
        $strRegisteredAddressOne = "Test 7";
        $strRegisteredAddressTwo = "Test 8";
        $strRegisteredAddressThree = "Test 9";
        $strRegisteredAddressFour = "Test 10";
        $strRegisteredAddressPostcode = "EF3 4GH";
        $strTelephone = "07777 777777";
        $strEmail = "test@email.com";
        $strWebsite = "www.test.com";
        $strNotes = "Test 11";
        $intPosition = Company::POSITION_DIRECTOR_BIT;
        $arrModelFiles = [
            Mockery::mock(File::class)
                ->shouldReceive("getCategoryId")
                ->withNoArgs()
                ->andReturn(File::CATEGORY_SEARCHES)
                ->once()
                ->mock()
        ];

        $modelCompany = Company::create(
            $strName,
            $strCRN,
            $datetimeIncorporationDate,
            $strSicCodes,
            $intLegalStatus,
            $strTradingAddressOne,
            $strTradingAddressTwo,
            $strTradingAddressThree,
            $strTradingAddressFour,
            $strTradingAddressPostcode,
            $strRegisteredAddressOne,
            $strRegisteredAddressTwo,
            $strRegisteredAddressThree,
            $strRegisteredAddressFour,
            $strRegisteredAddressPostcode,
            $strTelephone,
            $strEmail,
            $strWebsite,
            $strNotes,
            $intPosition,
            $arrModelFiles
        );

        $this->assertEquals(
            $strName,
            $modelCompany->getName()
        );

        $this->assertEquals(
            $strCRN,
            $modelCompany->getCompanyRegistrationNumber()
        );

        $this->assertEquals(
            $datetimeIncorporationDate->getTimestamp(),
            $modelCompany->getIncorporationDate()->getTimestamp()
        );

        $this->assertEquals(
            $strSicCodes,
            $modelCompany->getSicCodes()
        );

        $this->assertEquals(
            $intLegalStatus,
            $modelCompany->getLegalStatus()
        );

        $this->assertEquals(
            $strTradingAddressOne,
            $modelCompany->getTradingAddressLine1()
        );

        $this->assertEquals(
            $strTradingAddressTwo,
            $modelCompany->getTradingAddressLine2()
        );

        $this->assertEquals(
            $strTradingAddressThree,
            $modelCompany->getTradingAddressLine3()
        );

        $this->assertEquals(
            $strTradingAddressFour,
            $modelCompany->getTradingAddressLine4()
        );

        $this->assertEquals(
            $strTradingAddressPostcode,
            $modelCompany->getTradingAddressPostcode()
        );

        $this->assertEquals(
            $strRegisteredAddressOne,
            $modelCompany->getRegisteredAddressLine1()
        );

        $this->assertEquals(
            $strRegisteredAddressTwo,
            $modelCompany->getRegisteredAddressLine2()
        );

        $this->assertEquals(
            $strRegisteredAddressThree,
            $modelCompany->getRegisteredAddressLine3()
        );

        $this->assertEquals(
            $strRegisteredAddressFour,
            $modelCompany->getRegisteredAddressLine4()
        );

        $this->assertEquals(
            $strRegisteredAddressPostcode,
            $modelCompany->getRegisteredAddressPostcode()
        );

        $this->assertEquals(
            $strTelephone,
            $modelCompany->getTelephone()
        );

        $this->assertEquals(
            $strEmail,
            $modelCompany->getEmail()
        );

        $this->assertEquals(
            $strWebsite,
            $modelCompany->getWebsite()
        );

        $this->assertEquals(
            $strNotes,
            $modelCompany->getNotes()
        );

        $this->assertEquals(
            $intPosition,
            $modelCompany->getPosition()
        );

        $this->assertEquals(
            $arrModelFiles,
            $modelCompany->getFiles()
        );
    }

    public function testCreate_CRN_Invalid()
    {
        $strName = "Test 1";
        $strCRN = "abcdefgh";
        $datetimeIncorporationDate = new DateTime();
        $strSicCodes = "00000";
        $intLegalStatus = 1;
        $strTradingAddressOne = "Test 3";
        $strTradingAddressTwo = "Test 4";
        $strTradingAddressThree = "Test 5";
        $strTradingAddressFour = "Test 6";
        $strTradingAddressPostcode = "AB1 2CD";
        $strRegisteredAddressOne = "Test 7";
        $strRegisteredAddressTwo = "Test 8";
        $strRegisteredAddressThree = "Test 9";
        $strRegisteredAddressFour = "Test 10";
        $strRegisteredAddressPostcode = "EF3 4GH";
        $strTelephone = "07777 777777";
        $strEmail = "test@email.com";
        $strWebsite = "www.test.com";
        $strNotes = "Test 11";
        $intPosition = Company::POSITION_DIRECTOR_BIT;
        $arrModelFiles = [
            Mockery::mock(File::class)
        ];

        $this->expectException(Exception::class);

        $modelCompany = Company::create(
            $strName,
            $strCRN,
            $datetimeIncorporationDate,
            $strSicCodes,
            $intLegalStatus,
            $strTradingAddressOne,
            $strTradingAddressTwo,
            $strTradingAddressThree,
            $strTradingAddressFour,
            $strTradingAddressPostcode,
            $strRegisteredAddressOne,
            $strRegisteredAddressTwo,
            $strRegisteredAddressThree,
            $strRegisteredAddressFour,
            $strRegisteredAddressPostcode,
            $strTelephone,
            $strEmail,
            $strWebsite,
            $strNotes,
            $intPosition,
            $arrModelFiles
        );
    }

    public function testCreate_SicCodes_Invalid()
    {
        $strName = "Test 1";
        $strCRN = "12345678";
        $datetimeIncorporationDate = new DateTime();
        $strSicCodes = "abc";
        $intLegalStatus = 1;
        $strTradingAddressOne = "Test 3";
        $strTradingAddressTwo = "Test 4";
        $strTradingAddressThree = "Test 5";
        $strTradingAddressFour = "Test 6";
        $strTradingAddressPostcode = "AB1 2CD";
        $strRegisteredAddressOne = "Test 7";
        $strRegisteredAddressTwo = "Test 8";
        $strRegisteredAddressThree = "Test 9";
        $strRegisteredAddressFour = "Test 10";
        $strRegisteredAddressPostcode = "EF3 4GH";
        $strTelephone = "07777 777777";
        $strEmail = "test@email.com";
        $strWebsite = "www.test.com";
        $strNotes = "Test 11";
        $intPosition = Company::POSITION_DIRECTOR_BIT;
        $arrModelFiles = [
            Mockery::mock(File::class)
        ];

        $this->expectException(Exception::class);

        $modelCompany = Company::create(
            $strName,
            $strCRN,
            $datetimeIncorporationDate,
            $strSicCodes,
            $intLegalStatus,
            $strTradingAddressOne,
            $strTradingAddressTwo,
            $strTradingAddressThree,
            $strTradingAddressFour,
            $strTradingAddressPostcode,
            $strRegisteredAddressOne,
            $strRegisteredAddressTwo,
            $strRegisteredAddressThree,
            $strRegisteredAddressFour,
            $strRegisteredAddressPostcode,
            $strTelephone,
            $strEmail,
            $strWebsite,
            $strNotes,
            $intPosition,
            $arrModelFiles
        );
    }

    public function testCreate_Legal_Status_Invalid()
    {
        $strName = "Test 1";
        $strCRN = "12345678";
        $datetimeIncorporationDate = new DateTime();
        $strSicCodes = "00000";
        $intLegalStatus = 999;
        $strTradingAddressOne = "Test 3";
        $strTradingAddressTwo = "Test 4";
        $strTradingAddressThree = "Test 5";
        $strTradingAddressFour = "Test 6";
        $strTradingAddressPostcode = "AB1 2CD";
        $strRegisteredAddressOne = "Test 7";
        $strRegisteredAddressTwo = "Test 8";
        $strRegisteredAddressThree = "Test 9";
        $strRegisteredAddressFour = "Test 10";
        $strRegisteredAddressPostcode = "EF3 4GH";
        $strTelephone = "07777 777777";
        $strEmail = "test@email.com";
        $strWebsite = "www.test.com";
        $strNotes = "Test 11";
        $intPosition = Company::POSITION_DIRECTOR_BIT;
        $arrModelFiles = [
            Mockery::mock(File::class)
        ];

        $this->expectException(Exception::class);

        $modelCompany = Company::create(
            $strName,
            $strCRN,
            $datetimeIncorporationDate,
            $strSicCodes,
            $intLegalStatus,
            $strTradingAddressOne,
            $strTradingAddressTwo,
            $strTradingAddressThree,
            $strTradingAddressFour,
            $strTradingAddressPostcode,
            $strRegisteredAddressOne,
            $strRegisteredAddressTwo,
            $strRegisteredAddressThree,
            $strRegisteredAddressFour,
            $strRegisteredAddressPostcode,
            $strTelephone,
            $strEmail,
            $strWebsite,
            $strNotes,
            $intPosition,
            $arrModelFiles
        );
    }

    public function testCreate_Trading_Postcode_Invalid()
    {
        $strName = "Test 1";
        $strCRN = "12345678";
        $datetimeIncorporationDate = new DateTime();
        $strSicCodes = "00000";
        $intLegalStatus = 1;
        $strTradingAddressOne = "Test 3";
        $strTradingAddressTwo = "Test 4";
        $strTradingAddressThree = "Test 5";
        $strTradingAddressFour = "Test 6";
        $strTradingAddressPostcode = "abcdef";
        $strRegisteredAddressOne = "Test 7";
        $strRegisteredAddressTwo = "Test 8";
        $strRegisteredAddressThree = "Test 9";
        $strRegisteredAddressFour = "Test 10";
        $strRegisteredAddressPostcode = "EF3 4GH";
        $strTelephone = "07777 777777";
        $strEmail = "test@email.com";
        $strWebsite = "www.test.com";
        $strNotes = "Test 11";
        $intPosition = Company::POSITION_DIRECTOR_BIT;
        $arrModelFiles = [
            Mockery::mock(File::class)
        ];

        $this->expectException(Exception::class);

        $modelCompany = Company::create(
            $strName,
            $strCRN,
            $datetimeIncorporationDate,
            $strSicCodes,
            $intLegalStatus,
            $strTradingAddressOne,
            $strTradingAddressTwo,
            $strTradingAddressThree,
            $strTradingAddressFour,
            $strTradingAddressPostcode,
            $strRegisteredAddressOne,
            $strRegisteredAddressTwo,
            $strRegisteredAddressThree,
            $strRegisteredAddressFour,
            $strRegisteredAddressPostcode,
            $strTelephone,
            $strEmail,
            $strWebsite,
            $strNotes,
            $intPosition,
            $arrModelFiles
        );
    }

    public function testCreate_Registered_Postcode_Invalid()
    {
        $strName = "Test 1";
        $strCRN = "12345678";
        $datetimeIncorporationDate = new DateTime();
        $strSicCodes = "00000";
        $intLegalStatus = 1;
        $strTradingAddressOne = "Test 3";
        $strTradingAddressTwo = "Test 4";
        $strTradingAddressThree = "Test 5";
        $strTradingAddressFour = "Test 6";
        $strTradingAddressPostcode = "AB1 2CD";
        $strRegisteredAddressOne = "Test 7";
        $strRegisteredAddressTwo = "Test 8";
        $strRegisteredAddressThree = "Test 9";
        $strRegisteredAddressFour = "Test 10";
        $strRegisteredAddressPostcode = "abcdef";
        $strTelephone = "07777 777777";
        $strEmail = "test@email.com";
        $strWebsite = "www.test.com";
        $strNotes = "Test 11";
        $intPosition = Company::POSITION_DIRECTOR_BIT;
        $arrModelFiles = [
            Mockery::mock(File::class)
        ];

        $this->expectException(Exception::class);

        $modelCompany = Company::create(
            $strName,
            $strCRN,
            $datetimeIncorporationDate,
            $strSicCodes,
            $intLegalStatus,
            $strTradingAddressOne,
            $strTradingAddressTwo,
            $strTradingAddressThree,
            $strTradingAddressFour,
            $strTradingAddressPostcode,
            $strRegisteredAddressOne,
            $strRegisteredAddressTwo,
            $strRegisteredAddressThree,
            $strRegisteredAddressFour,
            $strRegisteredAddressPostcode,
            $strTelephone,
            $strEmail,
            $strWebsite,
            $strNotes,
            $intPosition,
            $arrModelFiles
        );
    }

    public function testCreate_Telephone_Invalid()
    {
        $strName = "Test 1";
        $strCRN = "12345678";
        $datetimeIncorporationDate = new DateTime();
        $strSicCodes = "00000";
        $intLegalStatus = 1;
        $strTradingAddressOne = "Test 3";
        $strTradingAddressTwo = "Test 4";
        $strTradingAddressThree = "Test 5";
        $strTradingAddressFour = "Test 6";
        $strTradingAddressPostcode = "AB1 2CD";
        $strRegisteredAddressOne = "Test 7";
        $strRegisteredAddressTwo = "Test 8";
        $strRegisteredAddressThree = "Test 9";
        $strRegisteredAddressFour = "Test 10";
        $strRegisteredAddressPostcode = "EF3 4GH";
        $strTelephone = "12345678";
        $strEmail = "test@email.com";
        $strWebsite = "www.test.com";
        $strNotes = "Test 11";
        $intPosition = Company::POSITION_DIRECTOR_BIT;
        $arrModelFiles = [
            Mockery::mock(File::class)
        ];

        $this->expectException(Exception::class);

        $modelCompany = Company::create(
            $strName,
            $strCRN,
            $datetimeIncorporationDate,
            $strSicCodes,
            $intLegalStatus,
            $strTradingAddressOne,
            $strTradingAddressTwo,
            $strTradingAddressThree,
            $strTradingAddressFour,
            $strTradingAddressPostcode,
            $strRegisteredAddressOne,
            $strRegisteredAddressTwo,
            $strRegisteredAddressThree,
            $strRegisteredAddressFour,
            $strRegisteredAddressPostcode,
            $strTelephone,
            $strEmail,
            $strWebsite,
            $strNotes,
            $intPosition,
            $arrModelFiles
        );
    }

    public function testCreate_Email_Invalid()
    {
        $strName = "Test 1";
        $strCRN = "12345678";
        $datetimeIncorporationDate = new DateTime();
        $strSicCodes = "00000";
        $intLegalStatus = 1;
        $strTradingAddressOne = "Test 3";
        $strTradingAddressTwo = "Test 4";
        $strTradingAddressThree = "Test 5";
        $strTradingAddressFour = "Test 6";
        $strTradingAddressPostcode = "AB1 2CD";
        $strRegisteredAddressOne = "Test 7";
        $strRegisteredAddressTwo = "Test 8";
        $strRegisteredAddressThree = "Test 9";
        $strRegisteredAddressFour = "Test 10";
        $strRegisteredAddressPostcode = "EF3 4GH";
        $strTelephone = "07777 777777";
        $strEmail = "bad@email";
        $strWebsite = "www.test.com";
        $strNotes = "Test 11";
        $intPosition = Company::POSITION_DIRECTOR_BIT;
        $arrModelFiles = [
            Mockery::mock(File::class)
        ];

        $this->expectException(Exception::class);

        $modelCompany = Company::create(
            $strName,
            $strCRN,
            $datetimeIncorporationDate,
            $strSicCodes,
            $intLegalStatus,
            $strTradingAddressOne,
            $strTradingAddressTwo,
            $strTradingAddressThree,
            $strTradingAddressFour,
            $strTradingAddressPostcode,
            $strRegisteredAddressOne,
            $strRegisteredAddressTwo,
            $strRegisteredAddressThree,
            $strRegisteredAddressFour,
            $strRegisteredAddressPostcode,
            $strTelephone,
            $strEmail,
            $strWebsite,
            $strNotes,
            $intPosition,
            $arrModelFiles
        );
    }

    public function testCreate_File_Array_Invalid()
    {
        $strName = "Test 1";
        $strCRN = "12345678";
        $datetimeIncorporationDate = new DateTime();
        $strSicCodes = "00000";
        $intLegalStatus = 1;
        $strTradingAddressOne = "Test 3";
        $strTradingAddressTwo = "Test 4";
        $strTradingAddressThree = "Test 5";
        $strTradingAddressFour = "Test 6";
        $strTradingAddressPostcode = "AB1 2CD";
        $strRegisteredAddressOne = "Test 7";
        $strRegisteredAddressTwo = "Test 8";
        $strRegisteredAddressThree = "Test 9";
        $strRegisteredAddressFour = "Test 10";
        $strRegisteredAddressPostcode = "EF3 4GH";
        $strTelephone = "07777 777777";
        $strEmail = "test@email.com";
        $strWebsite = "www.test.com";
        $strNotes = "Test 11";
        $intPosition = Company::POSITION_DIRECTOR_BIT;
        $arrModelFiles = [
            Mockery::mock(Loan::class)
        ];

        $this->expectException(Exception::class);

        $modelCompany = Company::create(
            $strName,
            $strCRN,
            $datetimeIncorporationDate,
            $strSicCodes,
            $intLegalStatus,
            $strTradingAddressOne,
            $strTradingAddressTwo,
            $strTradingAddressThree,
            $strTradingAddressFour,
            $strTradingAddressPostcode,
            $strRegisteredAddressOne,
            $strRegisteredAddressTwo,
            $strRegisteredAddressThree,
            $strRegisteredAddressFour,
            $strRegisteredAddressPostcode,
            $strTelephone,
            $strEmail,
            $strWebsite,
            $strNotes,
            $intPosition,
            $arrModelFiles
        );
    }

    public function testCreate_File_Array_Invalid_Category()
    {
        $strName = "Test 1";
        $strCRN = "12345678";
        $datetimeIncorporationDate = new DateTime();
        $strSicCodes = "00000";
        $intLegalStatus = 1;
        $strTradingAddressOne = "Test 3";
        $strTradingAddressTwo = "Test 4";
        $strTradingAddressThree = "Test 5";
        $strTradingAddressFour = "Test 6";
        $strTradingAddressPostcode = "AB1 2CD";
        $strRegisteredAddressOne = "Test 7";
        $strRegisteredAddressTwo = "Test 8";
        $strRegisteredAddressThree = "Test 9";
        $strRegisteredAddressFour = "Test 10";
        $strRegisteredAddressPostcode = "EF3 4GH";
        $strTelephone = "07777 777777";
        $strEmail = "test@email.com";
        $strWebsite = "www.test.com";
        $strNotes = "Test 11";
        $intPosition = Company::POSITION_DIRECTOR_BIT;
        $arrModelFiles = [
            Mockery::mock(File::class)
                ->shouldReceive("getCategoryId")
                ->withNoArgs()
                ->andReturn(File::CATEGORY_GUARANTOR_DETAILS)
                ->twice()
                ->shouldReceive("getNameAndPath")
                ->withNoArgs()
                ->andReturn("Test")
                ->once()
                ->mock()
        ];

        $this->expectException(Exception::class);

        $modelCompany = Company::create(
            $strName,
            $strCRN,
            $datetimeIncorporationDate,
            $strSicCodes,
            $intLegalStatus,
            $strTradingAddressOne,
            $strTradingAddressTwo,
            $strTradingAddressThree,
            $strTradingAddressFour,
            $strTradingAddressPostcode,
            $strRegisteredAddressOne,
            $strRegisteredAddressTwo,
            $strRegisteredAddressThree,
            $strRegisteredAddressFour,
            $strRegisteredAddressPostcode,
            $strTelephone,
            $strEmail,
            $strWebsite,
            $strNotes,
            $intPosition,
            $arrModelFiles
        );
    }

    public function testAddFile()
    {
        $strName = "Test 1";
        $strCRN = "12345678";
        $datetimeIncorporationDate = new DateTime();
        $strSicCodes = "00000";
        $intLegalStatus = 1;
        $strTradingAddressOne = "Test 3";
        $strTradingAddressTwo = "Test 4";
        $strTradingAddressThree = "Test 5";
        $strTradingAddressFour = "Test 6";
        $strTradingAddressPostcode = "AB1 2CD";
        $strRegisteredAddressOne = "Test 7";
        $strRegisteredAddressTwo = "Test 8";
        $strRegisteredAddressThree = "Test 9";
        $strRegisteredAddressFour = "Test 10";
        $strRegisteredAddressPostcode = "EF3 4GH";
        $strTelephone = "07777 777777";
        $strEmail = "test@email.com";
        $strWebsite = "www.test.com";
        $strNotes = "Test 11";
        $intPosition = Company::POSITION_DIRECTOR_BIT;
        $arrModelFiles = [];

        $modelCompany = Company::create(
            $strName,
            $strCRN,
            $datetimeIncorporationDate,
            $strSicCodes,
            $intLegalStatus,
            $strTradingAddressOne,
            $strTradingAddressTwo,
            $strTradingAddressThree,
            $strTradingAddressFour,
            $strTradingAddressPostcode,
            $strRegisteredAddressOne,
            $strRegisteredAddressTwo,
            $strRegisteredAddressThree,
            $strRegisteredAddressFour,
            $strRegisteredAddressPostcode,
            $strTelephone,
            $strEmail,
            $strWebsite,
            $strNotes,
            $intPosition,
            $arrModelFiles
        );

        $this->assertEquals(
            $arrModelFiles,
            $modelCompany->getFiles()
        );

        $mockModelFile = Mockery::mock(File::class)
            ->shouldReceive("getCategoryId")
            ->withNoArgs()
            ->andReturn(File::CATEGORY_SEARCHES)
            ->once()
            ->mock();

        $arrModelFiles[] = $mockModelFile;

        $modelCompany->addFile($mockModelFile);

        $this->assertEquals(
            $arrModelFiles,
            $modelCompany->getFiles()
        );
    }

    public function testAddFile_Invalid_Category_Id()
    {
        $strName = "Test 1";
        $strCRN = "12345678";
        $datetimeIncorporationDate = new DateTime();
        $strSicCodes = "00000";
        $intLegalStatus = 1;
        $strTradingAddressOne = "Test 3";
        $strTradingAddressTwo = "Test 4";
        $strTradingAddressThree = "Test 5";
        $strTradingAddressFour = "Test 6";
        $strTradingAddressPostcode = "AB1 2CD";
        $strRegisteredAddressOne = "Test 7";
        $strRegisteredAddressTwo = "Test 8";
        $strRegisteredAddressThree = "Test 9";
        $strRegisteredAddressFour = "Test 10";
        $strRegisteredAddressPostcode = "EF3 4GH";
        $strTelephone = "07777 777777";
        $strEmail = "test@email.com";
        $strWebsite = "www.test.com";
        $strNotes = "Test 11";
        $intPosition = Company::POSITION_DIRECTOR_BIT;
        $arrModelFiles = [];

        $modelCompany = Company::create(
            $strName,
            $strCRN,
            $datetimeIncorporationDate,
            $strSicCodes,
            $intLegalStatus,
            $strTradingAddressOne,
            $strTradingAddressTwo,
            $strTradingAddressThree,
            $strTradingAddressFour,
            $strTradingAddressPostcode,
            $strRegisteredAddressOne,
            $strRegisteredAddressTwo,
            $strRegisteredAddressThree,
            $strRegisteredAddressFour,
            $strRegisteredAddressPostcode,
            $strTelephone,
            $strEmail,
            $strWebsite,
            $strNotes,
            $intPosition,
            $arrModelFiles
        );

        $this->assertEquals(
            $arrModelFiles,
            $modelCompany->getFiles()
        );

        $mockModelFile = Mockery::mock(File::class)
            ->shouldReceive("getCategoryId")
            ->withNoArgs()
            ->andReturn(File::CATEGORY_GUARANTOR_DETAILS)
            ->twice()
            ->mock();

        $this->expectException(Exception::class);

        $modelCompany->addFile($mockModelFile);
    }
}