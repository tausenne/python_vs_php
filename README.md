The snake and the elephant
=============

I had heard a lot about how Python is better than PHP. Even if we discard personal preferences re: syntax and readability, the Python crowd touts its performance. I decided to run a simple test.

The task is straightforward: read input from a file and count all the occurrences of the word "abracadabra". The input is a modified [17,826-word palindrome](http://norvig.com/pal17txt.html) with one of the words substituted for "abracadabra" (to make our algorithms' search less frustrating), but with every word on a new line instead of separated by a comma and a space. In order to maximize Python's performance, I added a bootstrap file which imported the original `.py` file containing the implementation. Upon initial execution, this would compile the original `.py` file into a `.pyc` file that contains bytecode. Even so, PHP consistently performs faster than Python.

The scripts have an optional argument: a number of iterations to run the searcher cycle over. If left blank, the searcher iterates over 100 cycles. Sample usage:
`php abracadabra.php`
`php abracadabra.php 200`
`python bootstrap.py`
`python bootstrap.py 200`

In order to collect better data, there's also `runscripts.php`. It will run PHP and Python versions of the algorithm for 200, 2,000, and 20,000 iterations, 100 times each, and save the results into `benchmarks.txt`.
