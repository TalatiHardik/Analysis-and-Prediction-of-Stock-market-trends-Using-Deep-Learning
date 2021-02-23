import pandas as pd
dataset = pd.read_csv('data_dif.csv')
stocks_df = []
stocks_df = dataset.drop(["Name"], axis = 1)

from sklearn.preprocessing import Normalizer
from sklearn.cluster import KMeans
movements = stocks_df.values

from sklearn.preprocessing import MinMaxScaler
scld = Normalizer()
arr_scld = scld.fit_transform(stocks_df)
df_scld = pd.DataFrame(arr_scld, columns=stocks_df.columns)
df_scld.head()


#let's build clusters
from sklearn.cluster import KMeans
num_of_clusters = range(2,7)
error = []

for num_clusters in num_of_clusters:
    clusters = KMeans(num_clusters)
    clusters.fit(df_scld)
    error.append(clusters.inertia_/100)
    
df=pd.DataFrame({"Cluster_Numbers":num_of_clusters, "Error_Term":error})

import matplotlib.pyplot as plt

plt.figure(figsize=(15,10))
plt.plot(df.Cluster_Numbers, df.Error_Term, marker = "D", color='red')
plt.xlabel('Number of Clusters')
plt.ylabel('SSE')
plt.show()

clusters = KMeans(7)
clusters.fit(df_scld)
clusters.labels_

labels = clusters.predict(movements)
labels

companies = dataset["Name"]
dff = pd.DataFrame({'labels': labels, 'companies': companies})
dff.sort_values('labels')

stocks_df['Cluster'] = clusters.labels_
stocks_df.head()
stocks_df.to_csv('kmeans.csv')


import pandas as pd
stocks_df = pd.read_csv('data_dif.csv')
stocks_df.index = stocks_df["Name"]
stocks_df = stocks_df.drop(["Cluster", "Name"], axis = 1)


#Analyze a cluster
#three_stocks = stocks_test['Unilever','Walgreen','Xerox']
stocks_df.T.head()
stock1 = stocks_df.T["APOLO TYRES"]
stock2 = stocks_df.T["JK TYRE"]
stock3 = stocks_df.T["MANAPURRAM FINANCE"]
stock4 = stocks_df.T["MRF"]
tech_stocks = pd.concat([stock1, stock2, stock3, stock4], axis=1)
tech_stocks.head()
tech_stocks.pct_change().plot(figsize=(12,12))

#Analyze same cluster
#three_stocks = stocks_test['Unilever','Walgreen','Xerox']
stocks_df.T.head()
stock1 = stocks_df.T['AURO PHARMA']
stock2 = stocks_df.T['CIPLA']
stock3 = stocks_df.T['LUPIN']
stock4 = stocks_df.T['SUN PHARMA']
tech_stocks = pd.concat([stock1, stock2, stock3, stock4], axis=1)
tech_stocks.head()
tech_stocks.pct_change().plot(figsize=(12,12))

#Analyze a cluster
#three_stocks = stocks_test['Unilever','Walgreen','Xerox']
stocks_df.T.head()
stock1 = stocks_df.T['SUN PHARMA']
stock2 = stocks_df.T['Walgreen']
stock3 = stocks_df.T['Xerox']
tech_stocks = pd.concat([stock1, stock2, stock3], axis=1)
tech_stocks.head()
tech_stocks.pct_change().plot(figsize=(12,12))

stocks_df.T.head()
stock1 = stocks_df.T['3M']
stock2 = stocks_df.T['Exxon']
#stock3 = stocks_df.T['Yahoo']
tech_stocks = pd.concat([stock1, stock2], axis=1)
tech_stocks.head()
tech_stocks.pct_change().plot(figsize=(12,12))

stocks_df.T.head()
stock1 = stocks_df.T['3M']
stock2 = stocks_df.T['Exxon']
#stock3 = stocks_df.T['Yahoo']
tech_stocks = pd.concat([stock1, stock2], axis=1)
tech_stocks.head()
tech_stocks.pct_change().plot(figsize=(12,12))

stocks_df.T.head()
stock1 = stocks_df.T['3M']
stock2 = stocks_df.T['Exxon']
#stock3 = stocks_df.T['Yahoo']
tech_stocks = pd.concat([stock1, stock2], axis=1)
tech_stocks.head()
tech_stocks.pct_change().plot(figsize=(12,12))
