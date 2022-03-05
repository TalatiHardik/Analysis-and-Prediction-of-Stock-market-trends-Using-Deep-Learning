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
After scraping the data, we needed to clean it up so that it was usable for our model. We made the following changes and created the following variables:

*	News Headlines were cleaned by removing stopwords and done preprocessing like stemming.
*	Corrected the date format 
*	For Historic data remove the rows with null values

## Model Building 

We made three different models for each step of this application:
*	**Recurrent Neural Network with LSTM** – To predict OPEN, HIGH, LOW, CLOSE
*	**Support Vector Machine and Naive Bayes** – To predict the trend of stock using the sentiment of news headlines
*	**K-means Clustering** – To group similar stock together for Risk Analysis


## Productionization 
### Home Page
![index](https://user-images.githubusercontent.com/57723556/156887897-70ebada5-78ba-4f23-9a31-e2e163262de8.png)

### Trend Prediction
![historic](https://user-images.githubusercontent.com/57723556/156887971-16e71666-0b56-445d-82f9-bd508047863d.png)

### News Sentiment Prediction
![news](https://user-images.githubusercontent.com/57723556/156888317-5be3d6d3-0560-4279-92dd-3130f2f8f8f2.png)

### Risk Analysis
![risk_analysis](https://user-images.githubusercontent.com/57723556/156888335-7b0750ae-5c8c-4033-b067-a84f65e30f74.png)

