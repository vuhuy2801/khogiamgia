import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.chrome.ChromeOptions;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.support.ui.WebDriverWait;
import org.testng.annotations.BeforeTest;
import org.testng.annotations.Test;

import java.time.Duration;

public class AddVoucher {
    WebDriver driver;
    WebDriverWait wait;
    String baseUrl = "http://localhost/admin";
    String userNameText = "test";
    String passwordText = "test";


    // create data voucher
    String voucherId = "SPPBAYTET12";
    String voucherName = "60K";
    String quantity = "100";
    String categoryName = "Toàn sàn";
    String minimumDiscount = "20K";
    String maximumDiscount = "250K";
    String conditionsOfUse = "Chỉ áp dụng khi mua trên 1.000.000 VNĐ";
    String discountTypeName = "Free Ship";
    String expressAt = "01/29/2024";
    String expiresAt = "02/22/2025";
    String is_trendName = "không";
    String is_inWalletName = "có";
    String supplierName = "Shopee";
    String address_target = "https://shopee.vn/";




    @BeforeTest
    public void beforeTest() {

        String pathProject = System.getProperty("user.dir");
        String browser = "Chrome";
        switch (browser) {
            case "Chrome":
                System.setProperty("webdriver.chrome.driver", pathProject + "/libs/chromedriver.exe");
                ChromeOptions options = new ChromeOptions();
                options.addArguments("--remote-allow-origins=*");
                driver = new ChromeDriver(options);
                break;
            case "Firefox":
                System.setProperty("webdriver.gecko.driver", pathProject + "/libs/geckodriver.exe");
                System.setProperty("webdriver.firefox.bin", "C:/Program Files/Mozilla Firefox/firefox");
                driver = new FirefoxDriver();
                break;
            default:
                throw new IllegalStateException("Unexpected value: " + browser);
        }
        wait = new WebDriverWait(driver, Duration.ofSeconds(10));
    }

    @Test
    public void testCase1() throws InterruptedException {
        driver.get(baseUrl);
        driver.manage().window().maximize();



        // 1. login
        WebElement username = driver.findElement(By.id("username"));
        username.clear();
        username.sendKeys(userNameText);

        WebElement password = driver.findElement(By.id("password"));
        password.clear();
        password.sendKeys(passwordText);
        // btn type submit
        WebElement btnSubmit = driver.findElement(By.xpath("//button[@type='submit']"));
        btnSubmit.click();

        // 2. click menu Voucher management
        WebElement menuVoucher = driver.findElement(By.xpath("//a[@href='../ma-giam-gia/danh-sach']"));
        menuVoucher.click();


        // 3. click button Add voucher
        WebElement btnAdd = driver.findElement(By.id("btnAdd"));
        btnAdd.click();

        // 4. input data

        WebElement voucherIdElm = driver.findElement(By.id("voucherId"));
        voucherIdElm.clear();
        voucherIdElm.sendKeys(voucherId);

        //click supplierId
        WebElement supplierIdElm = driver.findElement(By.id("supplierId"));
        supplierIdElm.click();
        supplierIdElm.sendKeys(supplierName);

        WebElement voucherNameElm = driver.findElement(By.id("voucherName"));
        voucherNameElm.clear();
        voucherNameElm.sendKeys(voucherName);

        WebElement discountTypeElm = driver.findElement(By.id("discountType"));
        discountTypeElm.click();
        discountTypeElm.sendKeys(discountTypeName);

        WebElement quantityElm = driver.findElement(By.id("quantity"));
        quantityElm.clear();
        quantityElm.sendKeys(quantity);

        WebElement categoryIdElm = driver.findElement(By.id("categoryId"));
        categoryIdElm.click();
        categoryIdElm.sendKeys(categoryName);

        WebElement minimumDiscountElm = driver.findElement(By.id("minimumDiscount"));
        minimumDiscountElm.clear();
        minimumDiscountElm.sendKeys(minimumDiscount);

        WebElement maximumDiscountElm = driver.findElement(By.id("maximumDiscount"));

        maximumDiscountElm.clear();

        maximumDiscountElm.sendKeys(maximumDiscount);

        WebElement conditionsOfUseElm = driver.findElement(By.id("conditionsOfUse"));

        conditionsOfUseElm.clear();

        conditionsOfUseElm.sendKeys(conditionsOfUse);

        WebElement address_targetElm = driver.findElement(By.id("address_target"));

        address_targetElm.clear();

        address_targetElm.sendKeys( address_target);

        WebElement expressAtElm = driver.findElement(By.id("expressAt"));

        expressAtElm.clear();

        expressAtElm.sendKeys(expiresAt);

        WebElement expiresAtElm = driver.findElement(By.id("expiresAt"));

        expiresAtElm.clear();


        expiresAtElm.sendKeys(expiresAt);

        WebElement is_trendElm = driver.findElement(By.id("is_trend"));

        is_trendElm.click();
        is_trendElm.sendKeys(is_trendName);

        WebElement is_inWalletElm = driver.findElement(By.id("is_inWallet"));

        is_inWalletElm.click();
        is_inWalletElm.sendKeys(is_inWalletName);

        // 5. click button submit
        WebElement btnSubmitCreate = driver.findElement(By.id("btnSubmit"));
        btnSubmitCreate.click();

        // 6. check result
        // wait page redirect
        Thread.sleep(2000);
        WebElement successAlert = driver.findElement(By.id("successAlert"));
        String successText = successAlert.getText();
        // check result
        assert successText.equals("Mã giảm giá đã được thêm thành công!");














    }
}
