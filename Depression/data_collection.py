import tweepy 
import csv
import re
from nltk.corpus import stopwords
from nltk.tokenize import word_tokenize
from textblob import TextBlob 

stop=set(stopwords.words('english'))
'''
bhai niche ke chaar keys tumhe twitter developer account create karke generate karna padega merawala expire hogaya hai
'''
consumer_key = ""
consumer_secret = ""
access_key = ""
access_secret = ""

def get_tweets():
    use=["@FakingYurSmile","@Main_Jenneee","@uglythxughts","@xdepressedfreak","@uglythxughts"]
    csvFile = open('result.csv', 'wb')
    csvWriter = csv.writer(csvFile)
    auth = tweepy.OAuthHandler(consumer_key, consumer_secret)  
    auth.set_access_token(access_key, access_secret) 
    api = tweepy.API(auth) 
    number_of_tweets=3200
    for username in use:
        
        tweets = api.user_timeline(screen_name=username,count=number_of_tweets,compression=False)          
        for tweet in tweets:
            tw=' '.join(re.sub("(@[A-Za-z0-9]+)|([^0-9A-Za-z \t])|(\w+:\/\/\S+)", " ", tweet.text).split())
            maker=tw[:]
            analysis = TextBlob(tw)
            senti=""
            
            if analysis.sentiment.polarity > 0: 
                senti='positive'
            elif analysis.sentiment.polarity == 0: 
                senti='neutral'
            else: 
                senti='negative'

            word_tokens = word_tokenize(tw)
            filtered_sentence = list(set([w for w in word_tokens if not w in stop]))
            if "RT" in filtered_sentence:
                filtered_sentence.remove("RT")
            print filtered_sentence,senti
            if len(filtered_sentence)>1:
                tw=" ".join(filtered_sentence)
                csvWriter.writerow([maker,tw,"Depressed"])
    csvFile.close()
get_tweets()
