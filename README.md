python_vs_php
=============

I had heard a lot about how Python is better than PHP. Even if we discard personal preferences re: syntax and readability, the Python crowd touts its performance. I decided to run a simple test.

The task is straightforward: read input from a file and count all the occurrences of the word "abracadabra". In order to maximize Python's performance, I added a bootstrap file which imported the original `.py` file containing the implementation. Upon initial execution, this would compile the original `.py` file into a `.pyc` file that contains bytecode. Even so, PHP consistently performed about five times better than Python.

The scripts don't need any arguments to run. Python can be run by invoking `python bootstrap.py`, and PHP can be run by invoking `php abracadabra.php`.
