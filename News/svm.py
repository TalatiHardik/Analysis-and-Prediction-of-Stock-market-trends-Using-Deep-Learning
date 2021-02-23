#STEP -1 : Add the Required Libraries

import pandas as pd
import numpy as np
from nltk.tokenize import word_tokenize
from nltk import pos_tag
from nltk.corpus import stopwords
from nltk.stem import WordNetLemmatizer
from sklearn.preprocessing import LabelEncoder
from collections import defaultdict
from nltk.corpus import wordnet as wn
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn import model_selection, naive_bayes, svm
from sklearn.metrics import accuracy_score
from nltk import PorterStemmer

import sys

sys.stdout = open('output.txt','wt')


companies = ['HDFC BK', 'Hero', 'INDUS BK', 'Infosys', 'Kotak Mahindra', 'Mahindra', 'SBIN', 'TATA', 'TATA Chemical', 'Torrent Pharma']


for company in companies:

    #STEP -2: Set random seed
    
    #print(company + '\n\n')
    
    
    np.random.seed(500)
    
    #STEP -3: Add the Corpus
    
    Corpus = pd.read_csv('E:\\Project\\NEWS\\' + company + '\\news.csv')
    
    
    #STEP -4: Data pre-processing
    
    # Step - a : Remove blank rows if any.
    Corpus['text'].dropna(inplace=True)
    # Step - b : Change all the text to lower case. This is required as python interprets 'dog' and 'DOG' differently
    #Corpus['text'] = [entry.lower() for entry in Corpus['text']]
    Corpus['text'] = Corpus['text'].apply(lambda entry: entry.lower())
    
    stop_words = set(stopwords.words('english')) 
    lmtzr = WordNetLemmatizer()
    
    Corpus['text_final'] = Corpus['text'].apply(lambda x: ' '.join([item for item in x.split() if item not in stop_words]))
    Corpus['text_final'] = Corpus['text'].apply(lambda x: ' '.join([item for item in x.split() if item not in stop_words]))
    
    # STEMMING
    
    ps = PorterStemmer()
    Corpus['text_final'] = Corpus['text'].apply(lambda x: ' '.join([ps.stem(word) for word in x.split()]))
    Corpus['text_final'] = Corpus['text'].apply(lambda x: ' '.join([ps.stem(word) for word in x.split()]))
    
    
    # LEMMATIZATION
    
    Corpus['text_final'] = Corpus['text'].apply(lambda x: ' '.join([lmtzr.lemmatize(word,'v') for word in x.split()]))
    Corpus['text_final'] = Corpus['text'].apply(lambda x: ' '.join([lmtzr.lemmatize(word,'v') for word in x.split()]))
    
    
    # Step - c : Tokenization : In this each entry in the corpus will be broken into set of words
    Corpus['text']= [word_tokenize(entry) for entry in Corpus['text']]
    # Step - d : Remove Stop words, Non-Numeric and perfom Word Stemming/Lemmenting.
    
    
    
    
    '''
    # WordNetLemmatizer requires Pos tags to understand if the word is noun or verb or adjective etc. By default it is set to Noun
    tag_map = defaultdict(lambda : wn.NOUN)
    tag_map['J'] = wn.ADJ
    tag_map['V'] = wn.VERB
    tag_map['R'] = wn.ADV
    for index,entry in enumerate(Corpus['text']):
        # Declaring Empty List to store the words that follow the rules for this step
        Final_words = []
        # Initializing WordNetLemmatizer()
        word_Lemmatized = WordNetLemmatizer()
        # pos_tag function below will provide the 'tag' i.e if the word is Noun(N) or Verb(V) or something else.
        for word, tag in pos_tag(entry):
            # Below condition is to check for Stop words and consider only alphabets
            if word not in stopwords.words('english') and word.isalpha():
                word_Final = word_Lemmatized.lemmatize(word,tag_map[tag[0]])
                Final_words.append(word_Final)
        # The final processed set of words for each iteration will be stored in 'text_final'
        Corpus.loc[index,'text_final'] = str(Final_words)
        
       ''' 
    #STEP -5: Prepare Train and Test Data sets    
        
        
    Train_X, Test_X, Train_Y, Test_Y = model_selection.train_test_split(Corpus['text_final'],Corpus['label'],test_size=0.2)
    
    
    #STEP -6: Encoding
    
    Encoder = LabelEncoder()
    Train_Y = Encoder.fit_transform(Train_Y)
    Test_Y = Encoder.fit_transform(Test_Y)
    
    
    
    #STEP -7: Word Vectorization
    
    Tfidf_vect = TfidfVectorizer(max_features=5000)
    Tfidf_vect.fit(Corpus['text_final'])
    Train_X_Tfidf = Tfidf_vect.transform(Train_X)
    Test_X_Tfidf = Tfidf_vect.transform(Test_X)
    
    
    #print(Tfidf_vect.vocabulary_)
    
    
    
    #STEP -7: Use the ML Algorithms to Predict the outcome
    
    # fit the training dataset on the NB classifier
    Naive = naive_bayes.MultinomialNB()
    Naive.fit(Train_X_Tfidf,Train_Y)
    # predict the labels on validation dataset
    predictions_NB = Naive.predict(Test_X_Tfidf)
    # Use accuracy_score function to get the accuracy
    print("Naive Bayes Accuracy Score -> ",accuracy_score(predictions_NB, Test_Y)*100)   
    
    
    # SVM
    
    # Classifier - Algorithm - SVM
    # fit the training dataset on the classifier
    SVM = svm.SVC(C=1.0, kernel='linear', degree=1, gamma='auto')
    SVM.fit(Train_X_Tfidf,Train_Y)
    # predict the labels on validation dataset
    predictions_SVM = SVM.predict(Test_X_Tfidf)
    # Use accuracy_score function to get the accuracy
    print("SVM Accuracy Score -> ",accuracy_score(predictions_SVM, Test_Y)*100)
    
    
    
    ## Import library to check accuracy
    from sklearn.metrics import classification_report,confusion_matrix,accuracy_score
    
    #print('\n\nNB\n\n')
    
    matrix=confusion_matrix(predictions_NB, Test_Y)
    print(matrix)
    score=accuracy_score(predictions_NB, Test_Y)
    print(score)
    report=classification_report(predictions_NB, Test_Y)
    print(report)
    
    #print('SVM\n\n')
    
    matrix=confusion_matrix(predictions_SVM, Test_Y)
    print(matrix)
    score=accuracy_score(predictions_SVM, Test_Y)
    print(score)
    report=classification_report(predictions_SVM, Test_Y)
    print(report)
    
    data_train = pd.DataFrame({'Headlines':Train_X,'Labels':Train_Y}) 
    data_train.to_csv('E:\\Project\\NEWS\\' + company + '\\Train.csv', index=False, encoding='utf-8')
    
    data_test = pd.DataFrame({'Headlines':Test_X,'Labels':Test_Y}) 
    data_test.to_csv('E:\\Project\\NEWS\\' + company + '\\Test.csv', index=False, encoding='utf-8')
    
    data_Predict = pd.DataFrame({'Headlines':Test_X,'Labels':Test_Y, 'Predictions_NB': predictions_NB, 'Predictions_SVM': predictions_SVM}) 
    data_Predict.to_csv('E:\\Project\\NEWS\\' + company + '\\Prediction.csv', index=False, encoding='utf-8')
    
    #print('--------------------------------------------------------------------------')