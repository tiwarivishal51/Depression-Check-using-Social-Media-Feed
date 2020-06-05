import tweepy 
import csv
import re
import pandas as pd
from nltk.corpus import stopwords
from nltk.tokenize import word_tokenize

stop=set(stopwords.words('english'))

data=pd.read_csv("result.csv")
to_be_chkd=[i.strip().split() for i in data.iloc[:,1].values]
#print to_be_chkd

'''
bhai niche ke chaar keys tumhe twitter developer account create karke generate karna padega merawala expire hogaya hai
'''
consumer_key = ""
consumer_secret = ""
access_key = ""
access_secret = ""

def get_tweets():
    m=open("testt.txt","r")
    username=m.readline()
    m.close()
    
    #username=raw_input("Enter Desired twitter username: ")
    auth = tweepy.OAuthHandler(consumer_key, consumer_secret)  
    auth.set_access_token(access_key, access_secret) 
    api = tweepy.API(auth) 
    number_of_tweets=40
    store=""
    c=0
    tweets = api.user_timeline(screen_name=username,count=number_of_tweets,compression=False)          
    for tweet in tweets:
        tw=' '.join(re.sub("(@[A-Za-z0-9]+)|([^0-9A-Za-z \t])|(\w+:\/\/\S+)", " ", tweet.text).split())
        store=tw
        flt_tweet=""
        word_tokens = word_tokenize(store)
        filtered_sentence = list(set([w for w in word_tokens if not w in stop]))
        if "RT" in filtered_sentence:
            filtered_sentence.remove("RT")
        if len(filtered_sentence)>1:
            flt_tweet=filtered_sentence
        perMatch=0
        nwM=0
        #[k for i in flt_tweet for j in to_be_chkd for k in j if k==i]
        for j in to_be_chkd:
            count=0
            for k in j:
                for i in flt_tweet:
                    if i==k:
                        #print i,k,j
                        count+=1
            nwM=100.0*(float(count)/max(len(j),len(k)))
            if nwM>perMatch:
                perMatch=nwM
            if perMatch>=61.0:
                c+=1
    if c>=1:
        print 1
        print 2
        return
    print 0
    
get_tweets()
