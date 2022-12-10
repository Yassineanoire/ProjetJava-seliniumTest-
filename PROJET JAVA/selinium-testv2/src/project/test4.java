package project;

import static org.testng.Assert.assertEquals;

import java.io.BufferedReader;
import java.io.FileReader;
import java.io.Reader;
import java.util.concurrent.TimeUnit;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.By.ByXPath;
import org.openqa.selenium.chrome.ChromeDriver;
import org.testng.annotations.BeforeTest;
import org.testng.annotations.Test;
import dev.failsafe.internal.util.Assert;

public class test4 {
	WebDriver wb;
	String test;
	int i = 0;
	

	@BeforeTest
	public void setup() throws InterruptedException {
	
		 wb = new ChromeDriver();
		 wb.manage().timeouts().implicitlyWait(20,TimeUnit.SECONDS);			
		 wb.get("http://localhost/project_Php/index.php");
	
	}
	@Test
public void test() throws InterruptedException {

	
	try {
		BufferedReader bf= new BufferedReader(new FileReader("output.txt"));
		String line;
		
		

		
		while((line = bf.readLine())!=null) {
				Thread.sleep(500);
				if(i==0) {
					
					Thread.sleep(1000);
					wb.findElement(By.xpath("/html/body/div/div/form[1]/div[1]/input")).sendKeys(line);
				}
				if(i==1) {
					
					Thread.sleep(1000);
					wb.findElement(By.name("lname")).sendKeys(line);
			
			}
				if(i==2) {
				
					Thread.sleep(1000);
					wb.findElement(By.xpath("/html/body/div/div/form[1]/div[3]/input")).sendKeys(line);
			
			}

				if(i==3) {
					
					Thread.sleep(1000);
					wb.findElement(By.xpath("/html/body/div/div/form[1]/div[4]/input")).sendKeys(line);
			
			}
				i++;

		}
		
		wb.findElement(By.xpath("/html/body/div/div/form[1]/div[5]/button")).click();

	}catch(Exception e) {
		
	}
}
}
