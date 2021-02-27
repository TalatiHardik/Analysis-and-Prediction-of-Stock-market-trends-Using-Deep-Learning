# Analysis-and-Prediction-of-Stock-market-trends-Using-Deep-Learning: Project Overview 

The project is designed as a 2nd opinion tool for stock market investment strategy.

The users need to do his/her research on a stock or a company before using this product.

This is a 3 step product:

STEP 1:

Predicting stock value for tomorrow by analysing historic data of a particular stock. RNN model is used for this system.
Stock historic data is downloaded from yahoo finance

STEP 2:

Verify the trend of the stock based on external factors and news which cannot be analysed using historic data. Both the Support Vector Machine and Naive Bayes system are used.
News headlines are web scrapped from moneycontrol.com

STEP 3:

Use Risk Analysis System to find out which cluster your stock belongs to and check the movement of other stock in that cluster since stocks in a particular cluster are related to each other their movement is interdependent. 
Kmeans clustering is used to create this module 

## Code and Resources Used 
**Python Version:** 3.8  
**Packages:** pandas, numpy, sklearn, matplotlib, selenium, keras, tensorflow

**Data Visualisation:** Tableau

## Web Scraping
Wrote a python script to scrap news headlines for each stock from moneycontrol.com. With each stock, we got the following:
*	News Headlines
*	Dates

## Data Cleaning
After scraping the data, I needed to clean it up so that it was usable for our model. I made the following changes and created the following variables:

*	News Headlines were cleaned by removing stopwords and done preprocessing like stemming.
*	Corrected the date format 
*	For Historic data remove the rows with null values

## Model Building 

I made three different models for each step of this application:
*	**Recurrent Neural Network with LSTM** – To predict OPEN, HIGH, LOW, CLOSE
*	**Support Vector Machine and Naive Bayes** – To predict the trend of stock using the sentiment of news headlines
*	**K-means Clustering** – To group similar stock together for Risk Analysis


## Productionization 

![alt text](https://github.com/TalatiHardik/Analysis-and-Prediction-of-Stock-market-trends-Using-Deep-Learning/blob/master/README_IMG/index.png "Home Page")

![alt text](https://github.com/TalatiHardik/Analysis-and-Prediction-of-Stock-market-trends-Using-Deep-Learning/blob/master/README_IMG/historic.png "Stock Price Prediction")

![alt text](https://github.com/TalatiHardik/Analysis-and-Prediction-of-Stock-market-trends-Using-Deep-Learning/blob/master/README_IMG/news.png "News Sentiment Prediction")

![alt text](https://github.com/TalatiHardik/Analysis-and-Prediction-of-Stock-market-trends-Using-Deep-Learning/blob/master/README_IMG/risk_analysis.png "Risk Analysis")
