#!/user/bin/env python3
#http://2.python-requests.org/en/master/

import requests
from bs4 import BeautifulSoup
url = "https://www.humblebundle.com/books/cloud-computing-books"
resp = requests.get(url)

soup = BeautifulSoup(resp.text, 'html.parser')

# Bundle Tiers
# twos