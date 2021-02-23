
from selenium import webdriver
from bs4 import BeautifulSoup
import pandas as pd
from time import time
from time import sleep
import numpy as np
from IPython.core.display import clear_output
from random import randint

#To configure webdriver to use Chrome browser, we have to set the path to chromedriver
driver = webdriver.Chrome("E:\chromedriver_win32\chromedriver.exe")
#driver = webdriver.Ie("E:\IEDriverServer_x64_3.9.0\IEDriverServer.exe")

times=[]
dates=[]
sources=[] 
headlines=[]

#pages =  [30,16,10]
#years = [2011,2010,2009]

pages = [8,13]
years = [2018,2017]
 


def fun():
    # Preparing the monitoring of the loop
    start_time = time()
    requests = 0
    for (year,i) in zip(years,pages):
        
        for n in range(i):
            page = n+1
             # Pause the loop
            sleep(randint(8,15))
            # Monitor the requests
            requests += 1
            elapsed_time = time() - start_time
            print('Request:{}; Frequency: {} requests/s'.format(requests, requests/elapsed_time))
            clear_output(wait = True)
            # Break the loop if the number of requests is greater than expected
           # if requests > 110:
             #   print('Number of requests was greater than expected.')
              #  break
            
            url = "https://www.moneycontrol.com/stocks/company_info/stock_news.php?sc_id=MM&scat=&pageno=" + str(page) + "&next=0&durationType=Y&Year=" + str(year) + "&duration=1&news_type="
            try:    
                driver.get(url)
            except Exception:
                print("ERROR")
                return
        
            content = driver.page_source
            soup = BeautifulSoup(content,'lxml')
            
            
            for a in soup.findAll('div',attrs={'class':'MT15 PT10 PB10'}):
                #print(str(a) + '\n')
                info=a.find('p',attrs={'class':'PT3 a_10dgry'})
                if info is None:
                    continue
                info = info.text
                #print(date.text)
                temp = info.split('|')
                if(len(temp) == 3):
                    times.append(temp[0])
                    dates.append(temp[1])
                    sources.append(temp[2])
                elif(len(temp) == 2):
                    times.append(temp[0])
                    dates.append(temp[1])
                    sources.append("@")
                else:
                    dates.append("@")
                    sources.append("@")
                    times.append(temp[0])
                    
                headline=a.find('strong')
                #print(headline.text)
                
                headlines.append(headline.text)
            
fun()
df = pd.DataFrame({'Time':times,'Dates':dates,'Sources': sources ,'Headlines':headlines}) 
df.to_csv('news_mahindra_18_17.csv', index=False, encoding='utf-8')    
print('---------DONE-----------')