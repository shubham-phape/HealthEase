# Importing the required packages
import numpy as np
import pandas as pd
import pydotplus
import pickle
from sklearn import tree
from sklearn.externals.six import StringIO  
from IPython.display import Image  
from sklearn.tree import export_graphviz
from sklearn.metrics import confusion_matrix
from sklearn.cross_validation import train_test_split
from sklearn.tree import DecisionTreeClassifier
from sklearn.metrics import accuracy_score
from sklearn.metrics import classification_report
 
# Function importing Dataset
dataset = pd.read_csv('final.csv', sep= ',', header = 0)
# Printing the dataswet shape
print ("Dataset Lenght: ", len(dataset))
print ("Dataset Shape: ", dataset.shape)
 
# Seperating the target variable
X = dataset.values[:, 0:24]
Y = dataset.values[:, -1]
# print(X)
# print(Y)
 
# Spliting the dataset into train and test
X_train, X_test, y_train, y_test = train_test_split(X, Y, test_size = 0.3, random_state = 100)
 
# Creating the classifier object
clf_gini = DecisionTreeClassifier(criterion = "gini", random_state = 100, max_depth = 3, min_samples_leaf=5)
 
# Performing training
clf_gini.fit(X_train, y_train)
# print(clf_gini)
 
y_pred = clf_gini.predict(X_test)
# print(y_pred)

print("Results Using Gini Index:")

print("Confusion Matrix: \n",
confusion_matrix(y_test,y_pred))
 
print ("Accuracy : ",
accuracy_score(y_test,y_pred)*100)
 
print("Report : \n",
classification_report(y_test, y_pred))

pickle.dump(clf_gini, open("model_gini.pkl", "wb"))
model = pickle.load(open("model_gini.pkl", "rb"))
print (accuracy_score(y_test, y_pred))
 



