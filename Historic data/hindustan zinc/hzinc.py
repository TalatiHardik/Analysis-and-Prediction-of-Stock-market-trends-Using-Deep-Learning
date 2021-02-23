# Recurrent Neural Network



# Part 1 - Data Preprocessing

# Importing the libraries
import numpy as np
import matplotlib.pyplot as plt
import pandas as pd

# Importing the training set
dataset_train = pd.read_csv('hzinc_train.csv')
training_set = dataset_train.iloc[:,0:].values

# Feature Scaling
from sklearn.preprocessing import MinMaxScaler
sc = MinMaxScaler(feature_range = (0, 1))
training_set_scaled = sc.fit_transform(training_set)


# Creating a data structure with 60 DAYsteps and 1 output
X_train = []
y_train = []
for i in range(120, 2416):
    X_train.append(training_set_scaled[i-120:i])
    y_train.append(training_set_scaled[i])
X_train, y_train = np.array(X_train), np.array(y_train)

# Reshaping
X_train = np.reshape(X_train, (X_train.shape[0], X_train.shape[1], 5))



# Part 2 - Building the RNN

# Importing the Keras libraries and packages
from keras.models import Sequential
from keras.layers import Dense
from keras.layers import LSTM
from keras.layers import Dropout

# Initialising the RNN
regressor = Sequential()

# Adding the first LSTM layer and some Dropout regularisation
regressor.add(LSTM(units = 75, return_sequences = True, input_shape = (X_train.shape[1], 5)))
regressor.add(Dropout(0.2))

# Adding a second LSTM layer and some Dropout regularisation
regressor.add(LSTM(units = 75, return_sequences = True))
regressor.add(Dropout(0.2))

# Adding a third LSTM layer and some Dropout regularisation
regressor.add(LSTM(units = 75, return_sequences = True))
regressor.add(Dropout(0.2))

# Adding a fourth LSTM layer and some Dropout regularisation
regressor.add(LSTM(units = 75))
regressor.add(Dropout(0.2))

# Adding the output layer
regressor.add(Dense(units = 5))

# Compiling the RNN
regressor.compile(optimizer = 'adam', loss = 'mean_squared_error')

# Fitting the RNN to the Training set
regressor.fit(X_train, y_train, epochs = 100, batch_size = 32)


# Part 3 - Making the predictions and visualising the results

# Getting the real stock price of 2017
dataset_test = pd.read_csv('hzinc_test.csv')
real_stock_price = dataset_test.iloc[:, 0:].values
#dataset_train = dataset_train.drop(col, axis =1)
#dataset_test = dataset_test.drop(col,  axis =1)
dataset_total = pd.concat((dataset_train, dataset_test), axis = 0, sort = False)
inputs = dataset_total[len(dataset_total) - len(dataset_test) - 120:].values
#inputs = inputs.reshape(1,-1)
inputs = sc.transform(inputs)
X_test = []
for i in range(120, 160):
    X_test.append(inputs[i-120:i])
X_test = np.array(X_test)
X_test = np.reshape(X_test, (X_test.shape[0], X_test.shape[1], 5))

'''date = pd.read_csv('sbi.csv')'''
predicted_stock_price = regressor.predict(X_test)
predicted_stock_price = sc.inverse_transform(predicted_stock_price)
#predicted_stock_price.to_csv('open-low')
# Visualising the results 
plt.plot(real_stock_price[1:,0], color = 'red', marker = 'o', label = 'Real Open Price')
plt.plot(predicted_stock_price[:,0], color = 'blue', marker = 'o',label = 'Predicted Open Price')
plt.title('Hindustan Zinc Stock Price Prediction')
plt.xlabel('DAY')
plt.ylabel('Hindustan Zinc Stock Price')
plt.legend()
plt.show()
pd.DataFrame(predicted_stock_price).to_csv("predicted_values_project.csv")

plt.plot(real_stock_price[1:,1], color = 'red', marker = 'o', label = 'Real High Price')
plt.plot(predicted_stock_price[:,1], color = 'blue', marker = 'o',label = 'Predicted High Price')
plt.title('Hindustan Zinc Stock Price Prediction')
plt.xlabel('DAY')
plt.ylabel('Hindustan Zinc Stock Price')
plt.legend()
plt.show()


plt.plot(real_stock_price[1:,2], color = 'red',  marker = 'o',label = 'Real Low rice')
plt.plot(predicted_stock_price[:,2], color = 'blue', marker = 'o',label = 'Predicted Low Price')
plt.title('Hindustan Zinc Stock Price Prediction')
plt.xlabel('DAY')
plt.ylabel('Hindustan Zinc Stock Price')
plt.legend()
plt.show()

plt.plot(real_stock_price[1:,3], color = 'red', marker = 'o',label = 'Real Close Price')
plt.plot(predicted_stock_price[:,3], color = 'blue', marker = 'o',label = 'Predicted Close Price')
plt.title('Hindustan Zinc Stock Price Prediction')
plt.xlabel('Date')
plt.ylabel('Hindustan Zinc Paint Stock Price')
#plt.xticks(date.,date['Date'].values)
plt.legend()
plt.show()

pd.DataFrame(predicted_stock_price).to_csv("predicted_values_Hindustan Zinc.csv")
regressor.save("hzin.h5")

#from keras.models import load_model
#regressor=load_model('Hindustan Zinc.h5')